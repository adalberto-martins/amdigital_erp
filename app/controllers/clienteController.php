<?php

require_once __DIR__ . '/../../config/database.php';

class ClienteController
{
    public function create()
    {
        // busca UFs para o formulário
        global $pdo;

        $stmt = $pdo->prepare("SELECT id, sigla FROM ufs ORDER BY sigla");
        $stmt->execute();
        $ufs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../views/clientes/create.php';
    }

    public function store()
    {
        global $pdo;

        $sql = "INSERT INTO clientes
            (cpf_cnpj, cep, logradouro, numero, complemento, bairro, cidade, uf_id, observacoes)
            VALUES
            (:cpf_cnpj, :cep, :logradouro, :numero, :complemento, :bairro, :cidade, :uf_id, :observacoes)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':cpf_cnpj'    => $_POST['cpf_cnpj'] ?? null,
            ':cep'         => $_POST['cep'] ?? null,
            ':logradouro'  => $_POST['logradouro'] ?? null,
            ':numero'      => $_POST['numero'] ?? null,
            ':complemento' => $_POST['complemento'] ?? null,
            ':bairro'      => $_POST['bairro'] ?? null,
            ':cidade'      => $_POST['cidade'] ?? null,
            ':uf_id'       => $_POST['uf_id'] ?? null,
            ':observacoes' => $_POST['observacoes'] ?? null,
        ]);

        header('Location: ?controller=cliente&action=todos');
        exit;
    }
}


