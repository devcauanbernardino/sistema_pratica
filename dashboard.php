<?php
require_once 'includes/protect.php';
require_once 'includes/header.php';


$dados = [
    'acessos' => rand(10, 100),
    'tarefas' => rand(1, 10),
    'avisos' => rand(0, 3)
];
?>
<h2 id="saudacao"></h2>
<p>Data: <strong id="current-datetime"></strong></p>

<a href="cadastro_tarefas.php" class="btn btn-success mb-4">
    <i class="bi bi-plus-circle"></i> Nova tarefa
</a>

<?php

require_once 'js_date.php';

?>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card p-3">Acessos hoje: <?= $dados['acessos'] ?></div>
    </div>
    <div class="col-md-4">
        <div class="card p-3">Tarefas pendentes: <?= $dados['tarefas'] ?></div>
    </div>
    <div class="col-md-4">
        <div class="card p-3">Avisos: <?= $dados['avisos'] ?></div>
    </div>
</div>

<?php
if ($_SESSION['perfil_id'] === 'Administrativo') {
    echo '<div class="alert alert-warning mt-4">Área administrativa</div>';
}
?>

<h4 class="mt-5 mb-3">Minhas tarefas</h4>
<div class="row">
    <?php if (!empty($_SESSION['tarefas'])): ?>
        <?php foreach ($_SESSION['tarefas'] as $index => $tarefa): ?>
            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <button data-bs-toggle="modal" data-bs-target="#modalEditar-<?= htmlspecialchars($tarefa['id']) ?>" data-id="INDEX_DA_TAREFA"
                            data-titulo="TITULO" data-descricao="DESCRICAO">
                            <i class="bi bi-pencil-square">
                            </i>
                        </button>

                        <h5 class="card-title">
                            <?= htmlspecialchars($tarefa['titulo']) ?>
                        </h5>

                        <p class="card-text">
                            <?= htmlspecialchars($tarefa['descricao']) ?>
                        </p>

                        <span class="badge bg-secondary">
                            <?= ucfirst($tarefa['status']) ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalEditar-<?= htmlspecialchars($tarefa['id']) ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitulo">
                                Editar tarefa
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <p id="modalDescricao" class="mb-4 text-muted"></p>
                            

                            <!-- FORM CONCLUIR -->
                            <form action="tarefas/concluir.php" method="POST" class="d-inline">
                                <input type="hidden" name="id" id="tarefaConcluir">
                                <button class="btn btn-success w-100 mb-2">
                                    Concluir tarefa
                                </button>
                            </form>

                            <!-- FORM EXCLUIR -->
                            <form action="tarefas/excluir.php" method="POST">
                                <input type="hidden" name="id" id="tarefaExcluir">
                                <button class="btn btn-danger w-100">
                                    Excluir tarefa
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhuma tarefa cadastrada.</p>
    <?php endif; ?>
</div>

<!-- MODAL EDITAR TAREFA -->



</div> <!-- FECHA O CONTAINER AQUI -->

<?php
require_once 'includes/footer.php';
?>