<?php
require_once '../../configbdd.php';

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
        // Bouclez à travers les données et mettez à jour la base de données.
        for ($i = 0; $i < count($_POST['id']); $i++) {
            $id = $_POST['id'][$i];
            $heure_ouverture_am = $_POST['heure_ouverture_am'][$i];
            $heure_fermeture_am = $_POST['closeam'][$i];
            $heure_ouverture_pm = $_POST['openpm'][$i];
            $heure_fermeture_pm = $_POST['closepm'][$i];
            $statut = $_POST['statut'][$i];

            // Mise à jour de l'heure d'ouverture AM
            $editHourOuverturAm = $bdd->prepare('UPDATE horaires SET heure_ouverture_am = :heure_ouverture_am WHERE id = :id');
            $editHourOuverturAm->execute(array('heure_ouverture_am' => $heure_ouverture_am, 'id' => $id));
            // Mise à jour de l'heure de fermeture AM
            $editHourFermetureAm = $bdd->prepare('UPDATE horaires SET heure_fermeture_am = :heure_fermeture_am WHERE id = :id');
            $editHourFermetureAm->execute(array('heure_fermeture_am' => $heure_fermeture_am, 'id' => $id));

            // Mise à jour de l'heure d'ouverture PM
            $editHourOuverturePm = $bdd->prepare('UPDATE horaires SET heure_ouverture_pm = :heure_ouverture_pm WHERE id = :id');
            $editHourOuverturePm->execute(array('heure_ouverture_pm' => $heure_ouverture_pm, 'id' => $id));

            // Mise à jour de l'heure de fermeture PM
            $editHourFermeturePm = $bdd->prepare('UPDATE horaires SET heure_fermeture_pm = :heure_fermeture_pm WHERE id = :id');
            $editHourFermeturePm->execute(array('heure_fermeture_pm' => $heure_fermeture_pm, 'id' => $id));

            // Mise à jour du statut
            $editStatut = $bdd->prepare('UPDATE horaires SET statut = :statut WHERE id = :id');
            $editStatut->execute(array('statut' => $statut, 'id' => $id));
        }

        // Redirigez l'utilisateur ou affichez un message de réussite.
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

    $editImg1 = $bdd->prepare('UPDATE voitures SET img_url_1 = :img_url_1 WHERE id = :id');
    $editImg1->execute(array('img_url_1' => $_POST['img_url_1'], 'id' => $_POST['id']));

    $editImg2 = $bdd->prepare('UPDATE voitures SET img_url_2 = :img_url_2 WHERE id = :id');
    $editImg2->execute(array('img_url_2' => $_POST['img_url_2'], 'id' => $_POST['id']));

    $editImg3 = $bdd->prepare('UPDATE voitures SET img_url_3 = :img_url_3 WHERE id = :id');
    $editImg3->execute(array('img_url_3' => $_POST['img_url_3'], 'id' => $_POST['id']));

    $editImg4 = $bdd->prepare('UPDATE voitures SET img_url_4 = :img_url_4 WHERE id = :id');
    $editImg4->execute(array('img_url_4' => $_POST['img_url_4'], 'id' => $_POST['id']));

    header('Location:/profil.php');
}

//DELETE FORMULAIRE\\
if (isset($_POST['deleteformulaire'])) {
    $deleteForm = $bdd->prepare('DELETE FROM formulaire WHERE id = :form_id');
    $deleteForm->execute(array('form_id' => $_POST['id']));
    header('Location:/profil.php');
}
//UPDATE STATUT FORMULAIRE\\
if (isset($_POST['archiveformulaire'])) {
    $updateForm = $bdd->prepare('UPDATE `formulaire` SET `etat` = "ARCHIVE" WHERE id = :form_id');
    $updateForm->execute(array('form_id' => $_POST['id']));
    header('Location:/profil.php');
}

//DELETE USER\\
if (isset($_POST['deleteUser'])) {
    $deleteCar = $bdd->prepare('DELETE FROM utilisateurs WHERE id = :user_id');
    $deleteCar->execute(array('user_id' => $_POST['id']));
    header('Location:/profil.php');
}
//UPDATE USER\\
if (isset($_POST['updateUser'])) {
    $employeeId = isset($_POST['employeeId']) ? intval($_POST['employeeId']) : 0;
    $newName = htmlspecialchars($_POST['newName']);
    $newEmail = strtolower(htmlspecialchars($_POST['newEmail']));
    $newTelephone = htmlspecialchars($_POST['newTelephone']);

    // Requête SQL pour mettre à jour les informations de l'employé
    $updateEmployee = $bdd->prepare('UPDATE utilisateurs SET pseudo = ?, email = ?, phone = ? WHERE id = ?');
    $updateEmployee->execute([$newName, $newEmail, $newTelephone, $employeeId]);

    if ($updateEmployee) {
        echo 'Informations de l\'employé mises à jour avec succès.';
        header('Location: /profil.php');
    } else {
        echo 'Erreur lors de la mise à jour des informations de l\'employé.';
    }
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
