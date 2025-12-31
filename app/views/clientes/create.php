<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Cliente</title>
    <link rel="stylesheet" href="/amdigital_erp/public/assets/css/erp.css">
</head>
<body>

<div class="container">

    <div class="page-header">
        <h2>Novo Cliente</h2>
        <a href="?controller=cliente&action=index" class="btn btn-outline">
            Voltar
        </a>
    </div>

    <div class="card">
        <form method="post" action="?controller=cliente&action=store">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text"
                       id="nome"
                       name="nome"
                       placeholder="Nome do cliente"
                       required>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email"
                       id="email"
                       name="email"
                       placeholder="email@exemplo.com">
            </div>

