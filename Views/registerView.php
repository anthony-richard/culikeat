<body onload="printForm('non')" >

    <h1>Page d'inscription</h1>

    <?php if (isset($error)) : ?>
        <h2 style="color:red"><?= $error ?></h2>
    <?php endif ?>

    <form method="post" action="#">
        <div class="form-group">

            <p>Prénom : <input type="text" name="prenom" id="first-name"></p>
            <p>Nom : <input type="text" name="nom" id="last-name"></p>
            <p>Email : <input type="email" name="email" id="email"></p>

            <p>Etes-vous un restaurateur ?
                <input type="radio" name="restaurateur" value="oui" id="oui" onchange="printForm('oui')" /><label for="oui">Oui</label>
                <input type="radio" name="restaurateur" value="non" id="non" onchange="printForm('non')" /><label for="non">Non</label> </br>
                <span id="block">
                    Nom du restaurant : <input type="text" name="nom_restaurant" id="nameRestaurant">
                    Adresse : <input type="text" name="adress" id="adress">
                    Ville : <input type="text" name="city" id="city">
                    Code postale : <input type="text" name="zipCode" id="zipCode">
                </span>
            </p>

            <p>Mot de passe : <input type="password" name="password" id="mdp"></p>
            <p>Confirmation du mot de passe : <input type="password" name="confirm-password" id="confirm-mdp"></p>
            <p><button type="submit" id="btn-submit">S'inscrire</button></p>

        </div>
    </form>
</body>

< <script>
    function printForm(action) {
    if (action == "oui") //on regarde si on veux afficher ou cacher le input
    {
    document.getElementById('block').style.display = "inline"; //Si oui, on l'affiche
    } else {
    document.getElementById('block').style.display = "none"; //Si non, on le cache
    }
    return true;
    }
</script>