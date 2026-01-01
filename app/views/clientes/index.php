<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clientes Ativos</title>
    <link rel="stylesheet" href="/amdigital_erp/public/assets/css/erp_moderno.css">
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
                    <th>Telefone</th>
                    <th>CPF/CNPJ</th>
                    <th>Cep</th>
                    <th>Logadoura</th>
                    <th>Número</th>
                    <th>Complemento</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Observações</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

            <?php if (!empty($clientes)): ?>
                <?php foreach ($clientes as $c): ?>
                <tr>
                    <td><?= htmlspecialchars($c['nome']) ?></td>
                    <td><?= htmlspecialchars($c['email']) ?></td>
                    <td><?= htmlspecialchars($c['Telefone']) ?></td>
                    <td><?= htmlspecialchars($c['cpf / cnpj']) ?></td>
                    <td><?= htmlspecialchars($c['cep']) ?></td>
                    <td><?= htmlspecialchars($c['logadoura']) ?></td>
                    <td><?= htmlspecialchars($c['numero']) ?></td>
                    <td><?= htmlspecialchars($c['complemento']) ?></td>
                    <td><?= htmlspecialchars($c['bairro']) ?></td>
                    <td><?= htmlspecialchars($c['cidade']) ?></td>
                    <td><?= htmlspecialchars($c['estado']) ?></td>
                    <th><?= htmlspecialchars($c['observacoes']) ?></th>
                    <th><?= htmlspecialchars($c['acoes']) ?></th>
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
                    <td colspan="7">Nenhum cliente ativo encontrado.</td>
                </tr>
            <?php endif;

