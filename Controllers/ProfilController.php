<?php
require_once("Controllers/controller.php");
require_once("session.php");
require_once("Models/User.php");
class ProfilController extends Controller
{
    public function __construct(){}

    public function index()
    {

        // Si la session n'est pas créée
        if (!Session::isCreated()) {
            // Alors je redirige vers la page de connexion
            header("Location: index.php?action=login");
            exit;
        }

        // La session est donc créée (sinon on aurait été redirigé)
        // On peut donc la récupérer
        $session = Session::get();
        
        $user = new User($session["userData"]);

        $tousLesUtilisateurs = array();

        // On vérifie si il est un administrateur
        if($user->getRole() == 1) {
            $tousLesUtilisateurs = User::getAllUsers();
        }

        $data = array("title" => "Profil", "allUsers" => $tousLesUtilisateurs);
        $this->render("profil", $data);
    }
}
