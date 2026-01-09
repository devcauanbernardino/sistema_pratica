<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark px-3">
    <span class="navbar-text text-white">
        <?= $_SESSION['nome'] ?>
    </span>
    <a href="logout.php" class="btn btn-danger btn-sm">Sair</a>
</nav>

<main class="flex-fill">
    <div class="container mt-4">