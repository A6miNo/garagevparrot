document.addEventListener('DOMContentLoaded', function() {
  const xhr = new XMLHttpRequest();
  xhr.open('POST', '/ressources/config/config_catalogue.php', true);
  xhr.setRequestHeader('Content-Type', 'application/json');

  xhr.addEventListener('readystatechange', function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        const object = JSON.parse(xhr.response);
        let allCars = object;
        generateCarList(object);
        filtreSelect(object);
        console.log(object[0].marque);

        // FILTRE PAR FOURCHETTE DE PRIX
        let minPriceInput = document.getElementById("minPrice");
        let maxPriceInput = document.getElementById("maxPrice");
        let applyFiltersButton = document.getElementById("applyFilters");
        let marqueSelect = document.getElementById("marque");
        let modeleSelect = document.getElementById("modele");

      applyFiltersButton.addEventListener("click", function () {
        let minPrice = parseFloat(minPriceInput.value);
        let maxPrice = parseFloat(maxPriceInput.value);
        const selectedMarque = marqueSelect.value;
        let selectedModele = modeleSelect.value;
      
        // Copie de la liste complète des voitures dans une nouvelle variable pour la filtration
        let filteredCars = [...allCars];
      
        // Filtrer par marque si sélectionnée
        if (selectedMarque !== "all" && selectedMarque !== "") {
          filteredCars = filteredCars.filter(car => car.marque === selectedMarque);
        }
      
        // Filtrer par modèle si sélectionné
        if (selectedModele !== "all" && selectedModele !== "") {
          filteredCars = filteredCars.filter(car => car.modele === selectedModele);
        }
      
        // Filtrer par fourchette de prix si les valeurs sont valides
        if (!isNaN(minPrice) || !isNaN(maxPrice)) {
          filteredCars = filteredCars.filter(car => {
            const carPrice = parseFloat(car.prix);
            const isMinPriceValid = !isNaN(minPrice);
            const isMaxPriceValid = !isNaN(maxPrice);
      
            if (isMinPriceValid && isMaxPriceValid) {
              return carPrice >= minPrice && carPrice <= maxPrice;
            } else if (isMinPriceValid) {
              return carPrice >= minPrice;
            } else if (isMaxPriceValid) {
              return carPrice <= maxPrice;
            }
      
            return true;
          });
        }
      
        if (filteredCars.length === 0) {
          // Affichez le message "Pas de voiture" s'il n'y a pas de résultats
          document.getElementById("catalogue-card").innerHTML = "Pas de voiture";
        } else {
          // Affichez les résultats filtrés
          generateCarList(filteredCars);
        }
      });

// FILTRE PAR MARQUE ET MODELE
          // Récupérez l'élément select de la marque
          
 
          // Écoutez les changements de sélection de marque
          marqueSelect.addEventListener("change", function() {
            const selectedMarque = marqueSelect.value;
  
            if (selectedMarque === "all") {
                       generateCarList(allCars);
           } else {
              // Filtrer les voitures par marque sélectionnée
              const filteredCars = object.filter(car => car.marque === selectedMarque);
              generateCarList(filteredCars);
           }
          });
     
          modeleSelect.addEventListener("change", function () {
            const selectedModele = modeleSelect.value;
            // Appeler la fonction pour filtrer les voitures par modèle sélectionné
            filterCarsByModele(selectedModele, object);
          });
          // Écoutez les changements de sélection de modele
          modeleSelect.addEventListener("change", function() {
            const selectedModele = modeleSelect.value;
  
            if (selectedModele === "all") {
              // Afficher toutes les voitures lorsque "all" est sélectionné
              generateCarList(object);
            } else {
              // Filtrer les voitures par modele sélectionnée
              const filteredCars = object.filter(car => car.modele === selectedModele);
              generateCarList(filteredCars);
            }
          });
      } else if (xhr.status == 404) {
        alert("Impossible de trouver l'URL de la requête Ajax");
      } else {
        alert("Une erreur est survenue");
      }
    }
  });

  xhr.send();
});

function generateCarList(carList){
  let myHtml=''
  let numFiches=0;
  carList.forEach(car => {
          myHtml+='<article class="card column">'
          myHtml += '<img class="card_image" src= "https://image.noelshack.com/fichiers/'+car.img_url_1.slice(37)+'"alt="'+car.img_url_1.slice(58)+'">'
          myHtml +='<div class="card_contain column"><div class="card_title">'  
          myHtml += '<h2><span class="brand">'+car.marque+'</span> / <span class="model">'+car.modele+'</span></h2>'
          myHtml += '<h3>ref:<span class="openid">'+car.id+'XXXX</span></h3>'
          myHtml +='</div><div class="card-info"><ul class="icon-list">'
          myHtml +='<li><i class="fa-solid fa-gauge"></i> Boite de vitesse: <strong><span class="gear">'+car.boite+'</span></strong></li>'
          myHtml +='<li><i class="fa-solid fa-calendar-days"></i> Année de mise en circulation: <strong><span class="mec">'+car.mise_en_circulation+'</span></strong></li>'
          myHtml += '<li><i class="fa-solid fa-gas-pump"></i> Énergie: <strong><span class="energy">'+car.carburant+'</span></strong></li>'
          myHtml += ' <li> Kilométrage:<strong> <span class="km">'+car.km+' km</span></strong></li>'
          myHtml += '</ul></div><div class="card_description"></div><div class="card-price">'
          myHtml += ' <p><strong><span class="price">'+car.prix+'</span></strong> €</p></div>'
          myHtml += '<a  href="fiche.php?id='+car.id+'"class="btn card_button open" action="post" ">Voir plus</a> </div></article>'
      
      numFiches++;
        });
    displayNumFiches(numFiches);
    document.getElementById("catalogue-card").innerHTML = myHtml;
    return numFiches;
    }
  
// Fonction pour afficher le nombre de fiches
function displayNumFiches(numFiches) {
  const numFichesElement = document.getElementById("nbsearch");
  numFichesElement.textContent = numFiches;
}
// Fonction pour filtrer les voitures par modèle
function filterCarsByModele(modeleSelectionne, objets) {
  if (modeleSelectionne === "all") {
    // Si "all" est sélectionné, afficher toutes les voitures
    generateCarList(objets);
  } else {
    const voituresFiltrees = objets.filter(voiture => voiture.modele === modeleSelectionne);
    generateCarList(voituresFiltrees);
  }
}   

// creer la liste deroulante
function filtreSelect(object){
  const marqueSet = new Set();
  const modeleSet = new Set();

  // Sélection l'élément select par son id
  const marqueSelect = document.getElementById("marque");
  const modeleSelect = document.getElementById("modele");

  // Parcourir chaque objet de la liste
  object.forEach(car => {
    const marque = car.marque;
    const modele = car.modele

    // Vérification si la marque n'a pas déjà été ajoutée
    if (!marqueSet.has(marque)) {
      // Ajoutez la marque à l'ensemble pour éviter les doublons
      marqueSet.add(marque);

      // Création élément d'option 
      const option = document.createElement("option");
      option.value = marque;
      option.textContent = marque;
      marqueSelect.appendChild(option);
    }
    if (!modeleSet.has(modele)) {
      // Ajout marque à l'ensemble pour éviter les doublons
      modeleSet.add(modele);

      
      const option = document.createElement("option");
      option.value = modele;
      option.textContent = modele;
      modeleSelect.appendChild(option);
    }
  });
  // Écoutez les changements de sélection de marque
  marqueSelect.addEventListener("change", function() {
    const selectedMarque = marqueSelect.value;
    // Effacez d'abord les options actuelles du select des modèles
    modeleSelect.innerHTML = "<option value=''>Sélectionner un modèle</option>";
    
    // select cascade de select marque
    object.forEach(car => {
      if (car.marque === selectedMarque) {
        const optionModele = document.createElement("option");
        optionModele.value = car.modele;
        optionModele.textContent = car.modele;
        modeleSelect.appendChild(optionModele);
      }
     
    });
  });
 }
