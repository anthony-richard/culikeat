<?php
class ProfilController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {

        // Si la session n'est pas créée
        if (!Session::isCreated()) {
            // Alors je redirige vers la page de connexion
            header("Location: index.php?action=login");
            exit;
        }

        $data = array("title" => "Profil");
        $this->render("profil", $data);
    }
}
