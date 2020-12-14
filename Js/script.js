// Script pour le fichier registerView.php
function printForm(action) {
    if (action == "oui") {
      //on regarde si on veux afficher ou cacher le input
      document.getElementById("block").style.display = "inline"; //Si oui, on l'affiche
    } else {
      document.getElementById("block").style.display = "none"; //Si non, on le cache
    }
    return true;
  }
  