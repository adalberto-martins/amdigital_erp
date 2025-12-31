<?php

require_once '../config/database.php';
require_once '../app/models/ClienteModel.php';

class ClienteController {

    private $model;

    public function __construct() {
        $this->model = new ClienteModel(conexao());
    }

    // CLIENTES ATIVOS
    public function index() {
        $clientes = $this->model->listar();
        require '../app/views/clientes/index.php';
    }

    // TODOS OS CLIENTES
    public function todos() {
        $clientes = $this->model->listarTodos();
        require '../app/views/clientes/todos.php';
    }

    public function create() {
        require '../app/views/clientes/create.php';
    }

    public function store() {
        $this->model->salvar($_POST);
        header('Location: ?controller=cliente&action=index');
    }

    public function edit() {
        $cliente = $this->model->buscar($_GET['id']);
        require '../app/views/clientes/edit.php';
    }

    public function update() {
        $this->model->atualizar($_POST['id'], $_POST);
        header('Location: ?controller=cliente&action=index');
    }

    public function delete() {
        $this->model->inativar($_GET['id']);
        header('Location: ?controller=cliente&action=index');
    }

    public function reativar() {
        $this->model->reativar($_GET['id']);
        header('Location: ?controller=cliente&action=todos');
    }
}

