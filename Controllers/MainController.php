<?php
require_once("Controllers/Controller.php");
require_once("session.php");

class MainController extends Controller{
    public function __construct(){

    }
    public function index(){
        $data = array("title" => "Main");
        $this->render("main", $data);
    }
}