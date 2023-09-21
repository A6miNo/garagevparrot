     // Fonction pour ouvrir la fiche en fonction de l'ID de la voiture
     function openFiche(id) {
       
        console.log("ID de la voiture : " + id);
 }

    // Attendre que le DOM soit complètement chargé
    document.addEventListener('DOMContentLoaded', function () {
        // Sélectionnez tous les boutons "Voir plus"
        const openButtons = document.querySelectorAll('.open');

        // Ajoutez un gestionnaire d'événement pour chaque bouton "Voir plus"
        openButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Récupérez l'ID de la voiture à partir de l'attribut data-id
                const carId = button.getAttribute('data-id');
                // Appelez la fonction openFiche avec l'ID de la voiture
                openFiche(carId);
            });
        });
    });

