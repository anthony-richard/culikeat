<?php

class LogoutController extends Controller{
    public function index(){
        
        // quand l'utilisateur se déconnecte on doit détruire la session
        Session::destroy();

        $data = array("title" => "Deconnexion");
        // nom de la view = logout
        // avec data un tableau qui a comme titre "Deconnexion"
        // render = permet le rendu de la view logout
        $this->render("logout", $data);
    }
}