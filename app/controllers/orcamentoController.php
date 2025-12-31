<?php

require_once '../config/database.php';
require_once '../app/models/OrcamentoModel.php';
require_once '../app/models/ClienteModel.php';

class OrcamentoController {

    private $model;
    private $clienteModel;

    public function __construct() {
        $pdo = conexao();
        $this->model = new OrcamentoModel($pdo);
        $this->clienteModel = new ClienteModel($pdo);
    }

    // LISTAGEM DE ORÇAMENTOS
    public function index() {
        $orcamentos = $this->model->listar();
        require '../app/views/orcamentos/index.php';
    }

    // FORM NOVO ORÇAMENTO
    public function create() {
        $clientes = $this->clienteModel->listar();
        require '../app/views/orcamentos/create.php';
    }

    // SALVAR
    public function store() {
        $this->model->salvar($_POST);
        header('Location: ?controller=orcamento&action=index');
    }

    // EDITAR
    public function edit() {
        $orcamento = $this->model->buscar($_GET['id']);
        $clientes  = $this->clienteModel->listar();
        require '../app/views/orcamentos/edit.php';
    }

    // ATUALIZAR
    public function update() {
        $this->model->atualizar($_POST['id'], $_POST);
        header('Location: ?controller=orcamento&action=index');
    }

public function pdf() {

    require_once '../vendor/fpdf/fpdf.php';

    $orcamento = $this->model->buscarCompleto($_GET['id']);

    if (!$orcamento) {
        die('Orçamento não encontrado');
    }

    // Converte textos para ISO-8859-1
    $cliente   = iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $orcamento['cliente_nome']);
    $email     = iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $orcamento['cliente_email']);
    $descricao = iconv(
        'UTF-8',
        'ISO-8859-1//TRANSLIT',
        $orcamento['descricao'] ?? '-'
    );
    $status    = iconv('UTF-8', 'ISO-8859-1//TRANSLIT', ucfirst($orcamento['status']));

    $valor = $orcamento['valor_total'] ?? 0;

    $pdf = new FPDF();
    $pdf->AddPage();

    // Fonte padrão do FPDF (SEGURA)
    $pdf->SetFont('Arial','',10);

    // Título
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10,'ORCAMENTO',0,1,'C');
    $pdf->Ln(4);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(0,8,'Cliente: ' . $cliente,0,1);
    $pdf->Cell(0,8,'E-mail: ' . $email,0,1);
    $pdf->Ln(5);

    // Cabeçalho tabela
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(140,8,'Descricao',1);
    $pdf->Cell(40,8,'Valor',1,1,'R');

    // Conteúdo
    $pdf->SetFont('Arial','',10);
    $y = $pdf->GetY();
    $pdf->MultiCell(140,8,$descricao,1);
    $pdf->SetXY(150,$y);
    $pdf->Cell(
        40,
        8,
        'R$ ' . number_format($valor,2,',','.'),
        1,
        1,
        'R'
    );

    $pdf->Ln(5);
    $pdf->Cell(0,8,'Status: ' . $status,0,1);

    $pdf->Output(
        'orcamento_'.$orcamento['id'].'.pdf',
        'I'
    );
}



}

