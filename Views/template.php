<!DOCTYPE html>
<html lang="fr">

<head>
  <!--Encodage propre-->
  <meta charset="UTF-8">
  <!--Description du site -->
  <meta name="description" content="Visionnez des milliers d'avis et d'opinions sur les différents restaurants de France">
  <!--Pour le responsive-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Autorise le robot à indexer le site-->
  <meta name="robots" content="index, follow">
  <!--Mots clés-->
  <meta name="keywords" content="nourriture,restaurant,critique,réseau social,frite,hamburger,chinois">
  <!--Date du création du site-->
  <meta name="Date-Creation-yyyymmdd" content="20201210 11:06:33.18">
  <!--Les auteurs-->
  <meta name="author" content="Joshua Back,Anthony Richard,Thomas Dalleau">
  <!-- titre -->
  <title><?= $title ?></title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- favicon -->
  <link rel="icon" type="image/png" alt="icon" href="images/icone.png" />
  <!-- link css -->
  <link rel="stylesheet" href="Css/style.css">
</head>

<body>
  <header role="banner">
    <!-- Navbar -->
    <?php require_once("partials/_navbarView.partial.php") ?>
    <!-- /Navbar -->
  </header>
  <!-- Main container -->
  <main role="main" id="main" class="main-container container p-3 my-3 border">
    <?= $content ?>
  </main>
  <!-- /Main container -->
  <footer>
    <!-- Footer -->
    <?php require_once("partials/_footerView.partial.php") ?>
    <!-- /Footer -->
  </footer>
  <!-- Fichiers Javascript bootstrap-->
  <!-- jQuery and JS bundle w/ Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>