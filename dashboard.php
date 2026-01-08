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

<script>
    const now = new Date();
    const hour = new Date().getHours();

    const saudacao = document.getElementById('saudacao');

    if (hour < 12) {
        saudacao.innerText = 'Bom dia, <?= $_SESSION['nome'] ?>!';
        document.body.style.backgroundColor = '#e0f7fa';
    } else if (hour < 18) {
        saudacao.innerText = 'Boa tarde, <?= $_SESSION['nome'] ?>!';
        document.body.style.backgroundColor = '#fff3e0';
    } else {
        saudacao.innerText = 'Boa noite, <?= $_SESSION['nome'] ?>!';
        document.body.style.backgroundColor = '#ede7f6';
    }

    const format = now.toLocaleDateString('pt-BR', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });

    document.getElementById('current-datetime').innerText = format;

</script>

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

</div> <!-- FECHA O CONTAINER AQUI -->

<?php
require_once 'includes/footer.php';
?>





