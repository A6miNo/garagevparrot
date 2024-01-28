$(document).ready(function () {
  
  // Chargez les véhicules au chargement de la page
  chargerVehicules();
  chargerMarques();


  // Charger le nombre total d'annonces au chargement de la page
  chargerNombreTotalAnnonces();


  // Définir les valeurs par défaut pour les champs prix et km inutile avec objet filters
  //$('#minPrice').val('0');
  //$('#maxPrice').val('9999999999');
  //$('#minKm').val('0');
  //$('#maxKm').val('9999999999');

 

  // Gestion du filtre par prix
  $('#filter-form').submit(function (event) {
    event.preventDefault();
    applyFilters();
  });

  // Gestion pour le bouton de réinitialisation
  $('#reset-filters').on('click', resetFilters);

// Gestion du changement de la marque pour charger les modèles correspondants
$('#marque').change(function() {
  var selectedMarque = $(this).val();

  if (selectedMarque !== 'all') {
    $.ajax({
        url: '/ressources/config/config_catalogue.php?modeles=true&marque=' + selectedMarque,
        method: 'POST',
        dataType: 'json'
    })
    .done(function (data) {
        remplirMenuDeroulant(data, '#modele');
    })
    .fail(function (xhr, textStatus, errorThrown) {
      console.error('Erreur lors de la requête AJAX', xhr, textStatus, errorThrown);
  });
  } else {
    // Si "Toutes les marques" est sélectionné, réinitialiser les modèles
    $('#modele').empty();
    $('#modele').append('<option value="all">affichez tout</option>');
  }
});
// Attacher l'événement input aux champs
$('#minPrice, #maxPrice, #minKm, #maxKm, #marque, #modele, #annee-min, #annee-max, #tri').on('input', function() {
  applyFilters();
});

$('#tri').change(function() {
  applyFilters();
});

  function applyFilters() {
    let minPrice = parseFloat($('#minPrice').val()) || null;
    let maxPrice = parseFloat($('#maxPrice').val()) || null;
    let minKm = parseInt($('#minKm').val(), 10) || null;
    let maxKm = parseInt($('#maxKm').val(), 10) || null;
    let marque = $('#marque').val();
    let modele = $('#modele').val();
    let minAnnee = parseInt($('#annee-min').val()) || null;
    let maxAnnee = parseInt($('#annee-max').val()) || null;

// Vérifier si l'année max est supérieure à l'année actuelle
let anneeActuelle = new Date().getFullYear();

if (maxAnnee !== null && maxAnnee > anneeActuelle) {
    // Afficher un message d'erreur
    alert("Veuillez entrer une année écoulée.");
    return; //arrete la fonction si la condiotin n'est pas rempli
}

    

  // Créer un objet pour stocker les filtres
  let filters = {};
  // Ajouter les filtres uniquement s'ils sont renseignés
  if (minPrice !== null) filters.minPrice = minPrice;
  if (maxPrice !== null) filters.maxPrice = maxPrice;
  if (minKm !== null) filters.minKm = minKm;
  if (maxKm !== null) filters.maxKm = maxKm;
  if (minAnnee !== null) filters.minAnnee = minAnnee;
  if (maxAnnee !== null) filters.maxAnnee = maxAnnee;
  // Ajouter les filtres de marque et modèle seulement si ils ne sont pas "all"
  if (marque !== "all") filters.marque = marque;
  if (modele !== "all") filters.modele = modele;
  // Récupérer la valeur de l'élément de tri
  let tri = $('#tri').val();
  // Ajouter le filtre de tri uniquement si une option est sélectionnée
  if (tri !== null && tri !== "") {
    filters.tri = tri;
    } 

 

    $.ajax({
      url: '/ressources/config/config_catalogue.php',
      method: 'GET',
      data: filters,
      
      dataType: 'json'
    })
    .done(function (data) {
      console.log('Réponse AJAX réussie :', data);
  
      $('#nbsearch').text(data.length + " annonces");

      $('#listeVehicules').empty();
      afficherVehicules(data);
    })
    .fail(function (xhr,textStatus, errorThrown) {
      console.error('Erreur lors de la requête AJAX', xhr, textStatus, errorThrown);
    });

  }

  function resetFilters() {
    // Réinitialiser les valeurs des filtres dans le formulaire

    $('#minPrice').val('');
    $('#maxPrice').val('');
    $('#minKm').val('');
    $('#maxKm').val('');
    $('#marque').val('all');
    $('#modele').val('all');

    // Appliquer les filtres pour afficher tous les véhicules
    chargerVehicules();
  }

  function chargerVehicules() {
    $.ajax({
      url: '/ressources/config/config_catalogue.php',
      method: 'POST',
      dataType: 'json'
    })
    .done(function (data) {
      afficherVehicules(data);
     
    })
    .fail(function (xhr, textStatus, errorThrown) {
      console.error('Erreur lors de la requête AJAX', xhr, textStatus, errorThrown);
  });
    
  }

  function afficherVehicules(data) {
    $('#listeVehicules').empty();
    let myHtml = '';
    for (let i = 0; i < data.length; i++) {
      let car = data[i];
      myHtml += '<article class="card column">';
      myHtml += '<img class="card_image" src="https://image.noelshack.com/fichiers/' + car.img_url_1.slice(37) + '" alt="' + car.img_url_1.slice(58) + '">';
      myHtml += '<div class="card_contain column"><div class="card_title">';
      myHtml += '<h2><span class="brand">' + car.marque + '</span> / <span class="model">' + car.modele + '</span></h2>';
      myHtml += '<h3>ref:<span class="openid">' + car.id + 'XXXX</span></h3>';
      myHtml += '</div><div class="card-info"><ul class="icon-list">';
      myHtml += '<li><i class="fa-solid fa-gauge"></i> Boite de vitesse: <strong><span class="gear">' + car.boite + '</span></strong></li>';
      myHtml += '<li><i class="fa-solid fa-calendar-days"></i> Année de mise en circulation: <strong><span class="mec">' + car.mise_en_circulation + '</span></strong></li>';
      myHtml += '<li><i class="fa-solid fa-gas-pump"></i> Énergie: <strong><span class="energy">' + car.carburant + '</span></strong></li>';
      myHtml += ' <li> Kilométrage:<strong> <span class="km">' + car.km + ' km</span></strong></li>';
      myHtml += '</ul></div><div class="card_description"></div><div class="card-price">';
      myHtml += ' <p><strong><span class="price">' + car.prix + '</span></strong> €</p></div>';
      myHtml += '<a href="fiche.php?id=' + car.id + '" class="btn card_button open" action="post">Voir plus</a> </div></article>';
    }
    $('#listeVehicules').append(myHtml);
  }
  function chargerMarques() {
    $.ajax({
        url: '/ressources/config/config_catalogue.php?marques=true',
        method: 'POST',
        dataType: 'json'
    })
    .done(marquesData => {
        remplirMenuDeroulant(marquesData, '#marque');
    })
    .fail(function (xhr, textStatus, errorThrown) {
      console.error('Erreur lors de la requête AJAX', xhr, textStatus, errorThrown);
  });
}

function remplirMenuDeroulant(data, selectId) {
    const select = $(selectId);
    select.empty();
    select.append('<option value="all">Affichez tout</option>');
    data.forEach(marque => {
        select.append(`<option value="${marque}">${marque}</option>`);
    });
}

function chargerNombreTotalAnnonces() {
  $.ajax({
      url: '/ressources/config/config_catalogue.php',
      method: 'POST',
      dataType: 'json'
  })
  .done(function (data) {
    $('.info').text("Le nombre de véhicule actuellement à la vente est de " + data.length);
      // Mettre à jour le nombre total d'annonces dans le span
      $('#nbsearch').text(data.length + " annonces");
  })
  .fail(function (xhr, textStatus, errorThrown) {
      console.error('Erreur lors de la requête AJAX', xhr, textStatus, errorThrown);
  });
}

});
