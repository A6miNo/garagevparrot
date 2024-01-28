  // Fonction pour générer une constante avec un motif regex de 6 caractères (lettres majuscules et minuscules, chiffres)
  function genererConstante() {
    const motifRegex = /^[a-zA-Z0-9]{6}$/; // Motif regex pour 6 caractères alphanumériques

    let constante;
    do {
      // Générer une constante alphanumérique de 6 caractères
      constante = [...Array(6)].map(() => {
        const type = Math.floor(Math.random() * 3);
        if (type === 0) {
          // Chiffre
          return String.fromCharCode(48 + Math.floor(Math.random() * 10));
        } else if (type === 1) {
          // Lettre majuscule
          return String.fromCharCode(65 + Math.floor(Math.random() * 26));
        } else {
          // Lettre minuscule
          return String.fromCharCode(97 + Math.floor(Math.random() * 26));
        }
      }).join('');
    } while (!constante.match(motifRegex));

    return constante;
  }

  // Exemple d'utilisation
  const maConstante = genererConstante();
  document.getElementById('random').textContent = maConstante;

  // Ajouter un gestionnaire d'événements sur le formulaire
  document.getElementById('id-form').addEventListener('submit', function(event) {
    // Récupérer la valeur de l'input et du span
    const inputValue = document.getElementById('input').value;
    const randomValue = document.getElementById('random').textContent;

    // Vérifier si les valeurs sont égales
    if (inputValue !== randomValue) {
      alert('Le code de vérification est incorrect.');
      event.preventDefault(); // Empêcher la soumission du formulaire
    }
  });
  if (inputValue !== randomValue) {
    // Afficher le message dans la div "invalid-feedback"
    document.getElementById('error-message').textContent = 'Le code de vérification est incorrect.';
    event.preventDefault(); // Empêcher la soumission du formulaire
  }

    function afficherRef(selectObject) {
        let refDiv = document.getElementById('refDiv');
        refDiv.style.display = (selectObject.value == '3') ? 'block' : 'none';
    }



