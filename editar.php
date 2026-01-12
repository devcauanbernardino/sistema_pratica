<?php 

session_start();

$id = $_POST['id'] ?? null;
$titulo = $_POST['titulo'] ?? '';
$descricao = $_POST['descricao'] ?? '';

foreach ($_SESSION['tarefas'] as $index => $tarefa) {
    if ($tarefa['id'] === $id) {
        $_SESSION['tarefas'][$index]['titulo'] = $titulo;
        $_SESSION['tarefas'][$index]['descricao'] = $descricao;
        break;
    }
}

$redirect = $_POST['redirect'] ?? 'dashboard.php';

header("Location: $redirect");
exit;

?>