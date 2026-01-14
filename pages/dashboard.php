<?php
require_once '../includes/protect.php';
require_once '../controllers/conexao.php';
require_once '../includes/header.php';

// ID do usuário logado
$id_usuario = $_SESSION['id_usuario'];

// Buscar tarefas do usuário no banco
$sql = "SELECT * FROM tarefas 
        WHERE id_usuario = ?
        ORDER BY prazo ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();

$resultado = $stmt->get_result();
$tarefas = $resultado->fetch_all(MYSQLI_ASSOC);
?>

<div class="d-flex">
    <?php require_once '../includes/sidebar.php'; ?>

    <div class="container p-4">
        <h2 id="saudacao"></h2>
        <p>Data: <strong id="current-datetime"></strong></p>

        <a href="cadastro_tarefas.php" class="btn btn-success mb-4">
            <i class="bi bi-plus-circle"></i> Nova tarefa
        </a>

        <script>
            const hour = new Date().getHours();
            const saudacao = document.getElementById('saudacao');

            if (hour < 12) {
                saudacao.innerText = 'Bom dia, <?= $_SESSION['nome'] ?>!';
            } else if (hour < 18) {
                saudacao.innerText = 'Boa tarde, <?= $_SESSION['nome'] ?>!';
            } else {
                saudacao.innerText = 'Boa noite, <?= $_SESSION['nome'] ?>!';
            }
        </script>

        <h4 class="mt-5 mb-3">Minhas tarefas</h4>

        <div class="row">
            <?php if (!empty($tarefas)): ?>
                <?php foreach ($tarefas as $tarefa): ?>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">

                                <!-- BOTÃO EDITAR -->
                                <button
                                    class="btn btn-sm btn-outline-primary float-end"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEditar"
                                    data-id="<?= $tarefa['id_tarefa'] ?>"
                                    data-titulo="<?= htmlspecialchars($tarefa['titulo']) ?>"
                                    data-descricao="<?= htmlspecialchars($tarefa['descricao']) ?>"
                                >
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <h5><?= htmlspecialchars($tarefa['titulo']) ?></h5>
                                <p><?= htmlspecialchars($tarefa['descricao']) ?></p>

                                <small class="text-muted d-block mb-2">
                                    Criada em <?= date('d/m/Y', strtotime($tarefa['criado_em'])) ?>
                                </small>

                                <?php if ($tarefa['status'] === 'concluida'): ?>
                                    <span class="badge bg-success">Concluída</span>
                                <?php elseif ($tarefa['status'] === 'em_andamento'): ?>
                                    <span class="badge bg-warning text-dark">Em andamento</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Pendente</span>
                                <?php endif; ?>

                                <div class="d-flex justify-content-start align-items-center mt-2">
                                    <small class="text-muted d-block me-3">
                                        <i class="bi bi-play-circle"></i>
                                        Início: <?= date('d/m/Y', strtotime($tarefa['data_inicio'])) ?>
                                    </small>
                                    <small class="text-muted d-block">
                                        <i class="bi bi-flag"></i>
                                        Prazo: <?= date('d/m/Y', strtotime($tarefa['prazo'])) ?>
                                    </small>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhuma tarefa cadastrada.</p>
            <?php endif; ?>
        </div>
    </div>
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
                    <button class="btn btn-success w-100">
                        Concluir tarefa
                    </button>
                </form>

                <!-- EXCLUIR -->
                <form action="../controllers/excluir.php" method="POST">
                    <input type="hidden" name="id" id="excluirId">
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

    const modal = document.getElementById('modalEditar');

    modal.addEventListener('show.bs.modal', function (event) {

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
