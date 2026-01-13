<?php
require_once 'protect.php';
?>

<div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="sidebarMenu"
    aria-labelledby="sidebarMenuLabel">

    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">
            <?php echo $_SESSION['nome']; ?>
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Fechar"></button>
    </div>

    <div class="offcanvas-body p-3">
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="dashboard.php" class="nav-link text-white link-secondary">
                    Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="cadastro_tarefas.php" class="nav-link text-white link-secondary">
                    Cadastrar Tarefa
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="consultar_tarefas.php" class="nav-link text-white link-secondary">
                    Consultar Tarefas
                </a>
            </li>
        </ul>
    </div>
</div>