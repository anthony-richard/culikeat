<?php

require_once("Controllers/Controller.php");
require_once("session.php");

class HomeController extends Controller {
    public function __construct() {}

    public function index() {
        $data = array("title" => "Home");
        $this->render("home", $data);
    }
     
}