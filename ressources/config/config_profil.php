
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

$avis = $bdd->query('SELECT * FROM avis WHERE statut = "A valider"');
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

// Récupération du pseudo de l'utilisateur connecté
$userID = isset($_SESSION['user']) ? $_SESSION['user'] : null;

// Vérifier si l'utilisateur est connecté
if ($userID) {
    // Récupération des informations de l'utilisateur depuis la base de données
    $getUserInfo = $bdd->prepare('SELECT role, pseudo FROM utilisateurs WHERE id = ?');
    $getUserInfo->execute([$userID]);
    $userInfo = $getUserInfo->fetch(PDO::FETCH_ASSOC);

    if ($userInfo) {
        $role = $userInfo['role'];
        $pseudo = $userInfo['pseudo'];

        // Construction du message personnalisé en fonction du rôle
        $greeting = "Bonjour $pseudo";

        $additionalMessage = '';

        if ($role === 'Administrateur') {
            $additionalMessage = "Vous avez des droits étendus.";
        } else {
            $additionalMessage = "Passez une bonne journée.";
        }
    } else {
        header('Location: /connexion.php');
        exit();
    }
} else {
    header('Location: /connexion.php');
    exit();
}

//MESSAGE\\
//MESSAGE
$form = $bdd->query('SELECT * FROM formulaire WHERE etat= "A TRAITER"');

// Réinitialiser le pointeur de résultats de $form
$form->execute();
$formRows = $form->fetchAll(PDO::FETCH_ASSOC);


$formArchive = $bdd->query('SELECT * FROM formulaire WHERE etat= "ARCHIVE"');

// Réinitialiser le pointeur de résultats de $formArchive
$formArchive->execute();
$rowsArchive = $formArchive->fetchAll();

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
function getTableObjectCount($bdd, $table_name, $column = null, $value = null)
{

    // Construire la partie de la requête conditionnelle si des valeurs sont fournies
    $condition = "";
    if ($column !== null && $value !== null) {
        $condition = " WHERE $column = :value";
    }

    // Exécuter la requête pour obtenir le nombre d'objets dans la table avec éventuellement une condition
    $sql = "SELECT COUNT(*) FROM $table_name$condition";
    $stmt = $bdd->prepare($sql);

    // Binder la valeur conditionnelle si elle est fournie
    if ($column !== null && $value !== null) {
        $stmt->bindParam(':value', $value);
    }

    $stmt->execute();

    // Récupérer le résultat
    $count = $stmt->fetchColumn();

    // Retourner le nombre d'objets
    return $count;
}
