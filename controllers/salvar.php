<?php
require_once '../includes/protect.php';
require_once 'conexao.php';

// Recupera o id do usuário logado pela sessão
$id_usuario = $_SESSION['id_usuario'];

// Recebe os dados do formulário
$titulo = $_POST['titulo'] ?? '';
$descricao = $_POST['descricao'] ?? '';
$data_inicio = $_POST['data_inicio'] ?? '';
$data_prazo = $_POST['data_prazo'] ?? '';

// Validação simples
if (empty($titulo)) {
    header('Location: ../pages/dashboard.php');
    exit;
}

// SQL para inserir a tarefa no banco
$sql = "INSERT INTO tarefas 
        (id_usuario, titulo, descricao, status, data_inicio, prazo) 
        VALUES (?, ?, ?, ?, ?, ?)";

// Prepara a query
$stmt = $conn->prepare($sql);

// Status padrão da tarefa
$status = 'pendente';

// Associa os valores aos parâmetros
$stmt->bind_param(
    "isssss",
    $id_usuario,
    $titulo,
    $descricao,
    $status,
    $data_inicio,
    $data_prazo
);

// Executa o INSERT
$stmt->execute();

// Redireciona para o dashboard
header('Location: ../pages/dashboard.php');
exit;
