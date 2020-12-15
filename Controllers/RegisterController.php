<?php

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
                $role = $_POST["role"];

                $user = new User(array(
                    
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "email" => $email,
                    "role" => $role,
                    "password" => hash("sha256", $_POST["password"])
                ));

            

                // si restaurateur = oui, on crée un restaurateur
                if ($role === "oui") {

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
                }


                // on regarde si l'utilisateur existe déja dans la bdd
                if ($user->existInBDD() || $userRestaurateur->existInBDD()) {
                }
                // on ajoute l'utilisateur à la BDD
                else {
                    $user->pushToBDD() || $userRestaurateur->pushToBDD();

                    // puis on crée une session pour l'utilisateur 
                    // s'il s'inscrit, il sera forcément connecté 
                    Session::create($user) || Session::create($restaurateur);

                    // on le redirige vers la page d'accueil 
                    header("Location: index.php?action=profil");
                    exit;
                }
            }
        }
    }
}
