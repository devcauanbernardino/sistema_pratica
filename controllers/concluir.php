<?php
require_once '../includes/protect.php';
require_once 'conexao.php';

// ID da tarefa recebida via POST
$id_tarefa = $_POST['id'] ?? null;

// Página para redirecionamento
$redirect = $_POST['redirect'] ?? 'dashboard.php';

// ID do usuário logado
$id_usuario = $_SESSION['id_usuario'];

// Se não vier ID, apenas redireciona
if (!$id_tarefa) {
    header("Location: ../pages/$redirect");
    exit;
}

// Atualiza o status da tarefa para concluída
$sql = "UPDATE tarefas 
        SET status = 'concluida' 
        WHERE id_tarefa = ? 
        AND id_usuario = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id_tarefa, $id_usuario);
$stmt->execute();

// Redireciona de volta
header("Location: ../pages/$redirect");
exit;
