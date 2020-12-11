<?php

// require 
require("Views/view.php");
require("Controllers/ErrorController.php");
require("Controllers/HomeController.php");
require("Controllers/LoginController.php");
require("Controllers/LogoutController.php");
require("Controllers/MainController.php");
require("Controllers/ProfilController.php");
require("Controllers/RegisterController.php");

class Router
{
    // champs privés
    private $errorController;
    private $homeController;
    private $loginController;
    private $logoutController;
    private $mainController;
    private $profilController;
    private $registerController;


    public function __construct()
    {
        $this->errorController        = new ErrorController();
        $this->homeController         = new HomeController();
        $this->loginController        = new LoginController();
        $this->logoutController       = new LogoutController();
       // $this->mainController         = new MainController();
        $this->profilController       = new ProfilController();
        $this->registerController     = new RegisterController();
    }

    public function routerRequest()
    {
        if (isset($_GET["action"])) {

            // le chemin/la redirection se fait par rapport à l'action
            switch ($_GET["action"]) {
                
                // dirige vers une page d'erreur
                case "error":
                    $this->errorController->index();
                break;

                 // dirige vers la page d'accueil
                case "home":
                    $this->homeController->index();
                break;

                // dirige vers la page de connexion
                case "login":
                    $this->loginController->index();
                break;

                // dirige vers la page de déconnexion
                case "logout":
                    $this->logoutController->index();
                break;

                // dirige vers la page principale, du restaurant avec les critiques
                case "main":
                    $this->mainController->index();
                break;

                // dirige vers la page de profil de l'utilisateur
                case "profil":
                    $this->profilController->index();
                break;

                // dirige vers la page d'inscription
                case "register":
                    $this->registerController->index();
                break;
            }
        }
        // Par défaut on redirige vers la page home donc la page d'accueil.
        else {
            header("Location: index.php?action=home");
            exit;
        }
    }
}
