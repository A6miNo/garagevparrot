<?php
session_start();

// Include the database configuration file
require_once '../../configbdd.php';

if (isset($_POST["loginUser"])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];

        $email = strtolower($email);

        // Requête SQL pour vérifier si l'utilisateur existe avec l'email donné
        $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = ?');
        $check->execute([$email]);
        $user = $check->fetch();
        echo 'Mot de passe haché dans la base de données : ' . $user['password'];
        if ($user) {
            // Vérifier le mot de passe en texte brut
            if ($password === $user['password']) {
                // Mot de passe en texte brut trouvé, connexion réussie
                $_SESSION['user'] = $user['id'];

                // Redirection vers la page d'origine ou une page par défaut
                $redirect_page = isset($_SESSION['current_page']) ? $_SESSION['current_page'] : '/index.php';
                header('Location: /profil.php');
                setcookie('user', 'id', time() + 900, '/');
                die();
            }
            // Vérifier le mot de passe haché

            elseif (password_verify($password, $user['password'])) {
                // Mot de passe haché trouvé, connexion réussie
                $_SESSION['user'] = $user['id'];

                // Redirection vers la page d'origine ou une page par défaut
                $redirect_page = isset($_SESSION['current_page']) ? $_SESSION['current_page'] : '/index.php';
                header('Location: /profil.php');
                setcookie('user', 'id', time() + 900, '/');
                die();
            } else {
                // Mot de passe incorrect
                echo 'Votre mot de passe est incorrect.';
            }
        } else {
            // Utilisateur non enregistré
            echo "Cet utilisateur n'est pas enregistré";
        }
    } else {
        // Tous les champs ne sont pas remplis
        echo "Veuillez remplir tous les champs";
    }
}
