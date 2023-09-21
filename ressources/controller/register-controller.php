<?php
// Initialisation
session_start();

// Inclure le fichier de configuration de la base de données
require_once('C:\wamp64\www\garagevparrot\configbdd.php');

$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];

if (isset($_POST["createUser"])) { //ajout le 19-09
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['password']) && !empty($_POST['role'])) {
        // Patch XSS (sécurité)
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $telephone = htmlspecialchars($_POST['tel']);
        $password = htmlspecialchars($_POST['password']);
        $selectedRole = htmlspecialchars($_POST['role']);

        // Vérifier si l'utilisateur existe déjà pour éviter les doublons
        $check = $bdd->prepare('SELECT pseudo, email, phone, password FROM utilisateurs WHERE email = ?');
        $check->bindValue(":email", $email, PDO::PARAM_STR); //ajout le 19-09
        $check->execute(array($email));
        $verif_user = $check->fetch(PDO::FETCH_ASSOC);
        $row =  $check->rowCount();

        // Tous les caractères majuscules seront transformés en minuscules pour éviter les majuscules dans les e-mails.
        $email = strtolower($email);

        if ($row == 0) {
            if (strlen($name) <= 20) {
                if (strlen($email) <= 50) {
                    if (strlen($telephone) == 10) {
                        if (strlen($password) >= 8) { // Correction de la longueur minimale du mot de passe
                            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                // Hash du mot de passe avec Bcrypt
                                $password = password_hash($password, PASSWORD_BCRYPT);

                                $insert_db = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, phone, password, role) VALUES(:name, :email, :telephone, :password, :role)');
                                $insert_db->execute(array(
                                    'name' => $name,
                                    'email' => $email,
                                    'telephone' => $telephone,
                                    'password' => $password, // Ajout du mot de passe hashé
                                    'role' => $selectedRole
                                ));
                                header('Location:/profil.php');
                            } else {
                                echo "L'email n'est pas valide";
                            }
                        } else {
                            echo 'Votre mot de passe doit faire au moins 6 caractères';
                        }
                    } else {
                        echo 'Le numéro de téléphone doit faire 10 caractères';
                    }
                } else {
                    echo 'Votre email est trop long';
                }
            } else {
                echo 'Votre pseudo est trop long';
            }
        } else {
            echo "Le compte existe déjà";
        }
    } else {
        echo "Vous n'avez pas rempli tous les champs";
    }
}



// Modification article

if (isset($_POST["createCar"])) {
    if (!empty($_POST['marque']) && !empty($_POST['modele']) && !empty($_POST['carburant']) && !empty($_POST['boite']) && !empty($_POST['prix']) && !empty($_POST['mise_en_circulation']) && !empty($_POST['km']) && !empty($_POST['description'])) {
        // Patch XSS (sécurité)
        $marque = htmlspecialchars($_POST['marque']);
        $modele = htmlspecialchars($_POST['modele']);
        $carburant = htmlspecialchars($_POST['carburant']);
        $boite = htmlspecialchars($_POST['boite']);
        $mec = htmlspecialchars($_POST['mise_en_circulation']);
        $prix = htmlspecialchars($_POST['prix']);
        $km = htmlspecialchars($_POST['km']);
        $description = htmlspecialchars($_POST['description']);
        $image1 = filter_var($_POST['img_url_1'], FILTER_SANITIZE_URL);
        $image2 = filter_var($_POST['img_url_2'], FILTER_SANITIZE_URL);
        $image3 = filter_var($_POST['img_url_3'], FILTER_SANITIZE_URL);
        $image4 = filter_var($_POST['img_url_4'], FILTER_SANITIZE_URL);

        $mec = date('Y-m-d', strtotime($mec));

        $insert_car = $bdd->prepare('INSERT INTO voitures (marque, modele, carburant, boite, mise_en_circulation, prix, km, description, img_url_1, img_url_2, img_url_3, img_url_4) VALUES (:marque, :modele, :carburant, :boite, :mec, :prix, :km, :description, :image1, :image2, :image3, :image4)');
        $insert_car->execute(array(
            'marque' => $marque,
            'modele' => $modele,
            'carburant' => $carburant,
            'boite' => $boite,
            'mec' => $mec,
            'prix' => $prix,
            'km' => $km,
            'description' => $description,
            'image1' => $image1,
            'image2' => $image2,
            'image3' => $image3,
            'image4' => $image4,

        ));

        header('Location:/profil.php');
    } else {
        echo "Probleme";
    }
}
