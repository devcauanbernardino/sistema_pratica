<script>
    document.body.style.backgroundColor = '#dfdfdfa4';
    document.getElementById('current-datetime').innerText = format;

    document.getElementById('modalEditar').addEventListener('show.bs.modal', function (event) {
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


    const modalEditar = document.getElementById('modalEditar');

    modalEditar.addEventListener('show.bs.modal', function (event) {
        const botao = event.relatedTarget;

        const id = botao.getAttribute('data-id');
        const titulo = botao.getAttribute('data-titulo');
        const descricao = botao.getAttribute('data-descricao');

        // Preenche o modal
        document.getElementById('modalTitulo').innerText = titulo;
        document.getElementById('modalDescricao').innerText = descricao;

        // Preenche os inputs hidden
        document.getElementById('tarefaConcluir').value = id;
        document.getElementById('tarefaExcluir').value = id;
    });
</script>