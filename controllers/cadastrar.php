<?php
// Inclui o arquivo de conexão com o banco de dados
require 'conexao.php';

// Variável para armazenar a mensagem que será exibida ao usuário
$mensagem = '';

// Variável para definir o tipo da mensagem (success, danger, warning, etc.)
$tipo = '';

// Verifica se o formulário foi enviado via método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recebe o nome do formulário e remove espaços extras
    $nome  = trim($_POST['nome']);

    // Recebe o e-mail do formulário e remove espaços extras
    $email = trim($_POST['email']);

    // Recebe a senha do formulário
    $senha = $_POST['senha'];

    // Verifica se algum dos campos está vazio
    if (empty($nome) || empty($email) || empty($senha)) {

        // Define mensagem de erro caso algum campo esteja vazio
        $mensagem = "Preencha todos os campos.";

        // Tipo de alerta (vermelho)
        $tipo = "danger";

    } else {

        // SQL para verificar se o e-mail já existe no banco de dados
        $sql = "SELECT id_usuario FROM usuarios WHERE email = ?";

        // Prepara a consulta SQL para evitar SQL Injection
        $stmt = $conn->prepare($sql);

        // Substitui o ? pelo e-mail informado (s = string)
        $stmt->bind_param("s", $email);

        // Executa a consulta
        $stmt->execute();

        // Armazena o resultado para poder contar as linhas retornadas
        $stmt->store_result();

        // Verifica se já existe algum usuário com esse e-mail
        if ($stmt->num_rows > 0) {

            // Mensagem caso o e-mail já esteja cadastrado
            $mensagem = "Este e-mail já está cadastrado.";

            // Tipo de alerta (amarelo)
            $tipo = "warning";

        } else {

            // Criptografa a senha antes de salvar no banco de dados
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // SQL para inserir o novo usuário no banco de dados
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";

            // Prepara a query de inserção
            $stmt = $conn->prepare($sql);

            // Liga os valores aos placeholders (sss = três strings)
            $stmt->bind_param("sss", $nome, $email, $senhaHash);

            // Executa o INSERT no banco de dados
            if ($stmt->execute()) {

                // Mensagem de sucesso
                $mensagem = "Cadastro realizado com sucesso!";

                // Tipo de alerta (verde)
                $tipo = "success";

            } else {

                // Mensagem de erro caso o cadastro falhe
                $mensagem = "Erro ao cadastrar usuário.";

                // Tipo de alerta (vermelho)
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
