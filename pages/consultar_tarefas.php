<?php
require_once '../includes/protect.php';
require_once '../includes/header.php';
?>

<div class="d-flex">

    <?php require_once '../includes/sidebar.php'; ?>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="container p-4" style="min-height: 100vh;">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Consultar tarefas</h2>

            <a href="cadastro_tarefas.php" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nova tarefa
            </a>
        </div>

        <?php if (!empty($_SESSION['tarefas'])): ?>

            <div class="table-responsive">
                <table class="table table-hover align-middle shadow-sm">
                    <thead class="table-light">
                        <tr>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($_SESSION['tarefas'] as $tarefa): ?>
                            <tr>
                                <td><?= htmlspecialchars($tarefa['titulo']) ?></td>
                                <td><?= htmlspecialchars($tarefa['descricao']) ?></td>

                                <td>
                                    <?php if ($tarefa['status'] === 'Concluida'): ?>
                                        <span class="badge bg-success">Concluída</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Pendente</span>
                                    <?php endif; ?>
                                </td>

                                <td class="text-center">

                                    <!-- EDITAR -->
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalEditar" data-id="<?= $tarefa['id'] ?>"
                                        data-titulo="<?= htmlspecialchars($tarefa['titulo']) ?>"
                                        data-descricao="<?= htmlspecialchars($tarefa['descricao']) ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php else: ?>
            <div class="alert alert-info">
                Nenhuma tarefa cadastrada.
            </div>
        <?php endif; ?>

    </main>
</div>

<!-- MODAL EDITAR / CONCLUIR / EXCLUIR -->
<div class="modal fade" id="modalEditar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Editar tarefa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <!-- EDITAR -->
                <form action="../controllers/editar.php" method="POST" class="mb-3">
                    <input type="hidden" name="id" id="editarId">
                    <input type="hidden" name="redirect" value="<?= basename($_SERVER['PHP_SELF']) ?>">

                    <div class="mb-2">
                        <label class="form-label">Título</label>
                        <input type="text" name="titulo" id="editarTitulo" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea name="descricao" id="editarDescricao" class="form-control" required></textarea>
                    </div>

                    <button class="btn btn-primary w-100">
                        Salvar alterações
                    </button>
                </form>


                <!-- CONCLUIR -->
                <form action="../controllers/concluir.php" method="POST" class="mb-2">
                    <input type="hidden" name="id" id="concluirId">
                    <input type="hidden" name="redirect" value="<?= basename($_SERVER['PHP_SELF']) ?>">

                    <button class="btn btn-success w-100">
                        Concluir tarefa
                    </button>
                </form>


                <!-- EXCLUIR -->
                <form action="../controllers/excluir.php" method="POST">
                    <input type="hidden" name="id" id="excluirId">
                    <input type="hidden" name="redirect" value="<?= basename($_SERVER['PHP_SELF']) ?>">

                    <button class="btn btn-danger w-100">
                        Excluir tarefa
                    </button>
                </form>


            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

    const modalEditar = document.getElementById('modalEditar');

    modalEditar.addEventListener('show.bs.modal', function (event) {

        const button = event.relatedTarget;

        const id = button.getAttribute('data-id');
        const titulo = button.getAttribute('data-titulo');
        const descricao = button.getAttribute('data-descricao');

        document.getElementById('editarId').value = id;
        document.getElementById('editarTitulo').value = titulo;
        document.getElementById('editarDescricao').value = descricao;

        document.getElementById('concluirId').value = id;
        document.getElementById('excluirId').value = id;
    });

});
</script>


<?php require_once '../js/js.php'; ?>
<?php require_once '../includes/footer.php'; ?>