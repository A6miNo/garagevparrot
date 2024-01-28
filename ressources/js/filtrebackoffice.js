// Fonction de filtre
// Attend que la page soit chargée
$(document).ready(function () {
    // Ajoute un gestionnaire d'événement pour le clic sur un bouton de catégorie
    $('#categories button').click(function () {
        // Récupère la valeur du bouton cliqué
        let category = $(this).attr('data-category');
  
        // Masque tous les articles
        $('.info').hide();
  
        // Affiche seulement les articles correspondant à la catégorie sélectionnée
        $('.' + category).show();
  
          
    });
    console.log("coucou")
  });

  //Ajouter le nombre d'avis en attente en haut avec JS
  document.addEventListener('DOMContentLoaded', function() {
    // Récupérer l'élément avec l'ID nbAvis
   let nbAvisElement = document.getElementById('nbAvis');
  
    // Récupérer l'élément avec l'ID infoavis
    let infoAvisElement = document.getElementById('infoavis');
  
    // Vérifier si les deux éléments existent
    if (nbAvisElement && infoAvisElement) {
      // Récupérer le texte de nbAvis
      let nbAvisText = nbAvisElement.textContent || nbAvisElement.innerText;
  
      // Assigner le texte à l'élément infoavis
      infoAvisElement.textContent = nbAvisText;
    }
  });