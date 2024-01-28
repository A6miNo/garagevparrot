<?php
session_start();

// Include the database configuration file
require_once '../../configbdd.php';

if (isset($_POST["createUser"])) {
    // Récupération des données du formulaire
    $role = $_POST['role'];
    $name = htmlspecialchars($_POST['name']);
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];
    $tel = $_POST['tel'];

    // Validation des données (vous pouvez ajouter plus de validation si nécessaire)

    // Hachage du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    // Requête SQL pour insérer l'utilisateur dans la base de données
    $insertUser = $bdd->prepare('INSERT INTO utilisateurs (role, name, email, password, tel) VALUES (?, ?, ?, ?, ?)');
    $insertUser->execute([$role, $name, $email, $hashedPassword, $tel]);

    if ($insertUser) {
        // Utilisateur inséré avec succès, vous pouvez effectuer des actions supplémentaires ici
        $_SESSION['user'] = $bdd->lastInsertId();  // Stockez l'ID de l'utilisateur dans la session
        echo "Utilisateur enregistré avec succès.";
        // Redirigez l'utilisateur vers une page appropriée après l'inscription
        header('Location: /profil.php');
        exit();
    } else {
        // Erreur lors de l'insertion de l'utilisateur
        echo "Erreur lors de l'inscription. Veuillez réessayer.";
    }
}
