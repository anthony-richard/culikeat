<?php


class View
{
    // champs privé
    private $fileName;

    // constructeur
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }
       /**
     * Générer une vue à partir d'un template et d'un nom de vue
     * @param array $data - Tableau contenant les variables à créer et leur valeur
     */
    public function generate($data)
    {
        // On génère les variables utilisées dans la vue
        extract($data);

        // On démarre l'observation du HTML généré
        ob_start();

        // On Récupère la view
        require("{$this->fileName}View.php");

        // On stocke tout le HTML précédemment généré
        $content = ob_get_clean();

        // Récupère le template associé se servant des variables déclarées
        require("template.php");
    }
}

