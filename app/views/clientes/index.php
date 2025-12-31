<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link rel="stylesheet" href="/amdigital_erp/public/assets/css/erp.css">
</head>
<body>

<div class="container">

    <div class="page-header">
        <h2>Clientes</h2>
        <a href="?controller=cliente&action=create">Novo Cliente</a>
    </div>
    
    <div class="card">        
        <table class="table">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        
            <?php foreach ($clientes as $c): ?>
            <tr>
                <td><?= htmlspecialchars($c['nome']) ?></td>
                <td><?= htmlspecialchars($c['email']) ?></td>
                <div class="actions">
                    <td>
                        <a href="?controller=cliente&action=edit&id=<?= $c['id'] ?>">Editar</a>
                        |
                        <a href="?controller=cliente&action=delete&id=<?= $c['id'] ?>"
                           onclick="return confirm('Inativar este cliente?')">
                           Inativar
                        </a>
                    </td>
                </div>
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
    </div>

</body>
</html>
