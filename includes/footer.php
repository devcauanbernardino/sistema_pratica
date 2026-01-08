<footer class="bg-dark text-light ">
    <div class="container py-4">
        <div class="row">
            <!-- Sistema -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Sistema</h5>
                <p class="mb-1">Painel administrativo</p>
                <small class="text-secondary">
                    Desenvolvido para estudos em PHP
                </small>
            </div>

            <!-- Usuário -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Usuário logado</h5>
                <p class="mb-1"><?= $_SESSION['nome'] ?></p>
                <small class="text-secondary">
                    Perfil: <?= $_SESSION['perfil_id'] ?>
                </small>
            </div>

            <!-- Data -->
            <div class="col-md-4 mb-3 text-md-end">
                <h5 class="fw-bold">Acesso</h5>
                <p class="mb-1">
                    <?= date('d/m/Y') ?>
                </p>
            </div>

        </div>

        <hr class="border-secondary">

        <div class="text-center">
            <small class="text-secondary">
                © <?= date('Y') ?> • Sistema em PHP • Cauan Bernardino
            </small>
        </div>
    </div>
</footer>

<!-- fecha container do header -->
</body>
</html>
