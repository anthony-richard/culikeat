<script> function filterRestaurateur(motsRecherches) {
    const section = document.getElementById("Restaurateur");

    // On récupére tous les éléments possédant la classe '.Restaurateur'
    const messages = sectionMessages.querySelectorAll(".Restaurateur"); //<--- querySelectorAll renvoit un tableau

    // On liste chaque article de articles
    messages.forEach(

        // On s'intéresse à un article de articles
        (article) => {


            // On teste si contenuRecherche est dans contenuDescription
            if (contenuDescription.indexOf(contenuRecherche) === -1) {
                article.style.display = "none";
            }
            else {
                article.style.display = "block";
            }
        });

}
</script>