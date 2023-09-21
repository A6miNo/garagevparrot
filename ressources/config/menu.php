<?php

$mainMenu = [
    "index.php" => ["menu_title" => "Accueil", "head_title" => "Garage V PARROT", "meta_description" => "Garage Automobile V.Parrot propose la réparation l'entretien et le dépannage des véhicules situé sur Toulouse", "meta_keywords" => "Garage, automobile, véhicule d'occasion, voiture, reparation, panne, depannage, entretien, Toulouse, Sud-Ouest, Haute-Garonne", "navclass" => "first", "exclude" => false],
    "garage.php" => ["menu_title" => "Nos Services", "head_title" => "Reparation V Parrot", "meta_description" => "services de réparation d'entretien et de dépannage des véhicules situés sur Toulouse", "meta_keywords" => "Garage, automobile, reparation, panne, depannage, entretien, Toulouse, Sud-Ouest, Haute-Garonne", "navclass" => "second", "exclude" => false],
    "catalogue-occasion.php" => ["menu_title" => "Vente de Véhicules", "head_title" => "Occasions V PARROT", "meta_description" => "Vente de vehicules d'occasions toutes marques", "meta_keywords" => "Garage,vente, Toulouse, Sud-Ouest, Haute-Garonne", "navclass" => "third", "exclude" => false],
    "page-contact.php" => ["menu_title" => "A propos", "head_title" => "A propos du Garage V PARROT", "meta_description" => "L'histoire du garage et ses engagements", "meta_keywords" => "V Parrot, contact, adresse, nouveautés, à propos ", "navclass" => "four", "exclude" => false],
    "fiche.php" => ["menu_title" => "Fiche Article", "head_title" => "Fiche Article", "meta_description" => "presentation d'une voiture d'occassion à la vente", "meta_keywords" => "fiche, article ", "navclass" => "", "exclude" => true],
    "profil.php" => ["menu_title" => "Tableau de Bord", "head_title" => "Tableau de bord Garage", "meta_description" => "Tableau de bord du Garage V Parrot", "meta_keywords" => "tableau de bord", "navclass" => "fifth", "exclude" => true],
    "loginV2.php" => ["menu_title" => "Connexion", "head_title" => "Connexion Garage", "meta_description" => "Connexion au Tableau de bord du Garage V Parrot", "meta_keywords" => "login", "navclass" => "", "exclude" => true]
];

$currentPage = basename($_SERVER["SCRIPT_NAME"]);
