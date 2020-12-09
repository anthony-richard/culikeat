<h1>Connecter vous !!</h1>

<?php if (isset($error)) : ?>
    <h2 style="color:red"><?= $error ?></h2>
<?php endif ?>

<form action="#" method="POST">
<div class="form-group">
    <p>Email : <input class="form-control" type="email" name="email"></p>
    <p>Mot de passe : <input class="form-control" type="password" name="password"></p>
    <p><button class="btn btn-primary" type="submit">Se connecter</button></p>
</div>
</form>
