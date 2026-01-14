<?php
require_once '../includes/protect.php';
require_once 'conexao.php';
require_once '../controllers/conexao.php';

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

// SQL para excluir a tarefa
// Garante que o usuário só apague as próprias tarefas
$sql = "DELETE FROM tarefas 
        WHERE id_tarefa = ? 
        AND id_usuario = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id_tarefa, $id_usuario);
$stmt->execute();

// Redireciona de volta
header("Location: ../pages/$redirect");
exit;
