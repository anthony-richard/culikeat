<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" role="navigation">
    <a class="navbar-brand" href="index.php?action=home"><img src="Images/icone.png"><b>Culikeat</b><span style="color:lightgray"></span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">

            <a class="nav-item nav-link" href="index.php?action=home">Accueil</a>

            

            <?php if (sizeof($userData) > 0) : ?>
                <a class="nav-item nav-link tab-profil" href="index.php?action=profil">
                    <?= $userData["firstName"] ?>
                    <?= $userData["lastName"] ?>
                </a>
                <a class="nav-item nav-link" onclick="logout('index.php?action=logout')">Se déconnecter</a>

            <?php else : ?>
                <a class="nav-item nav-link" href="index.php?action=login">Se connecter</a>
                <a class="nav-item nav-link" href="index.php?action=register">S'inscrire</a>
            <?php endif ?>

        </div>
    </div>
</nav>