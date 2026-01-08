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