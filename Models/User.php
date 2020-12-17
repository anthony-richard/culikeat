<?php

require_once("Models/Model.php");

class User extends Model
{

    // Champs privés issus des colonnes de la BDD
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $role;

    // Table associée à la classe
    public static $tableName = "utilisateurs";

    public function __construct($data)
    {
        parent::__construct();
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
        $resultPDO = parent::findBy(self::$tableName, array("email" => $email, "password" => $password));
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
    public function existInBDD()
    {
        // Appelle “findBy” de “Model”
        $resultPDO = parent::findBy(self::$tableName, array("email" => $this->email));
        // pour récupérer toutes les données sur l’utilisateur associé à l’id 
        $result = $resultPDO->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // L'utilisateur existe dans la BDD
            return true;
        } else {
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

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
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

    public function getPassword()
    {
        return $this->password;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getRole()
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
            "password" => $this->password,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "role" => $this->role,
        );
    }

    /**
     * Met à jour les setters associés aux clés de data
     * @param Integer $id - Id de l'utilisateur dans la base de données
     */
    public static function getUserById($id)
    {
        // Appelle “findBy” de “Model”
        $data = self::_findOneBy(self::$tableName, array("id" => $id));

        if ($data) {
            // On crée un utilisateur à partir des données
            $user = new User($data);
            return $user;
        } else {
            echo "<p>/!\ Je n'ai pas pu récupérer l'utilisateur avec l'id : {$id}</p>";
            return null;
        }
    }
    /**
     * Met à jour les setters associés aux clés de data
     */
    public static function getAllUsers()
    {
        // Appelle “findBy” de “Model”
        $data = self::_findAllBy(self::$tableName, array());

        if ($data) {
            // On renvoie tous les utilisateurs trouvés
            return $data;
        } else {
            echo "<p>/!\ Je n'ai pas pu récupérer d'utilisateurs</p>";
            return array();
        }
    }
}
