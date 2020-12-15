<?php

require_once("BDD.php");

abstract class Model extends BDD
{

    public static $tableName;

    /**
     * Met à jour les champs privés à partir des clés contenues dans le tableau data
     * Celles-ci permettent d'appeler les setters associés.
     * @param Array $data - Ensemble des setters à mettre à jour
     */
    public function hydrate($data)
    {
        if (sizeof($data) === 0) {
            return;
        }

        // On traite chaque clé du tableau $data
        foreach ($data as $setterName => $value) {
            // On récupère le nom des différents setters dans $data
            // On construit le nom de la méthode à partir de $setterName
            // On met $setterName en minuscule puis on met la première lettre en majuscules
            $method = 'set' . ucfirst(strtolower($setterName));
            // On vérifie que le setter correspondant existe
            if (method_exists($this, $method)) {
                // S'il existe, on l'appelle
                $this->$method($value);
            }
        }
    }

    /**---------------------------------------------------------------
     * Méthodes CRUD
     * ------------------------------------------------------------ */

    protected function create($tableName, $data)
    {

        $colonnes = [];
        $valeurs = [];

        // On récupére les clés et leur valeur associé
        foreach ($data as $key => $value) {
            $colonnes[] = $key;
            $valeurs[] = $value;
        }

        /* // Alternative :
            $colonnes = array_keys($data);
            $valeurs = array_values($data);
        */

        $textColonnes = implode("`, `", $colonnes);
        $textValeurs = implode("', '", $valeurs);

        $sql = "INSERT INTO `{$tableName}` (`{$textColonnes}`) VALUES ('{$textValeurs}')";
        // echo "<p>$sql</p>";

        $this->executeRequest($sql);
        // "INSERT INTO nomDeLaTable (colonne1, colonne2, ...) VALUES (valeur_colonne1, valeur_colonne2, ...)"
    }

    protected static function findBy($tableName, $data)
    {
        // On crée notre requête SQL
        $sql = "SELECT * FROM `{$tableName}`";

        if (sizeof($data) > 0) {
            $sql .= self::_createConditionString($data);
        }
        // echo "<p>$sql</p>";

        // On exécute notre requête SQL puis on renvoie son résultat
        return parent::executeRequest($sql);
    }

    protected function update($tableName, $data, $dataConditions)
    {
        // Liste des colonnes à modifier
        $colonnesToEdit = [];

        foreach ($data as $key => $value) {
            // On ajoute une colonne à éditer au tableau
            // $key est la colonne et $value la nouvelle valeur à utiliser
            $colonnesToEdit[] = "`{$key}` = '{$value}'";
        }

        $textColonneToEdit = implode(", ", $colonnesToEdit);

        //------------------------------------------------------------

        // On crée notre requête SQL
        $sql = "UPDATE `{$tableName}` SET {$textColonneToEdit}";
        $sql .= $this->_createConditionString($dataConditions);
        // echo "<p>$sql</p>";

        // On exécute notre requête SQL
        $this->executeRequest($sql);
    }

    /**
     * Effectue une requête de type DELETE FROM nomDeTable WHERE condition1 AND condition2, ...
     * @param String $tableName - Nom de la table à manipuler
     * @param Array $data - Tableau contenant les données à utiliser comme condition
     */
    protected function delete($tableName, $data)
    {
        // On crée notre requête SQL
        $sql = "DELETE FROM `{$tableName}`";
        $sql .= $this->_createConditionString($data);
        // echo "<p>$sql</p>";

        // On exécute notre requête SQL puis on renvoie son résultat
        $this->executeRequest($sql);
    }

    /**
     * Créer la partie conditionnelle du sql
     * @param Array $data - Tableau contenant les données à utiliser comme condition
     */
    private static function _createConditionString($data)
    {
        // Liste des conditions
        $conditions = [];

        foreach ($data as $key => $value) {
            // On ajoute une condition au tableau
            // $key est la colonne et $value la valeur qui la conditionne
            $conditions[] = "`{$key}` = '{$value}'";
        }

        // On ajoute le séparateur " AND " entre chaque condition du tableau
        $whereString = " WHERE ";
        $whereString .= implode(" AND ", $conditions);
        return $whereString;
    }

    /**
     * Trouve tous les résultats à partir d'un ensemble de conditions
     * @param Array $data - Conditions to give in the SQL Request
     * @param int $nb - Conditions to give in the SQL Request
     */
    private static function _findBy($tableName, $data)
    {
        $resultPDO = self::findBy($tableName, $data);
        return $resultPDO;
    }

    protected static function _findOneBy($tableName, $data)
    {
        $resultPDO = self::_findBy($tableName, $data);
        return $resultPDO->fetch(PDO::FETCH_ASSOC);
    }

    protected static function _findAllBy($tableName, $data)
    {
        $resultPDO = self::_findBy($tableName, $data);
        return $resultPDO->fetchAll(PDO::FETCH_ASSOC);
    }

    public function refreshModel($tableName, $data = array())
    {
        if (sizeof($data) > 0) {
            // Appelle “findBy” de “Model”
            $dataToHydrate = self::_findOneBy($tableName, $data);
            // $resultPDO vaut false si la requête n'a pas récupéré de ligne
            if ($dataToHydrate) {
                $this->hydrate($dataToHydrate);
            } else {
                echo "/!\ Refresh impossible";
            }
        }
    }

    /**
     * On ajoute les données de l'instance dans la table associé de la BDD
     */
    public function pushToBDD()
    {
        $data = $this->getDataArray();
        $this->create($this::$tableName, $data);

        // On récupére l'ID qui vient d'être généré pour cette donnée.
        $this->refreshModel($this::$tableName, $data);
    }

    /**
     * On met à jour les données de l'instance dans la table associé de la BDD
     */
    public function updateInBDD()
    {
        $data = $this->getDataArray();
        $dataCondition = array(
            "id" => $this->getId(),
        );
        $this->update($this::$tableName, $data, $dataCondition);
    }

    /**
     * on supprime les données de l'instance dans la table associé de la BDD
     */
    public function deleteFromBDD()
    {
        $dataCondition = array(
            "id" => $this->getId(),
        );
        $this->delete($this::$tableName, $dataCondition);
    }

    // On oblige tous les enfants à avoir cette méthode
    abstract public function getDataArray();

    abstract public function getId();
}
