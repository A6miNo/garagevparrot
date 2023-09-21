<?php
require_once('C:\wamp64\www\garagevparrot\configbdd.php');

session_start();

if (isset($_POST['save'])) {
    //$editName = $bdd->prepare('INSERT INTO avis(pseudo, note, avis, statut) VALUES(:pseudo, :note, :avis, "A valider") ');

    if (!empty($_POST['name']) && $_POST['note'] >= 1 && isset($_POST['conditions'])) {
        $editName = $bdd->prepare('INSERT INTO avis(pseudo, note, avis) VALUES(:pseudo, :note, :avis) ');
        $editName->execute(array('pseudo' => htmlentities($_POST['name']), 'note' => htmlentities($_POST['note']), 'avis' => htmlentities($_POST['avis'])));
        echo "Merci pour votre contribution";
        header('Location:/ressources/views/form-avis.php');
    } else {
        echo "Le formulaire n'a pas été soumis en raison de données invalides.";
    }
}
