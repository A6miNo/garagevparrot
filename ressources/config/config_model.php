<?php
//Session utilisateurs
session_start();
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
//Connection à la bdd
require_once 'C:\wamp64\www\garagevparrot\configbdd.php';

if (isset($_GET['marque'])) {
    $selectedBrand = htmlentities($_GET['marque']);

    // Requête pour récupérer les modèles de voiture en fonction de la marque sélectionnée
    $models_query = $bdd->prepare('SELECT modele FROM voitures WHERE marque = ?');
    $models_query->execute([$selectedBrand]);
    $models = $models_query->fetchAll(PDO::FETCH_COLUMN);

    // Renvoyez les modèles au format JSON
    header('Content-Type: application/json');
    echo json_encode($models);
} else {
    echo 'Requête non valide';
}
