<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Login</h4>
                    </div>

                    <div class="card-body">

                        <!-- mensagem de erro via GET -->
                        <!-- PHP AQUI -->

                        <form action="valida.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" name="nome" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Usuário</label>
                                <input type="text" name="usuario" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Senha</label>
                                <input type="password" name="senha" class="form-control" required>
                            </div>

                            <?php
                            if (isset($_GET['login']) && $_GET['login'] == 'erro') {
                                echo '<div class="alert alert-danger" role="alert">
                                    Usuário ou senha inválido(s).
                                  </div>';
                            }
                            ?>

                            <?php
                            if (isset($_GET['login']) && $_GET['login'] == 'erro2') {
                                echo '<div class="alert alert-danger" role="alert">
                                    Faça login antes de acessar as páginas protegidas.
                                  </div>';
                            }
                            ?>

                            <button class="btn btn-success w-100">Entrar</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
