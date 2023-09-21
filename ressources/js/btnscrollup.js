document.addEventListener("DOMContentLoaded", function () {
    const boutonRetourEnHaut = document.getElementById("retour-en-haut");

    // Affiche le bouton lorsque l'utilisateur fait défiler la page vers le bas
    window.addEventListener("scroll", function () {
        if (window.scrollY > 100) {
            boutonRetourEnHaut.style.display = "block";
        } else {
            boutonRetourEnHaut.style.display = "none";
        }
    });

    // Retourne en haut de la page lorsque le bouton est cliqué
    boutonRetourEnHaut.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
});
console.log("coucou")