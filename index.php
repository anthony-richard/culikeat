<?php

require("router.php");
require_once("session.php");

// On fait un session_start avant que du contenu soit affiché
Session::checkStatus();

// On crée le routeur
$router = new Router();
$router->routerRequest();