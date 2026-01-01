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

