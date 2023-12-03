<?php

//SOCIETE\\
$societe = $bdd->query('SELECT * FROM societe');
$infos = $societe->fetch();

//CATALOGUE\\
$query = "SELECT * FROM voitures";
$cars = $bdd->query($query);

//AVIS\\
$notes = $bdd->query('SELECT * FROM avis');
$avis = $notes->fetch();
$noteq = "SELECT * FROM avis";
$avisq = $bdd->query($noteq);
//nombre d'avis
$sqlavis = "SELECT COUNT(*) FROM avis";
$result = $bdd->query($sqlavis);
$countavis = $result->fetchColumn();

$avis = $bdd->query('SELECT * FROM avis WHERE statut = "A valider"');;
$avis->execute();


//ANNONCE\\
$annonce = $bdd->query('SELECT * FROM annonce');
$adv = $annonce->fetch();


//SERVICES\\
$squery = "SELECT * FROM services";
$service = $bdd->query($squery);

// LES UTILISATEURS\\

//recuperer tous les utilisateurs
$users = $bdd->query('SELECT * FROM utilisateurs');
$salaries = $users->fetch();
//pour trouver par role
$infos_users = $bdd->prepare('SELECT role FROM utilisateurs WHERE id=?');
$infos_users->execute(array($_SESSION['user']));
$info = $infos_users->fetch();
$role = htmlentities($info['role']);

//MESSAGE\\
$form = $bdd->query('SELECT * FROM formulaire');
$message = $form->fetch();



//HORAIRES\\
/*
//pdo
$schedulepdo = $bdd->query('SELECT * FROM horaires');
$timepdo = $schedulepdo->fetch();
*/


// mysql
$mysqli = new mysqli("localhost", "root", "", "garage_v_parrot");
$mysqli->set_charset("utf8");
$schedule = 'SELECT * FROM horaires';
$time = $mysqli->query($schedule);
$sqlhour = "SELECT id, jour, 
            SUBSTRING(heure_ouverture_am, 1, 5) AS heure_ouverture_am,
            SUBSTRING(heure_fermeture_am, 1, 5) AS heure_fermeture_am,
            SUBSTRING(heure_ouverture_pm, 1, 5) AS heure_ouverture_pm,
            SUBSTRING(heure_fermeture_pm, 1, 5) AS heure_fermeture_pm,
            statut
            FROM horaires";
$result = $mysqli->query($sqlhour); //


//fonction count
function getTableObjectCount($bdd, $table_name)
{


    // Exécuter la requête pour obtenir le nombre d'objets dans la table
    $sql = "SELECT COUNT(*) FROM $table_name";
    $result = $bdd->query($sql);

    // Récupérer le résultat
    $count = $result->fetchColumn();

    // Retourner le nombre d'objets
    return $count;
}
