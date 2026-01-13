<?php
require_once 'includes/protect.php';

$titulo = $_POST['titulo'] ?? '';
$descricao = $_POST['descricao'] ?? '';
$data_inicio = $_POST['data_inicio'] ?? '';
$data_prazo = $_POST['data_prazo'] ?? '';


if (!isset($_SESSION['tarefas'])) {
    $_SESSION['tarefas'] = [];
}

$_SESSION['tarefas'][] = [
    'id' => uniqid(),
    'titulo' => $titulo,
    'descricao' => $descricao,
    'status' => 'Pendente',
    'data_criacao' => date('Y-m-d'),
    'data_inicio' => $data_inicio,
    'data_prazo' => $data_prazo
];


header('Location: dashboard.php');



?>