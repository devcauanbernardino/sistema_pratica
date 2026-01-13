<?php
require 'conexao.php';

$mensagem = '';
$tipo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome  = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    if (empty($nome) || empty($email) || empty($senha)) {
        $mensagem = "Preencha todos os campos.";
        $tipo = "danger";
    } else {

        // Verificar email duplicado
        $sql = "SELECT id_usuario FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $mensagem = "Este e-mail já está cadastrado.";
            $tipo = "warning";
        } else {

            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $nome, $email, $senhaHash);

            if ($stmt->execute()) {
                $mensagem = "Cadastro realizado com sucesso!";
                $tipo = "success";
            } else {
                $mensagem = "Erro ao cadastrar usuário.";
                $tipo = "danger";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado do Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="alert alert-<?= $tipo ?> text-center">
                <?= $mensagem ?>
            </div>

            <div class="text-center">
                <a href="../pages/login.php" class="btn btn-secondary">Ir para o login</a>
            </div>

        </div>
    </div>
</div>

</body>
</html>
