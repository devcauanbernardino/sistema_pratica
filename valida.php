<?php

session_start();

require_once 'classes/Auth.php';

$auth = new Auth();

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];

if ($auth->autenticar($usuario, $senha, $nome)) {
    header('Location: dashboard.php');
    exit;
} else {
    $_SESSION['autenticado'] = 'NAO';
    header('Location: login.php?login=usuario_invalido');
    exit;

}


?>