<?php

class User extends Models
{

    // Champs privés issus des colonnes de la BDD
    private $id;
    private $firstname;
    private $lastName;
    private $email;
    private $password;
    private $role;

    // Table associée à la classe
    private $tableName = "utilisateurs";

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
        $resultPDO = parent::findBy($this->tableName, array("email" => $email, "password" => $password));
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
        $resultPDO = parent::findBy($this->tableName, array("email" => $this->email));
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
        parent::create($this->tableName, $data);

        // On récupére l'ID qui vient d'être généré pour cette donnée.

        // Appelle “findBy” de “Model”
        $resultPDO = parent::findBy($this->tableName, array("email" => $this->email, "password" => $this->password));
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
        parent::update($this->tableName, $data, $dataCondition);
    }

    public function deleteFromBDD()
    {
        $dataCondition = array(
            "id" => $this->id,
        );
        parent::delete($this->tableName, $dataCondition);
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

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setMdp($password)
    {
        $this->password = $password;
    }

    public function setPrenom($firstname)
    {
        $this->prenom = $firstname;
    }

    public function setNom($lastName)
    {
        $this->nom = $lastName;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    /* ----------------------------------------------
        Getters
    -------------------------------------------------*/

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMdp()
    {
        return $this->password;
    }

    public function getPrenom()
    {
        return $this->firstname;
    }

    public function getNom()
    {
        return $this->lastName;
    }

    public function getrole()
    {
        return $this->role;
    }

    

    /**
     * Renvoie tous les champs privés sous forme de tableau sauf l'id
     */
    public function getDataArray()
    {
        return array(
            "email" => $this->email,
            "password" => $this->mdp,
            "firstName" => $this->prenom,
            "lastName" => $this->nom,
            "role" => $this->role,
        );
    }

    /**
     * Met à jour les setters associés aux clés de data
     * @param Integer $id - Id de l'utilisateur dans la base de données
     */
    public function getUserById($id)
    {
        // Appelle “findBy” de “Model”
        $resultPDO = parent::findBy($this->tableName, array("id" => $id));

        // pour récupérer toutes les données sur l’utilisateur associé à l’id 
        $data = $resultPDO->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            // On crée un utilisateur à partir des données
            $this->hydrate($data);
            return $this;
        } else {
            echo "<p>/!\ Je n'ai pas pu récupérer l'utilisateur avec l'id : {$id}</p>";
            return null;
        }
    }
}