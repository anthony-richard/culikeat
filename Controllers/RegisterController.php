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
                // on regarde si l'utilisateur est un restaurateur ou non
                // si non on crée un new utilisateur
                if($restaurateur = "non"){
                $email  = $_POST["email"];
                $prenom = $_POST["prenom"];
                $nom    = $_POST["nom"];
                $restaurateur = $_POST["restaurateur"];

                $user = new User(array(
                    "email" => $email,
                    "prenom" => $prenom,
                    "nom" => $nom,
                    "restaurateur" => $restaurateur,
                    "mdp" => hash("sha256", $_POST["password"])
                ));
                }   
                // si oui on crée un new restaurateur
                else{
                    $email  = $_POST["email"];
                    $prenom = $_POST["prenom"];
                    $nom    = $_POST["nom"];
                    $restaurateur = $_POST["restaurateur"];
                    $nomRestaurant = $_POST["nom_restaurant"];
                    $adresse = $_POST["adress"];
                    $ville = $_POST["city"];
                    $codePostale = $_POST["zipCode"];
                    
    
                    $userRestaurateur = new Restaurateur(array(
                        "email" => $email,
                        "prenom" => $prenom,
                        "nom" => $nom,
                        "restaurateur" => $restaurateur,
                        "nom_restaurant" => $nomRestaurant ,
                        "adress" => $adresse ,
                        "city" => $ville,
                        "zipCode" => $codePostale,
                        "mdp" => hash("sha256", $_POST["password"])
                    ));
                }
                // on regarde si l'utilisateur existe déja dans la bdd
                if ($user->existInBDD()|| $userRestaurateur->existInBDD()) {
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
