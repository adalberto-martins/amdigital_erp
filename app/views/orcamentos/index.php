<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Orçamentos</title>
    <link rel="stylesheet" href="/amdigital_erp/public/assets/css/erp_moderno.css">
</head>
<body>

<div class="container">

    <div class="page-header">
        <h2>Orçamentos</h2>
        <a href="?controller=orcamento&action=create" class="btn btn-primary">
            + Novo Orçamento
        </a>
    </div>

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

            <?php if (!empty($orcamentos)): ?>
                <?php foreach ($orcamentos as $o): ?>
                <tr>
                    <td><?= htmlspecialchars($o['cliente']) ?></td>
                    <td><?= htmlspecialchars($o['descricao'] ?? '-') ?></td>
                    <td>
                        R$ <?= number_format($o['valor'], 2, ',', '.') ?>
                    </td>
                    <td>
                        <?php if ($o['status'] === 'aberto'): ?>
                            <span class="badge badge-warning">Aberto</span>
                        <?php elseif ($o['status'] === 'aprovado'): ?>
                            <span class="badge badge-success">Aprovado</span>
                        <?php else: ?>
                            <span class="badge badge-danger">Cancelado</span>
                        <?php endif; ?>
                    </td>
                    <td class="actions">
                        <a href="?controller=orcamento&action=edit&id=<?= $o['id'] ?>">
                            Editar
                        </a>
                        |
                        <a href="?controller=orcamento&action=pdf&id=<?= $o['id'] ?>"
                            target="_blank">
                            PDF
                            </a>

                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Nenhum orçamento encontrado.</td>
                </tr>
            <?php endif; ?>

            </tbody>
        </table>
    </div>

</div>

</body>
</html>
