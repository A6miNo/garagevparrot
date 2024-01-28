<?php

//Connection à la bdd
require_once 'configbdd.php';
try {
    $bdd = new PDO("mysql:host=" . _DB_SERVER_ . ";dbname=" . _DB_NAME_ . ";charset=utf8", _DB_USER_, _DB_PASSWORD_);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


// Récupération des paramètres du filtre
$marque = $_GET['marque'];
$modele = $_GET['modele'];
$prix = $_GET['prix'];

if (!empty($marque)) {
    $sql .= " AND marque LIKE :marque";
    $marque =   $marque;
}

if (!empty($modele)) {
    $sql .= " AND modele LIKE :modele";
    $modele = '%' . $modele . '%';
}

if (!empty($prix)) {
    $sql .= " AND prix <= :prix";
}
