<?php

// Fonction pour vérifier si une chaîne est vide

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Établir une connexion à la base de données
        require_once '../../configbdd.php';

        // Valider et récupérer les données soumises dans le formulaire
        $genre = isset($_POST['genre']) ? $_POST['genre'] : '';
        $firstName = isset($_POST['user-name']) ? $_POST['user-name'] : '';
        $lastName = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $object = isset($_POST['object']) ? $_POST['object'] : '';
        $ref = isset($_POST['ref']) ? $_POST['ref'] : '';
        $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : '';
        $conditions = isset($_POST['conditions']) ? $_POST['conditions'] : '';
        $idInput = isset($_POST['idinput']) ? $_POST['idinput'] : '';

        // Validation des données
        if (!isset($firstName) || !isset($lastName)  || !isset($contenu)) {

            die('Tous les champs marqués d\'une étoile (*) doivent être remplis.');
        }

        if (!isset($email) && !isset($phone)) {
            die('L\'email ou le téléphone doit être renseigné.');
        }

        if ($conditions == 'checked') {
            die('Veuillez accepter les conditions.');
        }

        // Vérification de l'input idinput par rapport à l'id random (ajoutez votre propre logique ici)

        // Préparer la requête SQL d'insertion
        $insertQuery = "INSERT INTO formulaire (genre,firstname, lastname, email, phone, objet, ref, contenu) VALUES (:genre, :firstName, :lastName, :email, :phone, :object, :ref, :contenu)";

        // Préparer et exécuter la requête SQL à l'aide de PDO
        $stmt = $bdd->prepare($insertQuery);

        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':object', $object);
        $stmt->bindParam(':ref', $ref);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->execute();

        // Afficher un message de succès ou rediriger l'utilisateur vers une page de confirmation
        echo "Les données ont été ajoutées avec succès à la base de données.";

        // Fermer la connexion à la base de données
        $bdd = null;
    } catch (PDOException $e) {
        // En cas d'erreur, afficher un message d'erreur ou rediriger l'utilisateur vers une page d'erreur
        die('Erreur : ' . $e->getMessage());
    }
}
