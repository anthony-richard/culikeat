<?php

require_once("Configuration.php");


class BDD
{
    // champs qui aura l'instance de notre classe
    protected static $instance;

    // instance de la PDO
    protected static $bdd;

    private static $host;
    private static $nameBDD;
    private static $username;
    private static $password;

    protected function __construct()
    {
        self::$host     = Configuration::$host;
        self::$nameBDD  = Configuration::$nameBDD;
        self::$username = Configuration::$username;
        self::$password = Configuration::$password;
        self::connect();
    }

    // methode qui permet de se connecter à la BDD
    protected static function connect(){
        $host       = self::$host;
        $nameBDD    = self::$nameBDD;
        $username   = self::$username;
        $password   = self::$password;

        try {
            self::$bdd = new PDO("mysql:host={$host};dbname={$nameBDD};charset=utf8", $username, $password);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
        return self::$bdd;
    }

    //  Renvoie une instance une fois créée, et la créer si elle n'existe pas
    public static function getInstance(){
        if(!isset($instance)){
            self::$instance = new self;
        }
            return self::$instance;
    }
     
    // pour executer une requete 
    /**
    * @param String $sql - Requête SQL
    * @param Array $data - Tableau de paramètres, null de base
    */
    public static function executeRequest($sql, $data = array())
    {
        //  on doit prendre la BDD à laquelle on se connecte
        $instance = self::getInstance();
        var_dump($instance);
        $bdd = self::getBDD();



        //  si data est vide ou non défini
        if(!isset($data) || sizeof($data)===0){
            // On exécute la requête SQL sans avoir besoin de $data
            $result = $bdd->query($sql);
        } else {
            // on fait la requete sql grace à data
            $request = $bdd->prepare($sql);
            $result = $request->execute($data);
        }
        return $result;
    }

    public static function getBDD(){
     return self::$bdd;
        
    }
}
