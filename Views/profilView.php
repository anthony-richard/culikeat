<h1>Bienvenue sur votre profil</h1>
<?php if (isRestaurateur($userData)) : ?>
    <div class="alert alert-primary" role="alert">
        Vous êtes un restaurateur !
    </div>
    <table class="tableProfil">
        <tbody>
            <tr>
                <th scope="row">Prénom</th>
                <th><?= $userData["prenom"] ?></th>
            </tr>
            <tr>
                <th scope="row">Nom</th>
                <th><?= $userData["nom"] ?></th>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <th><?= $userData["email"] ?></th>
            </tr>
            <tr>
                <th scope="row">ville</th>
                <th><?= $userData["ville"] ?></th>
            </tr>
            <tr>
                <th scope="row">code postal</th>
                <th><?= $userData["codePostal"] ?></th>
            </tr>
            <tr>
                <th scope="row">nom entreprise</th>
                <th><?= $userData["entreprise"] ?></th>
            </tr>

        </tbody>
    </table>
<?php else : ?>
    <div class="alert alert-primary" role="alert">
        Vous êtes un utilisateur !
    </div>
    <table class="tableProfil">
        <tbody>
            <tr>
                <th scope="row">Prénom</th>
                <th><?= $userData["prenom"] ?></th>
            </tr>
            <tr>
                <th scope="row">Nom</th>
                <th><?= $userData["nom"] ?></th>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <th><?= $userData["email"] ?></th>
            </tr>
        </tbody>
    </table>
<?php endif ?>