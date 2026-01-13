<?php 

session_start();

$id = $_POST['id'] ?? null;

foreach ($_SESSION['tarefas'] as $index => $tarefa) {
    if ($tarefa['id'] === $id) {
        unset($_SESSION['tarefas'][$index]);
        // Reindexa o array para evitar buracos nos índices
        $_SESSION['tarefas'] = array_values($_SESSION['tarefas']);
        break;
    }
}

$redirect = $_POST['redirect'] ?? '../pages/dashboard.php';

header("Location: ../pages/$redirect");
exit;



?>