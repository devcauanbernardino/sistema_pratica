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