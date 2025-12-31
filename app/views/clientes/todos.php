<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Todos os Clientes</title>
</head>
<body>

<h2>Todos os Clientes</h2>

<a href="?controller=cliente&action=index">Ver somente ativos</a>
<br><br>

<table border="1" cellpadding="6">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($clientes as $c): ?>
    <tr>
        <td><?= htmlspecialchars($c['nome']) ?></td>
        <td><?= htmlspecialchars($c['email']) ?></td>
        <td>
            <?= $c['status'] == 1 ? 'Ativo' : 'Inativo' ?>
        </td>
        <td>
            <?php if ($c['status'] == 1): ?>
                <a href="?controller=cliente&action=edit&id=<?= $c['id'] ?>">Editar</a> |
                <a href="?controller=cliente&action=delete&id=<?= $c['id'] ?>"
                   onclick="return confirm('Inativar este cliente?')">
                   Inativar
                </a>
            <?php else: ?>
                <a href="?controller=cliente&action=reativar&id=<?= $c['id'] ?>"
                   onclick="return confirm('Reativar este cliente?')">
                   Reativar
                </a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
