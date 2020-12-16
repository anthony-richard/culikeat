<?php

require_once("Models/Model.php");

class Restaurateur extends Model
{

    // Champs privés issus des colonnes de la BDD
    private $id;
    private $idUser;
    private $name_restaurant;
    private $adress;
    private $zipCode;
    private $city;

    // Table associée à la classe
    private $tableRestorer = "restaurateurs";

    public function __construct($data)
    {
        // On utilise la méthode hydrate héritée du parent
        $this->hydrate($data);
    }

    /* ----------------------------------------------
        Utils : Méthodes utiles
    -------------------------------------------------*/

    /**
     * On se connecte à la BDD
     */
    public function connectToBDD($email, $password)
    {
        // Appelle “findBy” de “Model”
        $resultPDO = parent::findBy($this->tableRestorer, array("email" => $email, "password" => $password));
        // pour récupérer toutes les données sur l’utilisateur 
        $dataToHydrate = $resultPDO->fetch(PDO::FETCH_ASSOC);
        if ($dataToHydrate) {
            $this->hydrate($dataToHydrate);
            return true;
        } else {
            echo "/ ! \ Utilisateur introuvable ou identifiant invalide";
            return false;
        }
    }

    /**
     * On vérifie si l'utilisateur associé à l'adresse email de l'instance existe dans la BDD
     */
     public function existInBDD() {
        // Appelle “findBy” de “Model”
        $resultPDO = parent::findBy($this->tableRestorer, array("email" => $this->email));
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

    /**
     * On ajoute les données de l'instance dans la table associé de la BDD
     */
    public function pushToBDD()
    {
        $data = $this->getDataArray();
        parent::create($this->tableRestorer, $data);

        // On récupére l'ID qui vient d'être généré pour cette donnée.

        // Appelle “findBy” de “Model”
        $resultPDO = parent::findBy($this->tableRestorer, array("email" => $this->email, "password" => $this->password));
        // pour récupérer toutes les données sur l’utilisateur associé à l’id 
        $dataToHydrate = $resultPDO->fetch(PDO::FETCH_ASSOC);

        // $resultPDO vaut false si la requête n'a pas récupéré de ligne
        if ($resultPDO) {
            $this->hydrate($dataToHydrate);
        } else {
            echo "/ ! \ Utilisateur introuvable";
        }
    }

    public function updateInBDD()
    {
        $data = $this->getDataArray();
        $dataCondition = array(
            "id" => $this->id,
        );
        parent::update($this->tableRestorer, $data, $dataCondition);
    }

    public function deleteFromBDD()
    {
        $dataCondition = array(
            "id" => $this->id,
        );
        parent::delete($this->tableRestorer, $dataCondition);
    }

    public function refresh() {

    }

    /* ----------------------------------------------
        Setters
    -------------------------------------------------*/

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setidUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function setRetorer($name_restaurant)
    {
        $this->name_restaurant = $name_restaurant;
    }

    public function setPrenom($address)
    {
        $this->address = $address;
    }

    public function setNom($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    public function setRole($city)
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
            "email" => $this->email,
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
    public function getUserById($id)
    {
        // Appelle “findBy” de “Model”
        $resultPDO = parent::findBy($this->tableRestorer, array("id" => $id));

        // pour récupérer toutes les données sur l’utilisateur associé à l’id 
        $data = $resultPDO->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            // On crée un utilisateur à partir des données
            $this->hydrate($data);
            return $this;
        } else {
            echo "<p>/!\ Je n'ai pas pu récupérer le restaurateur avec l'id : {$id}</p>";
            return null;
        }
    }
}