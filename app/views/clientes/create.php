<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Cliente</title>
</head>
<body>

<form method="POST" action="?controller=cliente&action=store">

    <label>CPF ou CNPJ</label>
    <input type="text" name="cpf_cnpj" required>

    <label>CEP</label>
    <input type="text" name="cep" inputmode="numeric" maxlength="9">

    <label>Logradouro</label>
    <input type="text" name="logradouro" required>

    <label>Número</label>
    <input type="text" name="numero">

    <label>Complemento</label>
    <input type="text" name="complemento">

    <label>Bairro</label>
    <input type="text" name="bairro">

    <label>Cidade</label>
    <input type="text" name="cidade">

    <label>Estado (UF)</label>
    <select name="uf_id" required>
        <option value="">Selecione</option>
        <?php foreach ($ufs as $uf): ?>
            <option value="<?= $uf['id'] ?>">
                <?= htmlspecialchars($uf['sigla']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Observações</label>
    <textarea name="observacoes"></textarea>

    <button type="submit">Salvar</button>

</form>

</body>
</html>



