<?php
class HomeController extends Controller {
    public function __construct() {}

    public function index() {
        $data = array("title" => "Home");
        $this->render("home", $data);
    }
     
}