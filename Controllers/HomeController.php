<?php

require_once("Controllers/Controller.php");
require_once("session.php");


class HomeController extends Controller {
    public function __construct() {}

    public function index() {
        
        //getAllRestaurant
        $allRestaurateur = Restaurateur::getAllRestaurateur();
        // $session = Session::get();
        // $user = new User($session["userData"]);
        $allpostRestaurateur = array();
        var_dump($allRestaurateur);
       //$allpostRestaurateur = $idRestaurant ->getDataArray();
        
        $data = array("title" => "Home","allRestaurant"=>$allRestaurateur);
        $this->render("home", $data);
    }
    
     
}