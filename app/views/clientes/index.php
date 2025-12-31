<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clientes Ativos</title>
    <link rel="stylesheet" href="/amdigital_erp/public/assets/css/erp.css">
</head>
<body>

<div class="container">

    <div class="page-header">
        <h2>Clientes Ativos</h2>
        <a href="?controller=cliente&action=create" class="btn btn-primary">
            + Novo Cliente
        </a>
    </div>

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

            <?php if (!empty($clientes)): ?>
                <?php foreach ($clientes as $c): ?>
                <tr>
                    <td><?= htmlspecialchars($c['nome']) ?></td>
                    <td><?= htmlspecialchars($c['email']) ?></td>
                    <td class="actions">
                        <a href="?controller=cliente&action=edit&id=<?= $c['id'] ?>">
                            Editar
                        </a>
                        |
                        <a href="?controller=cliente&action=delete&id=<?= $c['id'] ?>"
                           style="color:#dc2626"
                           onclick="return confirm('Inativar este cliente?')">
                           Inativar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Nenhum cliente ativo encontrado.</td>
                </tr>
            <?php endif;

