<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgba(223, 223, 223, 0.643);
        }
    </style>
</head>

<body>

   <div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="text-center mb-4">Cadastro de Usuário</h4>

                    <form action="../controllers/cadastrar.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" required placeholder="Nome">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required placeholder="Seu email">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <input type="password" name="senha" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Cadastrar
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>
