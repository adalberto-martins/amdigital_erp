<link rel="stylesheet" href="/amdigital_erp/public/assets/css/erp.css">

<div class="container">

    <div class="page-header">
        <h2>Editar Orçamento</h2>
    </div>

    <div class="card">
        <form method="post" action="?controller=orcamento&action=update">

            <input type="hidden" name="id" value="<?= $orcamento['id'] ?>">

            <div class="form-group">
                <label>Cliente</label>
                <select name="cliente_id">
                    <?php foreach ($clientes as $c): ?>
                        <option value="<?= $c['id'] ?>"
                            <?= $c['id'] == $orcamento['cliente_id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($c['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <textarea name="descricao"><?= htmlspecialchars($orcamento['descricao']) ?></textarea>
            </div>

            <div class="form-group">
                <label>Valor</label>
                <input type="number" step="0.01" name="valor"
                       value="<?= $orcamento['valor'] ?>" required>
            </div>

            <button class="btn btn-primary">Atualizar</button>

        </form>
    </div>

</div>
