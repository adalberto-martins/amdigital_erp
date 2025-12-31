<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Orçamento</title>
    <link rel="stylesheet" href="/amdigital_erp/public/assets/css/erp.css">
</head>
<body>

<div class="container">

    <div class="page-header">
        <h2>Novo Orçamento</h2>
        <a href="?controller=orcamento&action=index" class="btn btn-outline">
            Voltar
        </a>
    </div>

    <div class="card">
        <form method="post" action="?controller=orcamento&action=store">

            <div class="form-group">
                <label>Cliente</label>
                <select name="cliente_id" required>
                    <option value="">Selecione um cliente</option>
                    <?php if (!empty($clientes)): ?>
                        <?php foreach ($clientes as $c): ?>
                            <option value="<?= $c['id'] ?>">
                                <?= htmlspecialchars($c['nome']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <textarea name="descricao"
                          placeholder="Descreva o serviço ou produto..."></textarea>
            </div>

            <div class="form-group">
                <label>Valor</label>
                <input type="number"
                       step="0.01"
                       name="valor"
                       placeholder="0,00"
                       required>
            </div>

            <div style="margin-top:20px">
                <button class="btn btn-primary">
                    Salvar Orçamento
                </button>
            </div>

        </form>
    </div>

</div>

</body>
</html>

