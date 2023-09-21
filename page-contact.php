<?php
//Session utilisateurs
session_start();
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
//Connection à la bdd
require_once 'C:\wamp64\www\garagevparrot\configbdd.php';
require __DIR__ . '/ressources/config/menu.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Donner du SEO-->
    <meta name="keywords" content=<?= $mainMenu[$currentPage]['meta_keywords'] ?>>
    <meta name="description" content=<?= $mainMenu[$currentPage]['meta_description'] ?>>
    <link rel="shortcut icon" type="image/x-icon" href="../ressources/asset/lib/icone-removebg-preview.png">
    <title><?= $mainMenu[$currentPage]['head_title'] ?></title>
    <!--Liaison avec fichier style-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../ressources/css/style-AC.css">
    <link rel="stylesheet" type="text/css" href="./ressources/css/contact.css">
    <link rel="stylesheet" type="text/css" href="./ressources/css/maps.css">



    <script src="https://kit.fontawesome.com/609ebaf712.js" crossorigin="anonymous"></script>


</head>
<?php

$society = $bdd->query('SELECT * FROM societe');
$infos = $society->fetch();

$annonce = $bdd->query('SELECT * FROM annonce');
$adv = $annonce->fetch();

//$schedule = $bdd->query('SELECT * FROM horaires');
//$time = $schedule->fetch();
$mysqli = new mysqli("localhost", "root", "", "garage_v_parrot");
$mysqli->set_charset("utf8");
$schedule = 'SELECT * FROM horaires';
$time = $mysqli->query($schedule);

$notes = $bdd->query('SELECT * FROM avis WHERE statut = "Publié" ');


?>

<body>

    <!--Start : header-->
    <?php

    //barre de Navigation
    require_once __DIR__ . '/ressources/views/nav.php';
    ?>
    <div class="align">
        <h1>Notre Hstoire</h1>
        <p class="align" id="annonce"><strong><?= $adv['annonce'] ?></strong> </p>
        <div>
            <p>Suivez-nous</p>
            <ul class="socials-logo column">
                <li>
                    <a href="https://www.facebook.com">
                        <i class="fa-2x fa-brands fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com">
                        <i class="fa-2x fa-brands fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>



        <h4>Horaires</h4>
        <?php
        include __DIR__ . '/ressources/config/config_hour.php';
        echo $horaireContent;
        ?>
    </div>



    <!--Start à propos-->
    <?php
    include __DIR__ . '/ressources/views/a-propos.php';
    ?>


    <!--Start où nous trouver-->
    <?php
    include __DIR__ . '/ressources/views/maps.php';
    ?>
    <!--Start FOOTER -->
    <?php
    require_once __DIR__ . '/ressources/views/footer.php';
    ?>
    <script src="/ressources/js/nav.js"></script>
</body>

</html>