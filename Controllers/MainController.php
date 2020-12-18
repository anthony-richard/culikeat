<?php
require_once("Controllers/Controller.php");
require_once("Models/Restaurateur.php");
require_once("session.php");
require_once("Models/Message.php");
require_once("Models/User.php");

class MainController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {

        $idRestaurant = intval($_GET["idRestaurant"]);
        $newInstanceRestaurant = Restaurateur::getRestaurateurById($idRestaurant);
        $restaurateurData = $newInstanceRestaurant->getDataArray();

        $allMessages = Message::getAllMessages();
        foreach ($allMessages as $key => $MessageInfo) {
            $idUser = $MessageInfo['idUser'];
            $user = User::getUserById($idUser);
            $allMessages[$key]["nom"] = $user;
        }
        var_dump($allMessages);
        $data = array("title" => "Main", "restaurateurData" => $restaurateurData, "allMessages" => $allMessages);
        $this->render("main", $data);
    }
}
