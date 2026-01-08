<?php
require_once 'includes/protect.php';
require_once 'includes/header.php';
?>

<div class="container mt-4">
    <h3>Cadastrar tarefa</h3>

    <form action="salvar.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar tarefa</button>
    </form>
</div>

</div> <!-- FECHA O CONTAINER AQUI -->

<?php require_once 'includes/footer.php'; ?>
