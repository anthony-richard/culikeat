<?php
require_once("Controllers/Controller.php");
require_once("session.php");

class ErrorController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = array("title" => "Erreur 404");
        $this->render("error404", $data);
    }
}

