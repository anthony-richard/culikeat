<?php

require_once("Controllers/Controller.php");
require_once("session.php");
require_once("Models/User.php");

class RegisterController extends Controller
{
    public function index()
    {

        // Vérification des post 
        // si post vaut 0 le formulaire est vide est donc pas validé
        if (sizeof($_POST) === 0) {
            $this->render("register", array("title" => "Page d'inscription"));
        }

        // sinon c'est que le formulaire a été validé
        else {
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm-password"];

            // on vérifie la confirmation du mot de passe
            // si la confirmation est mauvaise
            if ($password !== $confirm_password) {
                $this->render("register", array("title" => "Page d'inscription", "error" => "Confirmation du mot de passe incorrect"));
            }

            // si la confirmation est bonne
            // on crée un new utilisateur avec ses informations
            else {
                // on créer un utilisateur
                
                $firstName = $_POST["firstName"];
                $lastName    = $_POST["lastName"];
                $email  = $_POST["email"];
                $role = $_POST["restaurateur"];

                $user = new User(array(
                    
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "email" => $email,
                    "role" => $role,
                    "password" => hash("sha256", $_POST["password"])
                ));

                $isUserRestaurateurInBDD=false;

                // si restaurateur = oui, on crée un restaurateur
                if ($role === "1") {

                    $nameRestaurant = $_POST["name_restaurant"];
                    $address = $_POST["address"];
                    $zipCode = $_POST["zipCode"];
                    $city = $_POST["city"];


                    $userRestaurateur = new Restaurateur(array(
                        "name_restaurant" => $nameRestaurant,
                        "address" => $address,
                        "zipCode" => $zipCode,
                        "city" => $city,
                    ));
                    $isUserRestaurateurInBDD = $userRestaurateur->existInBDD();
                }


                // on regarde si l'utilisateur existe déja dans la bdd
                
                if ($user->existInBDD() || $isUserRestaurateurInBDD) {
                    
                }
                // on ajoute l'utilisateur à la BDD
                else {
                    $user->pushToBDD();

                    if(isset($userRestaurateur)){
                        $userRestaurateur->setIdUser($user->getId());
                        $userRestaurateur->pushToBDD();
                        var_dump($userRestaurateur);
                    }

                    // puis on crée une session pour l'utilisateur 
                    // s'il s'inscrit, il sera forcément connecté 
                    Session::create($user);

                    // on le redirige vers la page d'accueil 
                    // header("Location: index.php?action=profil");
                   //exit;
                    var_dump($user);
                    var_dump($_POST);
                    
                }
            }
        }
    }
}
