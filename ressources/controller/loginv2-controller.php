<?php
session_start();

// Inclure le fichier de configuration de la base de données
require_once 'C:\wamp64\www\garagevparrot\configbdd.php';
if (isset($_POST["loginUser"])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];

        $email = strtolower($email);

        // Requête SQL pour vérifier si l'utilisateur existe avec l'email donné
        $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = ?');
        $check->bindValue(":email", $email, PDO::PARAM_STR);
        $check->execute([$email]);
        $user = $check->fetch();

        if ($user) {
            if ($password == $user['password']) {
                $_SESSION['user'] = $user['id'];

                header('Location: ' . $_SESSION['current_page']);
                setcookie('user', 'id', time() + 900, '/');
                die();
            } elseif (password_verify($password, $user['password'])) {
                // Mot de passe haché trouvé, connexion réussie
                $_SESSION['user'] = $user['id'];

                header('Location: ' . $_SESSION['current_page']);
                setcookie('user', 'id', time() + 900, '/');
                die();
            } else {
                // Aucune correspondance trouvée
                echo 'Votre mot de passe est incorrect.';
            }
        } else {
            echo "Cet utilisateur n'est pas enregistré";
        }
    } else {
        echo "Veuillez remplir tous les champs";
    }
}
