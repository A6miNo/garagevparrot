<?php
// Connexion à la BDD
require '../../configbdd.php';

// Vérifie si la requête concerne les marques
if (isset($_GET['marques']) && $_GET['marques'] == 'true') {
    // Requête SQL pour récupérer toutes les marques distinctes
    $queryMarques = "SELECT DISTINCT marque FROM voitures";
    $stmtMarques = $bdd->prepare($queryMarques);

    if ($stmtMarques->execute()) {
        $marquesData = array();

        while ($rowMarques = $stmtMarques->fetch(PDO::FETCH_ASSOC)) {
            $marquesData[] = $rowMarques['marque'];
        }
        // Triez les marques par ordre alphabétique
        sort($marquesData);
        // Conversion du tableau en format JSON
        $jsonDataMarques = json_encode($marquesData);

        // Définition de l'en-tête de réponse comme JSON
        header('Content-Type: application/json');
        echo $jsonDataMarques;
    } else {
        die("Erreur lors de la récupération des marques : " . $stmtMarques->errorInfo()[2]);
    }
} elseif (isset($_GET['modeles']) && $_GET['modeles'] == 'true') {
    // Récupération sécurisée de la marque depuis les paramètres de la requête
    $marque = null;
    if (isset($_GET['marque'])) {
        $marque = $_GET['marque'];
    }


    // Requête SQL pour récupérer les modèles distincts en fonction de la marque
    $queryModeles = "SELECT DISTINCT modele FROM voitures WHERE marque = :marque";
    $stmtModeles = $bdd->prepare($queryModeles);
    $stmtModeles->bindParam(':marque', $marque, PDO::PARAM_STR);

    if ($stmtModeles->execute()) {
        $modelesData = array();

        while ($rowModeles = $stmtModeles->fetch(PDO::FETCH_ASSOC)) {
            $modelesData[] = $rowModeles['modele'];
        }
        // Triez les marques par ordre alphabétique
        sort($modelesData);
        // Conversion du tableau en format JSON
        $jsonDataModeles = json_encode($modelesData);

        // Définition de l'en-tête de réponse comme JSON
        header('Content-Type: application/json');
        echo $jsonDataModeles;
    } else {
        die("Erreur lors de la récupération des modèles : " . $stmtModeles->errorInfo()[2]);
    }
} else {
    // Requête SQL de base
    $query = "SELECT * FROM voitures WHERE 1";
    // Initialisation des valeurs par défaut pour le filtre par prix
    $minPrice = isset($_GET['minPrice']) ? $_GET['minPrice'] : null;
    $maxPrice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : null;

    // Initialisation des valeurs par défaut pour le filtre par kilométrage
    $minKm = isset($_GET['minKm']) ? $_GET['minKm'] : null;
    $maxKm = isset($_GET['maxKm']) ? $_GET['maxKm'] : null;

    // Initialisation des valeurs par défaut pour le filtre par marque et modele
    $marque = isset($_GET['marque']) ? $_GET['marque'] : null;
    $modele = isset($_GET['modele']) ? $_GET['modele'] : null;

    // Initialisation des valeurs par défaut pour le filtre par année
    $minAnnee = isset($_GET['minAnnee']) ? $_GET['minAnnee'] : null;
    $maxAnnee = isset($_GET['maxAnnee']) ? $_GET['maxAnnee'] : null;

    // Ajout des filtres par prix si des valeurs sont spécifiées
    if ($minPrice !== null) {
        $query .= " AND prix >= :minPrice";
    }
    if ($maxPrice !== null) {
        $query .= " AND prix <= :maxPrice";
    }

    // Ajout des filtres par kilométrage si des valeurs sont spécifiées
    if ($minKm !== null) {
        $query .= " AND km >= :minKm";
    }
    if ($maxKm !== null) {
        $query .= " AND km <= :maxKm";
    }

    // Ajout des filtres par marque et modele si des valeurs sont spécifiées
    if ($marque !== null && $marque !== "all") {
        $query .= " AND marque = :marque";
    }
    if ($modele !== null && $modele !== "all") {
        $query .= " AND modele = :modele";
    }

    // pour filtrer par année si les valeurs sont spécifiées
    if ($minAnnee !== null) {
        $query .= " AND YEAR(mise_en_circulation) >= :minAnnee";
    }
    if ($maxAnnee !== null) {
        $query .= " AND YEAR(mise_en_circulation) <= :maxAnnee";
    }

    //  pour gérer l'option de tri
    if (isset($_GET['tri'])) {
        $tri = $_GET['tri'];
        switch ($tri) {
            case 'gr_up':
                $query .= " ORDER BY prix ASC";
                break;
            case 'gr_dw':
                $query .= " ORDER BY prix DESC";
                break;
        }
    }



    // Préparation de la requête
    $stmt = $bdd->prepare($query);

    // Liaison des paramètres pour le filtre par prix
    if ($minPrice !== null) {
        $stmt->bindParam(':minPrice', $minPrice, PDO::PARAM_INT);
    }
    if ($maxPrice !== null) {
        $stmt->bindParam(':maxPrice', $maxPrice, PDO::PARAM_INT);
    }

    // Liaison des paramètres pour le filtre par kilométrage
    if ($minKm !== null) {
        $stmt->bindParam(':minKm', $minKm, PDO::PARAM_INT);
    }
    if ($maxKm !== null) {
        $stmt->bindParam(':maxKm', $maxKm, PDO::PARAM_INT);
    }


    // Liaison des paramètres pour le filtre par marque et modele
    if ($marque !== null) {
        $stmt->bindParam(':marque', $marque, PDO::PARAM_STR);
    }
    if ($modele !== null) {
        $stmt->bindParam(':modele', $modele, PDO::PARAM_STR);
    }

    // Liaison des paramètres pour le filtre par année
    if ($minAnnee !== null) {
        $stmt->bindParam(':minAnnee', $minAnnee, PDO::PARAM_INT);
    }
    if ($maxAnnee !== null) {
        $stmt->bindParam(':maxAnnee', $maxAnnee, PDO::PARAM_INT);
    }

    // Exécution de la requête
    if ($stmt->execute()) {
        // Récupération des résultats
        $data = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        // Conversion du tableau en format JSON
        $jsonData = json_encode($data);

        // Définition de l'en-tête de réponse comme JSON
        header('Content-Type: application/json');

        // Envoi du JSON en réponse
        echo $jsonData;
    } else {
        // Gestion de l'erreur en cas d'échec de la requête
        die("Erreur lors de la récupération des données : " . $stmt->errorInfo()[2]);
    }
}
