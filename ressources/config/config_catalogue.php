
<?php
//Connection à la bdd
require 'C:\wamp64\www\garagevparrot\configbdd.php';
// Sélection des données de la table "voiture"
$query = "SELECT * FROM voitures";
$result = $bdd->query($query);

if (!$result) {
    die("Erreur lors de la récupération des données : " . $bdd->errorInfo()[2]);
}

// Création du tableau pour stocker les données
$data = array();

while ($row = $result->fetch()) {
    $data[] = $row;
}

// Conversion du tableau en format JSON
$jsonData = json_encode($data);

// Définition de l'en-tête de réponse comme JSON
header('Content-Type: application/json');

// Envoi du JSON en réponse
echo $jsonData;
?>
