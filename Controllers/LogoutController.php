<?php

require_once("Controllers/controller.php");
require_once("session.php");

class LogoutController extends Controller{
    public function __construct() {}
    public function index(){
        
        // quand l'utilisateur se déconnecte on doit détruire la session
        Session::destroy();

        // on ajoute à data un tableau avec un titre 
        // $data à suivre dans le Controller.php
        $data = array("title" => "Deconnexion");

        // nom de la view = logout
        // avec data un tableau qui a comme titre "Deconnexion"
        // render = permet le rendu de la view logout
        $this->render("logout", $data);
    }
}