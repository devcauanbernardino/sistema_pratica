<?php
require_once '../includes/protect.php';
require_once 'conexao.php';

// Dados vindos do formulário
$id_tarefa = $_POST['id'] ?? null;
$titulo = $_POST['titulo'] ?? '';
$descricao = $_POST['descricao'] ?? '';
$redirect = $_POST['redirect'] ?? 'dashboard.php';

// ID do usuário logado
$id_usuario = $_SESSION['id_usuario'];

// Validação básica
if (!$id_tarefa || empty($titulo)) {
    header("Location: ../pages/$redirect");
    exit;
}

// SQL para atualizar a tarefa
$sql = "UPDATE tarefas 
        SET titulo = ?, descricao = ?
        WHERE id_tarefa = ? 
        AND id_usuario = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssii",
    $titulo,
    $descricao,
    $id_tarefa,
    $id_usuario
);

// Executa a atualização
$stmt->execute();

// Redireciona de volta
header("Location: ../pages/$redirect");
exit;
