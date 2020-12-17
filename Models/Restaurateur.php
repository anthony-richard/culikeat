<?php

require_once("Models/Model.php");

class Restaurateur extends Model
{

    // Champs privés issus des colonnes de la BDD
    private $id;
    private $idUser;
    private $name_restaurant;
    private $address;
    private $zipCode;
    private $city;

    // Table associée à la classe
   public static $tableName = "restaurateurs";

    public function __construct($data)
    {
        // On utilise la méthode hydrate héritée du parent
        $this->hydrate($data);
    }

    /* ----------------------------------------------
        Utils : Méthodes utiles
    -------------------------------------------------*/
    /**
     * On vérifie si l'utilisateur associé à l'adresse email de l'instance existe dans la BDD
     */
     public function existInBDD() {
        // Appelle “findBy” de “Model”
        $resultPDO = parent::findBy(self::$tableName, array("idUser" => $this->idUser));
        // pour récupérer toutes les données sur l’utilisateur associé à l’id 
        $result = $resultPDO->fetch(PDO::FETCH_ASSOC);

        if($result) {
            // L'utilisateur existe dans la BDD
            return true;
        }
        else {
            // L'utilisateur n'existe pas dans la BDD
            return false;
        }
     }

    

    /* ----------------------------------------------
        Setters
    -------------------------------------------------*/

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function setName_restaurant($name_restaurant)
    {
        $this->name_restaurant = $name_restaurant;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    /* ----------------------------------------------
        Getters
    -------------------------------------------------*/

    public function getId()
    {
        return $this->id;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getName_restaurant()
    {
        return $this->name_restaurant;
    }

    public function getAdress()
    {
        return $this->adress;
    }

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function getCity()
    {
        return $this->city;
    }

    

    /**
     * Renvoie tous les champs privés sous forme de tableau sauf l'id
     */
    public function getDataArray()
    {
        return array(
            "idUser" => $this->idUser,
            "name_restaurant" => $this->name_restaurant,
            "address" => $this->address,
            "zipCode" => $this->zipCode,
            "city" => $this->city,
        );
    }

    /**
     * Met à jour les setters associés aux clés de data
     * @param Integer $id - Id de l'utilisateur dans la base de données
     */
    public static function getRestaurateurByUserId($id)
    {
        // Appelle “findBy” de “Model”
        $data = self::_findOneBy(self::$tableName, array("idUser" => $id));
        
        if ($data) {
            // On crée un utilisateur à partir des données
         $restaurateur = new Restaurateur($data);
            return $restaurateur;
        } else {
            echo "<p>/!\ Je n'ai pas pu récupérer le restaurateur avec l'id : {$id}</p>";
            return null;
        }
    }
    public static function getAllRestaurateur()
    {
        // Appelle “findBy” de “Model”
        $data = self::_findAllBy(self::$tableName, array());

        if ($data) {
            // On renvoie tous les utilisateurs trouvés
            return $data;
        } else {
            echo "<p>/!\ Je n'ai pas pu récupérer de restaurateur</p>";
            return array();
        }
    }

    
    /**
     * Met à jour les setters associés aux clés de data
     * @param Integer $id - Id de  restaurateur dans la base de données
     */
    public static function getRestaurateurById($id)
    {
        // Appelle “findBy” de “Model”
        $data = self::_findOneBy(self::$tableName, array("id" => $id));

        if ($data) {
            // On crée un restaurateur à partir des données
            $restaurateur = new Restaurateur($data);
            return $restaurateur;
        } else {
            echo "<p>/!\ Je n'ai pas pu récupérer le restaurateur avec l'id : {$id}</p>";
            return null;
        }
    }

}