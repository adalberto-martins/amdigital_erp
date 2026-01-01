<?php

class ClienteModel {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // LISTAR SOMENTE ATIVOS
    public function listar() {
        $sql = "SELECT * FROM clientes WHERE status = 1 ORDER BY nome";
        return $this->pdo->query($sql)->fetchAll();
    }

    // LISTAR TODOS (opcional, admin)
    public function listarTodos() {
        return $this->pdo->query("SELECT * FROM clientes ORDER BY nome")->fetchAll();
    }

    public function buscar($id) {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM clientes WHERE id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function salvar($dados) {
        $sql = "INSERT INTO clientes (nome, cpf, email, cep, logadoura, numero, complemento, bairro, cidade, estado status)
                VALUES (?,?,?,1)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $dados['nome'],
            $dados['cpf'],
            $dados['email'],
            $dados['cep'],
            $dados['logadoura'],
            $dados['numero'],
            $dados['complemento'],
            $dados['bairro'],
            $dados['cidade'],
            $dados['estado']
        ]);
    }

    public function atualizar($id, $dados) {
        $sql = "UPDATE clientes
                SET nome = ?, cpf = ?, email = ?
                WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $dados['nome'],
            $dados['cpf'],
            $dados['email'],
            $id
        ]);
    }

    // 👉 INATIVAR (NÃO EXCLUIR)
    public function inativar($id) {
        $sql = "UPDATE clientes SET status = 0 WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    // 👉 REATIVAR (opcional)
    public function reativar($id) {
        $sql = "UPDATE clientes SET status = 1 WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}

