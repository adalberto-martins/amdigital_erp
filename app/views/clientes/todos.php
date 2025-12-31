<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Todos os Clientes</title>
    <link rel="stylesheet" href="/amdigital_erp/public/assets/css/erp_moderno.css">
</head>
<body>

<div class="container">

    <div class="page-header">
        <h2>Todos os Clientes</h2>
        <a href="?controller=cliente&action=index" class="btn btn-outline">
            Ver somente ativos
        </a>
    </div>

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

            <?php if (!empty($clientes)): ?>
                <?php foreach ($clientes as $c): ?>
                <tr>
                    <td><?= htmlspecialchars($c['nome']) ?></td>
                    <td><?= htmlspecialchars($c['email']) ?></td>
                    <td>
                        <?php if ($c['status'] == 1): ?>
                            <span class="badge badge-success">Ativo</span>
                        <?php else: ?>
                            <span class="badge badge-danger">Inativo</span>
                        <?php endif; ?>
                    </td>
                    <td class="actions">
                        <?php if ($c['status'] == 1): ?>
                            <a href="?controller=cliente&action=edit&id=<?= $c['id'] ?>">
                                Editar
                            </a>
                        <?php else: ?>
                            <a href="?controller=cliente&action=reativar&id=<?= $c['id'] ?>"
                               style="color:#16a34a"
                               onclick="return confirm('Reativar este cliente?')">
                               Reativar
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Nenhum cliente encontrado.</td>
                </tr>
            <?php endif; ?>

            </tbody>
        </table>
    </div>

</div>

</body>
</html>

