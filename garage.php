<?php
//Session utilisateurs
session_start();
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
//Connection à la bdd
require_once 'configbdd.php';
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
    <link rel="shortcut icon" type="image/x-icon" href="/asset/image/icone-removebg-preview.png">
    <title><?= $mainMenu[$currentPage]['head_title'] ?></title>


    <!--Liaison avec fichier style-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../ressources/css/style-AC.css">
    <link rel="stylesheet" type="text/css" href="../ressources/css/garage.css">
    <link rel="stylesheet" type="text/css" href="../ressources/css/formulaire.css">


    <script src="https://kit.fontawesome.com/609ebaf712.js" crossorigin="anonymous"></script>


</head>
<?php
$society = $bdd->query('SELECT * FROM societe');
$infos = $society->fetch();

$mysqli = new mysqli("localhost", "root", "", "garage_v_parrot");
$mysqli->set_charset("utf8");
$schedule = 'SELECT * FROM horaires';
$time = $mysqli->query($schedule);
?>


<body>
    <?php
    //barre de Navigation
    require_once __DIR__ . '/ressources/views/nav.php';

    ?>
    <main class="main-garage">
        <h1><?= htmlentities($infos['name']) ?></h1>
        <div class="info-garage">
            <a href="#localisation" class="btn btn-contact btn-tel" data-tel-bdd="<?php htmlentities($infos['phone']); ?>">
                <i class="fa-2x  fa-solid fa-phone-volume "></i>
            </a>
            <div class="hour">
                <h2>Horaires</h2>
                <?php

                include __DIR__ . '/ressources/config/config_hour.php';
                echo $horaireContent;
                ?>
            </div>
            <a href="#localisation" class="btn btn-contact btn-adr" data-adr-bdd="<?php htmlentities($infos['adresse']); ?>">
                <i class="fa-2x  fa-solid fa-map-location-dot "></i>
            </a>
        </div>
        <div class="page_title"></div>

    </main>

    <!--Start services-->
    <section class="grp-service">
        <div class="flux">
            <div class="text-info">
                <h2>Les Services de notre Garage</h2>
                <p>Panne de voiture ? Entretien courant ? Et pourquoi pas un nouveau véhicule ? Nous vous proposons des services adaptées à vos besoins.</p>
            </div>

            <div class="flux service-content">
                <div class="card-service">
                    <img src="./asset/image/auto-repair-g9ea5d1564_640.jpg" alt="image réparation voiture">
                    <div class="container-texts">
                        <h3>Réparation</h3>
                        <p class="text-paragraphe">Une panne et un accident peuvent arriver. Nous sommes là pour vous accomapagner dans vos réparations.</p>
                        <ul class="list-ok">
                            <li>Réparation Mécanique</li>
                            <li>Electrique - Electronique</li>
                            <li>Carrosserie: peinture</li>
                            <li>Pneumatique</li>
                        </ul>
                        <a href="#id-form" class="btn-home btn-road">Prendre RDV</a>
                    </div>
                </div>
                <div class="card-service">
                    <img src="./asset/image/photo entretien.jpg" alt="image entretien voiture">
                    <div class="container-texts">
                        <h3>Entretien</h3>
                        <p class="text-paragraphe">La date du contrôle technechique approche, un départ en vaccances ? Voici une liste non exhaustive des entretiens courants.</p>
                        <ul class="list-ok">
                            <li>Vidange et remplacement des filtres</li>
                            <li>Remplacement des bougies</li>
                            <li>Contrôle des niveaux et systeme informatique</li>
                            <li>Réglage des freins</li>
                            <li>Nettoyage du véhicule</li>
                        </ul>
                        <a href="#id-form" class="btn-home btn-road">Prendre RDV</a>
                    </div>
                </div>
                <div class="card-service">
                    <img src="./asset/image/pre-owned-vehicles-6893760_1280.jpg" alt="image parc automobile">
                    <div class="container-texts">
                        <h3>Vente de véhicules d'occasion</h3>

                        <p>Notre parc automobile se renouvelle régulierement. N'hesitez pas à consultez notre catalogue.</p>
                        <ul class="list-ok">
                            <li>Véhicules toutes marques</li>
                            <li>Propositions de financement</li>
                            <li>Reprise de votre ancien véhicule possible</li>
                            <li>Garanti : 1 à 2 ans pour tous types de véhicules</li>
                        </ul>

                        <a href="#id-form" class="btn-home btn-road">Découvrir</a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <?php

    include __DIR__ . '/ressources/views/formulaire.php';

    require_once __DIR__ . '/ressources/views/footer.php';
    ?>
</body>
<script src="/ressources/js/nav.js"></script>
<script src="../ressources/js/main.js"> </script>
<script src="../ressources/js/formulaire.js"></script>

</html>