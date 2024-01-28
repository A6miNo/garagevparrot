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
    <!-- Styles Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy9+5BRx6Py5Jg6L/jRUssvpeBR/DFFXL" crossorigin="anonymous">


    <!--Liaison avec fichier style-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../ressources/css/style-AC.css">
    <link rel="stylesheet" type="text/css" href="../ressources/css/home-style.css">


    <script src="https://kit.fontawesome.com/609ebaf712.js" crossorigin="anonymous"></script>


</head>

<?php

$society = $bdd->query('SELECT * FROM societe');
$infos = $society->fetch();

$annonce = $bdd->query('SELECT * FROM annonce');
$adv = $annonce->fetch();

$mysqli = new mysqli("localhost", "root", "", "garage_v_parrot");
$mysqli->set_charset("utf8");
$schedule = 'SELECT * FROM horaires';
$time = $mysqli->query($schedule);

$notes = $bdd->query('SELECT * FROM avis WHERE statut = "Publié" ORDER BY id DESC LIMIT 2');;
$notes->execute();


?>


<body>

    <!--Start  header-->
    <?php

    //barre de Navigation
    require_once __DIR__ . '/ressources/views/nav.php';
    ?>
    <main class="main-contain">
        <div class="child1" id="video-background">
            <video autoplay="" muted="" loop="">
                <source src="./asset/Video/production_id_4488715 (2160p).mp4" type="video/mp4">
            </video>
        </div>
        <div class="child1 child2">
            <div class="content-text">
                <h1 class="title-first"> <?= htmlentities($infos['name']) ?> </h1>
                <div class="description">
                    <p class="upcase">Réparation Automobile toutes marques sur Toulouse</p>
                    <p id="annonce"> <?= htmlentities($adv['annonce']) ?> </p>
                </div>
            </div>

            <div class="info-garage">
                <a href="#localisation" class="btn btn-contact btn-tel" data-tel-bdd="<?php htmlentities($infos['phone']); ?>">
                    <i class="fa-2x  fa-solid fa-phone-volume "></i>
                </a>
                <div class="hour">
                    <h4>Horaires</h4>
                    <?php
                    include __DIR__ . '/ressources/config/config_hour.php';
                    echo $horaireContent;
                    ?>
                </div>

                <a href="#localisation" class="btn btn-contact btn-adr" data-adr-bdd="<?php htmlentities($infos['adresse']); ?>">
                    <i class="fa-2x  fa-solid fa-map-location-dot "></i>
                </a>
            </div>

            <div class="icon-scroll">

                <a href="#a-propos">
                    <img src="./asset/image/arrow-drop-down-line.png" alt="Cliquez ici pour accéder à la section">
                </a>
            </div>
        </div>



    </main>
    <!--Start a propos-->
    <?php
    include __DIR__ . '/ressources/views/a-propos.php';
    ?>


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
                    <div class="container-texts column">
                        <h3>Réparation</h3>
                        <a href="/garage.php" class="btn-home btn-road">Prendre RDV</a>
                    </div>
                </div>
                <div class="card-service">
                    <img src="./asset/image/photo entretien.jpg" alt="image entretien voiture">
                    <div class="container-texts">
                        <h3>Entretien</h3>
                        <a href="/garage.php#id-form" class="btn-home btn-road">Prendre RDV</a>
                    </div>
                </div>
                <div class="card-service">
                    <img src="./asset/image/pre-owned-vehicles-6893760_1280.jpg" alt="image parc automobile">
                    <div class="container-texts">
                        <h3>Vente de véhicules d'occasion</h3>
                        <a href="/catalogue-occasion.php" class="btn-home btn-road">Découvrir</a>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <!--Start où nous trouver-->
    <?php
    include __DIR__ . '/ressources/views/maps.php';
    ?>


    <!--Start Avis online -->
    <section class="online">
        <div class="flux online-content">
            <a class="btn btn-avis" data-toggle="modal" data-target="#avisModal">voir tous les avis</a>
            <h2>Avis des clients</h2>
            <div class="cards-content">

                <?php
                include __DIR__ . '/ressources/config/config_avis.php'
                ?>
            </div>

    </section>

    <!-- Modal -->
    <div class="modal hide fade flux" id="avisModal" tabindex="-1" role="dialog" aria-labelledby="avisModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content flex col wrap bg-primary">
                <div class="modal-header">
                    <h5 class="modal-title" id="avisModalLabel">Les avis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Contenu de la modal -->
                    <?php
                    $notes = $bdd->query('SELECT * FROM avis WHERE statut = "Publié" ORDER BY id ASC');;
                    $notes->execute();
                    include __DIR__ . '/ressources/config/config_avis.php'
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-avis" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    </div>



    <!--Start footer -->
    <?php
    require_once __DIR__ . '/ressources/views/footer.php';
    ?>
    <!-- Liaison avec Bootstrap JS (nécessaire pour le fonctionnement des modales) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!--Liaison JS -->
    <script src="./ressources/js/main.js"> </script>
    <script src="./ressources/js/video.js"> </script>
    <script src="./ressources/js/nav.js"></script>
    <script src="./ressources/js/pop.js"></script>
</body>

</html>