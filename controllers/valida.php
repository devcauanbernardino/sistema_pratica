<?php
session_start();

require_once 'conexao.php';

$email = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

if (empty($email) || empty($senha)) {
    $_SESSION['autenticado'] = 'NAO';
    header('Location: ../pages/login.php?login=campos_vazios');
    exit;
}

// Buscar usuário pelo email
$sql = "SELECT id_usuario, nome, senha FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {

    $usuario = $result->fetch_assoc();

    // Verificar senha
    if (password_verify($senha, $usuario['senha'])) {

        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id_usuario']  = $usuario['id_usuario'];
        $_SESSION['nome']        = $usuario['nome'];

        header('Location: ../pages/dashboard.php');
        exit;
    }
}

// Se chegou aqui, login inválido
$_SESSION['autenticado'] = 'NAO';
header('Location: ../pages/login.php?login=usuario_invalido');
exit;
