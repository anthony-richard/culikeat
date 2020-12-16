<?php

require_once("session.php");

class Controller
{

    protected function generateView($viewName, $data)
    {
        // génére la view
        $view = new View($viewName);
        $view->generate($data);
    }

    protected function render($viewName, $data)
    {

        // On vérifie si la session de l'utilisateur est créée
        if (Session::isCreated()) {

            // Je récupère la session
            $session = Session::get();

            // J'ajoute les données de l'utilisateur dans celles utilisées par la vue
            // On aura donc une variable $userData dans toutes les vues
            $data["userData"] = $session["userData"];
        } else {
            // Je mets un tableau par défault pour éviter une erreur
            // On aura donc une variable $userData dans toutes les vues mais il faudra faire attention car elle est vide ici
            $data["userData"] = array();
        }

        // Générer la vue
        $view = new View($viewName);
        $view->generate($data);
    }
}
