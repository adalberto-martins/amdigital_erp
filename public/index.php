<?php

require_once '../config/database.php';

$controller = $_GET['controller'] ?? 'home';
$action     = $_GET['action'] ?? 'index';

$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = "../app/controllers/$controllerName.php";

if (!file_exists($controllerFile)) {
    die('Controller não encontrado');
}

require_once $controllerFile;

$obj = new $controllerName();

if (!method_exists($obj, $action)) {
    die('Ação não encontrada');
}

$obj->$action();
