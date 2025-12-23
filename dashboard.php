<?php 

require_once 'validador_acesso.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <?php 
                echo "<h4 class='mb-0'>Dashboard - Perfil: " . $_SESSION['perfil_id'] . "</h4>";
            ?>
        </div>

        <div class="card-body">

            <h5>Bem-vindo, 
                <!-- PHP AQUI (nome do usuário da session) -->
                 <?php 
                    echo $_SESSION['nome'];
                 ?>!
            </h5>

            <p class="text-muted">
                Você está logado usando sessão.
            </p>

            <a href="logout.php" class="btn btn-danger">Sair</a>

        </div>
    </div>

</div>

</body>
</html>
