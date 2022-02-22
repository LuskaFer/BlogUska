
<body>

        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a>CONTROLE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a target='_blank' class="nav-link px-lg-3 py-3 py-lg-4" href="<?= base_url(); ?>">Ver site</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 menu-open">Trabalhos</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= base_url('setup'); ?>">Configurações</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= base_url('setup/logout'); ?>">SAIR</a></li>
                    </ul>
                </div>
            </div>
        </nav>

            <!-- Menu suspenso lateral -->
            <div class="menu-overlay"></div>
            <div class="side-menu-wrapper">
            <a href="#" class="menu-close">×</a>
                <ul>
                    <li><a href="<?= base_url('trabalho/cadastrar')?>">INSERIR</a></li>
                    <li><a href="<?= base_url('trabalho/listar')?>">LISTAR</a></li>
                </ul>
            </div>  
            <!-- Menu suspenso lateral -->
</body>