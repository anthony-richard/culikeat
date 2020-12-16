<?php

require_once("Models/Model.php");

class Message extends Model
{
    // champs
    private $id;
    private $post;

    public static $tableName = "messages";

    public function __construct($data = array())
    {
        $this->hydrate($data);
    }

    /* ----------------------------------------------
        Setters
    -------------------------------------------------*/
    public function setId($id)
    {
        $this->id = intval($id);
    }

    public function setPost($post)
    {
        $this->post = $post;
    }

    /* ----------------------------------------------
        Getters
    -------------------------------------------------*/
    public function getId()
    {
        return intval($this->id);
    }

    public function getPost()
    {
        return $this->post;
    }

    /* ----------------------------------------------
        méthodes
    -------------------------------------------------*/
    // On surcharge le parent
    public function refresh()
    {
        parent::refreshModel(array("post" => $this->post));
    }

    //  methode qui renvoie un tableau de messages
    public function getDataArray()
    {
        return array(
            "post" => $this->getPost(),
        );
    }

    // methode qui renvoie un message en fonction d'un id
    public static function getMessageById($id)
    {
        // Appelle “findBy” de “Model”
        $data = self::_findOneBy(self::$tableName, array("idUser"=> $id));

        if ($data) {
            // On crée un message à partir des données
            $message = new Message($data);
            return $message;
        } else {
            echo "<p>/!\ Je n'ai pas pu récupérer le message </p>";
            return null;
        }  
    }

    // methode qui renvoie tous les messages
    public static function getAllMessages()
    {
        // Appelle “findBy” de “Model”
        $data = self::_findAllBy(self::$tableName, array());

        if ($data) {
            // On renvoie tous les messages trouvés
            return $data;
        } else {
            echo "<p>/!\ Je n'ai pas pu récupérer les messages</p>";
            return array();
        }
    
    }
}
