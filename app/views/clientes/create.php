<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Cliente</title>
</head>
<body>

<h2>Novo Cliente</h2>

<form method="post" action="?controller=cliente&action=store">
    <input name="nome" placeholder="Nome" required><br>
    <input name="cpf" placeholder="CPF"><br>
    <input name="email" placeholder="E-mail"><br>
    <button>Salvar</button>
</form>

</body>
</html>
