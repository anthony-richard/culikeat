<?
require_once("Configuration.php");

 
function isRestaurateur($userData)
{
    return ($userData["role"] === Configuration::$IS_RESTAURATEUR);
}