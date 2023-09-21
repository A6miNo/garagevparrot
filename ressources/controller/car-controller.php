<?php
require_once('C:\wamp64\www\garagevparrot\configbdd.php');

session_start();
//UPDATE ARTICLE\\
if (isset($_POST['savecar'])) {

    $editMarque = $bdd->prepare('UPDATE voitures SET name = :marque');
    $editMarque->execute(array('marque' => $_POST['marque']));

    $editModele = $bdd->prepare('UPDATE voitures SET modele = :modele');
    $editModele->execute(array('modele' => $_POST['modele']));

    $editPrix = $bdd->prepare('UPDATE voitures SET prix = :prix');
    $editPrix->execute(array('prix' => $_POST['prix']));

    $editDescCar = $bdd->prepare('UPDATE voitures SET description = :description');
    $editDescCar->execute(array('description' => $_POST['description']));

    $editkm = $bdd->prepare('UPDATE voitures SET km = :km');
    $editkm->execute(array('km' => $_POST['km']));

    header('Location:/profil.php');
}
