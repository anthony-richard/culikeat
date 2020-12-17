<?php
require_once("Controllers/Controller.php");
require_once("Models/Restaurateur.php");
require_once("session.php");

class MainController extends Controller{
    public function __construct(){

    }
    public function index(){
        
        $idRestaurant = intval($_GET["idRestaurant"]);
        $newInstanceRestaurant = Restaurateur::getRestaurateurById($idRestaurant);
        $restaurateurData = $newInstanceRestaurant->getDataArray();

        $data = array("title" => "Main", "restaurateurData" => $restaurateurData);
        $this->render("main", $data);
        
    }
    
}