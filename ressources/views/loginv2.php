<?php

session_start();

//connection à la bdd
require_once '../../configbdd.php';


$affich_users = $bdd->prepare('SELECT * FROM utilisateurs');
$affich_users->execute(array());
$affichage = $affich_users->fetch();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/style-AC.css">
    <link rel="stylesheet" href="../css/loginv2.css">

</head>

<body>

    <a href="/index.php">
        <button class="BtnRetour"> Retourner à la page d'accueil</button>
    </a>

    <div class="center">
        <h1>Se connecter</h1>
        <form action="/ressources/controller/loginv2-controller.php" method="post">
            <div class="txt_field">
                <input type="text" name="email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Mot de passe</label>
            </div>



            <input type="submit" value="Connexion" name="loginUser">


        </form>
    </div>
</body>


</html>