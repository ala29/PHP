<header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">ESPACE ADMINISTRATEUR</span>
                <span class="site-heading-lower">BIENVENU ADMIN</span>
            </h1>
</header>
<h2><?php $pagetitle?></h2>
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="">gerer <?=$controller?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href='index.php?controller=acceuil'>MENU</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href='index.php?controller=etudiant'>GERER ETUDIANT</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href='index.php?controller=meet'>GERER MEET</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase"href='index.php?controller=etudiantFormateur'>GERER etudiant Formateur</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase"href='index.php?controller=etudiantEntrepreneur'>GERER etudiant Entreprenur</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase"href='index.php?controller=client'>GERER client</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase"href='index.php?controller=projet'>GERER projet</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase"href='index.php?controller=produits'>GERER produits</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase"href='../index.php'>QUITTER espace admin</a></li>
                    </ul>
                </div>
            </div>
</nav>
<hr>

<div class="allctaa">
        <div class="contctaaa">
            <button class="ctaaa">
            <span><a href=" index.php?controller=<?=$controller?>&action=readAll">liste <?=$controller?></a></span>
            <svg viewBox="0 0 13 10" height="10px" width="15px">
                <path d="M1,5 L11,5"></path>
                <polyline points="8 1 12 5 8 9"></polyline>
            </svg>
            </button>
        </div>

        <div class="contctaaa">
            <button class="ctaaa">
            <span><a href=" index.php?controller=<?=$controller?>&action=create">ajout <?=$controller?></a></span>
            <svg viewBox="0 0 13 10" height="10px" width="15px">
                <path d="M1,5 L11,5"></path>
                <polyline points="8 1 12 5 8 9"></polyline>
            </svg>
            </button>
        </div>

        <div class="contctaaa">
            <button class="ctaaa">
            <span><a href=" index.php?controller=<?=$controller?>&action=statistique">statistique <?=$controller?></a></span>
            <svg viewBox="0 0 13 10" height="10px" width="15px">
                <path d="M1,5 L11,5"></path>
                <polyline points="8 1 12 5 8 9"></polyline>
            </svg>
            </button>
        </div>
</div>













