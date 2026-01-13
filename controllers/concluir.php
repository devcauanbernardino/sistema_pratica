<?php
session_start();

//pega o imput que ta hidden no formulario, serve apenas para identificar qual tarefa concluir
$id = $_POST['id'] ?? null;

// 2. Percorre as tarefas
foreach ($_SESSION['tarefas'] as $index => $tarefa) {
    if ($tarefa['id'] === $id) {
        $_SESSION['tarefas'][$index]['status'] = 'Concluida';
        break;
    }
}

// 3. Volta
$redirect = $_POST['redirect'] ?? '../pages/dashboard.php';

header("Location: ../pages/$redirect");
exit;


?>
