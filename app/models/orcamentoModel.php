<?php

class OrcamentoModel {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Lista todos os orçamentos com nome do cliente
     */
    public function listar() {
        $sql = "
            SELECT 
                o.id,
                o.cliente_id,
                o.descricao,
                o.valor,
                o.status,
                o.criado_em,
                c.nome AS cliente
            FROM orcamentos o
            INNER JOIN clientes c ON c.id = o.cliente_id
            ORDER BY o.id DESC
        ";

        return $this->pdo->query($sql)->fetchAll();
    }

    /**
     * Busca um orçamento específico
     */
    public function buscar($id) {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM orcamentos WHERE id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /**
     * Salva novo orçamento
     */
    public function salvar($dados) {
        $sql = "
            INSERT INTO orcamentos 
                (cliente_id, descricao, valor, status)
            VALUES 
                (?, ?, ?, 'aberto')
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            $dados['cliente_id'],
            $dados['descricao'] ?? null,
            $dados['valor']
        ]);
    }

    /**
     * Atualiza orçamento
     */
    public function atualizar($id, $dados) {
        $sql = "
            UPDATE orcamentos 
            SET 
                cliente_id = ?,
                descricao  = ?,
                valor      = ?
            WHERE id = ?
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            $dados['cliente_id'],
            $dados['descricao'] ?? null,
            $dados['valor'],
            $id
        ]);
    }

    /**
     * Atualiza status (aberto, aprovado, cancelado)
     */
    public function atualizarStatus($id, $status) {
        $stmt = $this->pdo->prepare(
            "UPDATE orcamentos SET status = ? WHERE id = ?"
        );
        return $stmt->execute([$status, $id]);
    }

    public function buscarCompleto($id) {
    $sql = "
        SELECT 
            o.*,
            c.nome  AS cliente_nome,
            c.email AS cliente_email
        FROM orcamentos o
        INNER JOIN clientes c ON c.id = o.cliente_id
        WHERE o.id = ?
    ";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}

}

