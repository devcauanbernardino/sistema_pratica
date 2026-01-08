<?php
require_once 'includes/protect.php';

$titulo = $_POST['titulo'] ?? '';
$descricao = $_POST['descricao'] ?? '';

if (!isset($_SESSION['tarefas'])) {
    $_SESSION['tarefas'] = [];
}

$_SESSION['tarefas'][] = [
    'id' => uniqid(),
    'titulo' => $titulo,
    'descricao' => $descricao,
    'status' => 'pendente'
];

header('Location: dashboard.php');



?>