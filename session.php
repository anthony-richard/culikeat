<?php
class Session {

/**
 * On crée une session en stockant les données de l'utilisateur à l'intérieur
 * @param User $user - Instance de l'utilisateur courant
 */
public static function create($user) {
    // On récupére la session
    self::checkStatus();
    // On la remplie si elle n'était pas créée sinon on écrase les anciennes valeurs
    $_SESSION["userId"] = $user->getId();
    $_SESSION["userData"] = $user->getDataArray();
    // On ajoute l'id car il n'est pas fournit par $user->getDataArray()
    $_SESSION["userData"]["id"] = $_SESSION["userId"];
}

/**
 * On récupère une session
 */
public static function get() {
    // On récupére la session
    self::checkStatus();
    // On la renvoie
    return $_SESSION;
}

/**
 * On récupère une session
 */
public static function destroy() {
    // On récupére la session
    self::checkStatus();
    // On la détruit
    session_destroy();
    // Alors je redirige vers la page de connexion
    header("Location: index.php?action=home");
    exit;
}

/**
 * On récupère si une session a déjà été créée
 */
public static function isCreated() {
    self::checkStatus();
    if(isset($_SESSION) && isset($_SESSION["userId"]) && isset($_SESSION["userData"])) {
        //echo "Session créée";
        return true;
    }
    else {
        //echo "La session n'est pas créée";
        return false;
    }
}

public static function checkStatus() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

}