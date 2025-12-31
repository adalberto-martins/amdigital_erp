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

            <div style="margin-top:20px">
