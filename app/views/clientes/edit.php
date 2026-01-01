<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="/amdigital_erp/public/assets/css/erp_moderno.css">
</head>
<body>

<div class="container">

    <div class="page-header">
        <h2>Editar Cliente</h2>
        <a href="?controller=cliente&action=index" class="btn btn-outline">
            Voltar
        </a>
    </div>

    <div class="card">
        <form method="post" action="?controller=cliente&action=update">

            <input type="hidden" name="id" value="<?= $cliente['id'] ?? '' ?>">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text"
                       id="nome"
                       name="nome"
                       value="<?= htmlspecialchars($cliente['nome'] ?? '') ?>"
                       required>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email"
                       id="email"
                       name="email"
                       value="<?= htmlspecialchars($cliente['email'] ?? '') ?>">
            </div>
            
            <div class="form-group">
                <label for="telefonne">Telefone</label>
                <input type="tel"
                       id="telefone"
                       name="telefone"
                       value="<?= htmlspecialchars($c['telefone'] ?? '') ?>"> 
            </div>

            <div class="form-group">
                <label for="cpf / cnpj">CPF/CNPJ</label>
                <input type="text"
                       id="cpf_cnpj"
                       name="cpf_cnpj"
                       value="<?= htmlspecialchars($c['cpf_cnpj'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text"
                       id="cep"
                       name="cep"
                       value="<?= htmlspecialchars($c['cep'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="logradouro">Logradouro</label>
                <input type="text"
                       id="logradouro"
                       name="logradouro"
                       value="<?= htmlspecialchars($c['logadouro'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="numero">Nº</label>
                <input type="text"
                       id="numero"
                       name="numero"
                       value="<?= htmlspecialchars($c['numero'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="complemento">Complemento</label>
                <input type="text"
                       id="complemento"
                       name="complemento"
                       value="<?= htmlspecialchars($c['complemento'] ?? '') ?>"
                       autocomplete="address-level2">
            </div>

            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="text"
                       id="bairro"
                       name="bairro"
                       value="<?= htmlspecialchars($c['bairro'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text"
                       id="cidade"
                       name="cidade"
                       value="<?= htmlspecialchars($c['cidade'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Estado (UF)</label>
                <select name="uf_id" required>
                    <option value="">Selecione</option>
                    <?php foreach ($ufs as $uf): ?>
                        <option value="<?= $uf['id'] ?>">
                            <?= $uf['sigla'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <textarea name="observacoes">Observações</textarea>
            </div>

            <div style="margin-top:20px"></div>
        </form>
    </div>
</div>

</body>
</html>
        
