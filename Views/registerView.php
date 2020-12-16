<h1>Page d'inscription</h1>

<?php if (isset($error)) : ?>
    <h2 style="color:red"><?= $error ?></h2>
<?php endif ?>

<form method="post" action="#">

    <div class="form-group">

        <p>Prénom : <input type="text" name="firstName" id="first-name"></p>
        <p>Nom : <input type="text" name="lastName" id="last-name"></p>
        <p>Email : <input type="email" name="email" id="email"></p>

        <p>Etes-vous un restaurateur ?
            <input type="radio" name="restaurateur" value="1" id="oui" onchange="printForm('oui')" /><label for="oui">Oui</label>
            <input type="radio" name="restaurateur" value="0" id="non" onchange="printForm('non')" checked/><label for="non">Non</label> </br>
            <span id="block">
                Nom du restaurant : <input type="text" name="name_restaurant" id="nameRestaurant">
                Adresse : <input type="text" name="address" id="adress">
                Ville : <input type="text" name="city" id="city">
                Code postale : <input type="text" name="zipCode" id="zipCode">
            </span>
        </p>

        <p>Mot de passe : <input type="password" name="password" id="mdp"></p>
        <p>Confirmation du mot de passe : <input type="password" name="confirm-password" id="confirm-mdp"></p>
        <p><button type="submit" id="btn-submit">S'inscrire</button></p>

    </div>

</form>

<script src="Js/script.js"></script>