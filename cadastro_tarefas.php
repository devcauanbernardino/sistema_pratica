<?php
require_once 'includes/protect.php';
require_once 'includes/header.php';
?>

<div class="d-flex">

    <?php require_once 'includes/sidebar.php'; ?>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="flex-fill p-4" style="min-height: 100vh;">
        <div class="row justify-content-center">
            
            <div class="col-lg-8 col-xl-7">
                <h2 class="mb-4">Cadastrar Nova Tarefa</h2>
                <div class="card shadow-sm">
                    <div class="card-body">

                        <form action="salvar.php" method="POST">

                            <div class="mb-3">
                                <label class="form-label">Título</label>
                                <input
                                    type="text"
                                    name="titulo"
                                    class="form-control"
                                    placeholder="Digite o título da tarefa"
                                    required
                                >
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Descrição</label>
                                <textarea
                                    name="descricao"
                                    class="form-control"
                                    rows="4"
                                    placeholder="Descreva a tarefa"
                                ></textarea>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    Salvar tarefa
                                </button>

                                <a href="dashboard.php" class="btn btn-outline-secondary">
                                    Voltar
                                </a>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </main>
</div>

<?php require_once 'js/js.php'; ?>
<?php require_once 'includes/footer.php'; ?>
