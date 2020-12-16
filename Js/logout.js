
function logout(redirURL) {

    const choice = confirm("Voulez-vous vous déconnecter ?");

    if(choice) {
        // On redirige l'utilisateur vers la page de déconnexion
        document.location.href = redirURL;
    }
    else {
        // On ne fait rien
    }
}