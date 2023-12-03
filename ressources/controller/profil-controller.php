<?php
require_once('C:\wamp64\www\garagevparrot\configbdd.php');

session_start();

//UPDATE SOCIETE\\
if (isset($_POST['savesociete'])) {

    $editName = $bdd->prepare('UPDATE societe SET name = :nameSociety');
    $editName->execute(array('nameSociety' => $_POST['name']));

    $editPhone = $bdd->prepare('UPDATE societe SET phone = :phoneSociety');
    $editPhone->execute(array('phoneSociety' => $_POST['phone']));

    $editMailSociete = $bdd->prepare('UPDATE societe SET mailing = :emailSociety');
    $editMailSociete->execute(array('emailSociety' => $_POST['mailing']));

    $editAdr = $bdd->prepare('UPDATE societe SET adresse = :adrSociety');
    $editAdr->execute(array('adrSociety' => $_POST['adresse']));

    $editSiret = $bdd->prepare('UPDATE societe SET siret = :sirSociety');
    $editSiret->execute(array('sirSociety' => $_POST['siret']));

    header('Location:/profil.php');
}



//UPDATE HORAIRES\\
if (isset($_POST['savehour'])) {
    try {
        $editHourOuverturAm = $bdd->prepare('UPDATE horaires SET heure_ouverture_am = :heure_ouverture_am WHERE id=:id');
        $editHourOuverturAm->execute(array('heure_ouverture_am' => $_POST['openam'], 'id' => $_POST['id']));

        header('Location: /profil.php');
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}



//UPDATE ARTICLE\\
if (isset($_POST['savecar'])) {

    $editMarque = $bdd->prepare('UPDATE voitures SET marque = :marque WHERE id = :id');
    $editMarque->execute(array('marque' => $_POST['marque'], 'id' => $_POST['id']));

    $editModele = $bdd->prepare('UPDATE voitures SET modele = :modele WHERE id = :id');
    $editModele->execute(array('modele' => $_POST['modele'], 'id' => $_POST['id']));

    $editKm = $bdd->prepare('UPDATE voitures SET km = :km WHERE id = :id');
    $editKm->execute(array('km' => $_POST['km'], 'id' => $_POST['id']));

    $editPrix = $bdd->prepare('UPDATE voitures SET prix = :prix WHERE id = :id');
    $editPrix->execute(array('prix' => $_POST['prix'], 'id' => $_POST['id']));

    $editDescCar = $bdd->prepare('UPDATE voitures SET description = :description WHERE id = :id');
    $editDescCar->execute(array('description' => $_POST['description'], 'id' => $_POST['id']));

    header('Location:/profil.php');
}

//DELETE FORMULAIRE\\
if (isset($_POST['deleteformulaire'])) {
    $deleteForm = $bdd->prepare('DELETE FROM formulaire WHERE id = :form_id');
    $deleteForm->execute(array('form_id' => $_POST['id']));
    header('Location:/profil.php');
}

//DELETE USER\\
if (isset($_POST['deleteUser'])) {
    $deleteCar = $bdd->prepare('DELETE FROM utilisateurs WHERE id = :user_id');
    $deleteCar->execute(array('user_id' => $_POST['id']));
    header('Location:/profil.php');
}

//DELETE ARTICLE\\
if (isset($_POST['deletecar'])) {
    $deleteCar = $bdd->prepare('DELETE FROM voitures WHERE id = :car_id');
    $deleteCar->execute(array('car_id' => $_POST['id']));
    header('Location:/profil.php');
}

//DELETE AVIS\\
if (isset($_POST['deleteavis'])) {
    $deleteAvis = $bdd->prepare('DELETE FROM avis WHERE id = :avis_id');
    $deleteAvis->execute(array('avis_id' => $_POST['deleteavis']));
    header('Location: /profil.php');
}


//UPDATE AVIS\\
if (isset($_POST['publie'])) {
    $editAvis = $bdd->prepare('UPDATE `avis` SET `statut` = "Publié" WHERE `avis`.`id` = :idavp;');
    $editAvis->execute(array('idavp' => $_POST['publie']));
}
