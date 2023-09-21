const random = document.getElementById("random");

// Génère une chaîne de caractères aléatoires de longueur 6
function generateRandomString(length) {
  let result = "";
  const characters =
    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  for (let i = 0; i < length; i++) {
    result += characters.charAt(Math.floor(Math.random() * characters.length));
  }
  return result;
}

// Chaînes de caractères aléatoires
const compareString = generateRandomString(6);

// Affiche la chaîne de caractères aléatoires sur la page web
random.textContent = compareString;





