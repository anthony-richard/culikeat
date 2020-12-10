<?php
//ne pas oublier les require


class LoginController extends Controllers  {
    public function index(){
          // On vérifie que si $_POST est vide
        // Si c'est le cas alors le formulaire n'a pas été validé
        if (sizeof($_POST) === 0) {
            $this->render("login", array("title" => "Page de login"));
        }
        // Sinon le formulaire a été validé
        else {
            $email = $_POST["email"];
            $password = hash("sha256", $_POST["password"]);
            $user = new User(array());

            // On tente de connecter l'utilisateur à la base données
            // Si on a réussi la méthode renverra true
            if($user->connectToBDD($email, $password)) {

                // On crée une session pour l'utilisateur
                Session::create($user);

                header("Location: index.php?action=profil");
                exit;
            }
            // Sinon elle renverra false et on générera le formulaire avec une erreur
            else {
                $this->render("login", array("title" => "Page de login", "error" => "Identifiant incorrect"));
            }
        }
    }
}