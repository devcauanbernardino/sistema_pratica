<?php
require_once 'protect.php';

?>

<nav class="bg-dark text-white p-3 collapsed show"
     style="width:250px; min-height:100vh;" id="sidebarMenu">

    <div>
        <h5 class="mb-4"><?php echo $_SESSION['nome']?></h5>

        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="dashboard.php" class="nav-link link-secondary">Dashboard</a>
            </li>
            <li class="nav-item mb-2">
                <a href="cadastro_tarefas.php" class="nav-link link-secondary">Cadastrar Tarefa</a>
            </li>
            <li class="nav-item mb-2">
                <a href="consultar_tarefas.php" class="nav-link link-secondary">Consultar Tarefas</a>
            </li>
        </ul>
    </div>

</nav>


