<?php
session_start();
//$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
//Connection à la bdd
require_once 'configbdd.php';

require __DIR__ . '/ressources/config/menu.php';
require __DIR__ . '/ressources/config/function.php';
//$mainMenu["fiche.php"] = ["menu_title" => "Voiture Introuvable", "head_title" => "Voiture Introuvable", "meta_description" => "Voiture Introuvable", "meta_keywords" => "Voiture Introuvable, article ", "navclass" => "", "exclude" => true];

$error = false;
if (isset($_GET['id'])) {
    $id = $_GET["id"];
    $article = getArticleById($bdd, $id);
    if ($article) {
        $mainMenu["fiche.php"] =  ["menu_title" => "Fiche Article", "head_title" => "Fiche Article", "meta_description" => "presentation d'une voiture d'occassion à la vente", "meta_keywords" => "fiche, article ", "navclass" => "", "exclude" => true];
    } else {;
        $error = true;
    }
} else {;
    $error = true;
}

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
    <link rel="stylesheet" type="text/css" href="../ressources/css/fiche-style.css">
    <link rel="stylesheet" type="text/css" href="../ressources/css/formulaire.css">


    <script src="https://kit.fontawesome.com/609ebaf712.js" crossorigin="anonymous"></script>


</head>


<body>
    <header class="flux">
        <div id="btn_nav">
            <button id="close" class="close-button"><a href="/catalogue-occasion.php">""</a></button>
            <a href="/catalogue-occasion.php">Retour</a>
        </div>
    </header>
    <!--START MAIN-->
    <?php if (!$error) { ?>
        <main>
            <section class="description column flux">
                <h1> <?php echo htmlentities($article['marque']) ?></h1>
                <h2> <?php echo htmlentities($article['modele']) . " " . htmlentities($article['id']) ?>XXXX</h2>
                <p id="price"><?php echo htmlentities($article['prix']) ?> €</p>

                <p id="resume"><?php echo htmlentities($article['description']) ?></p>
                <br>
                <a href="#id-form"><button class="btn-contact btn-home btn-road  ">Contacter le vendeur</button></a>
            </section>
            <section class="photo column">

                <img id="photo-select" class="img_one" src="<?php echo htmlentities($article['img_url_1']) ?>" alt="photo principale" />


                <ul class="list-photo row">
                    <li><img class="img-small img_two" data-src="<?php echo htmlentities($article['img_url_2']) ?>" src="<?php echo htmlentities($article['img_url_2']) ?>" alt="photo decouverte 1" /></li>
                    <li><img class="img-small img_three" data-src="<?php echo htmlentities($article['img_url_3']) ?>" src="<?php echo htmlentities($article['img_url_3']) ?>" alt="photo decouverte 2" /></li>
                    <li><img class="img-small img_four" data-src="<?php echo htmlentities($article['img_url_4']) ?>" src="<?php echo htmlentities($article['img_url_4']) ?>" alt="photo decouverte 3" /></li>
                </ul>

                <div>
                    <ul class="icon-list">
                        <li><i class="fa-2x fa-solid fa-gauge"></i> <?php echo htmlentities($article['boite']) ?></li>
                        <li><i class="fa-2x fa-solid fa-calendar-days"></i> <?php echo htmlentities($article['mise_en_circulation']) ?></li>
                        <li><i class="fa-2x fa-solid fa-gas-pump"></i> <?php echo htmlentities($article['carburant']) ?></li>
                        <li> <?php echo htmlentities($article['km']) ?> KM</li>
                    </ul>
                </div>
            </section>
        </main>
    <?php } else { ?>
        <h1>... la voiture roule vers d'autres horizons</h1>
    <?php } ?>
    <!--START FORMULAIRE-->

    <!--Start formulaire-->
    <?php
    include __DIR__ . '/ressources/views/formulaire.php';
    ?>
    <!--formulaire faire option value=sale automatique et faire ref automatique-->


    <?php
    $mysqli = new mysqli("localhost", "root", "", "garage_v_parrot");
    $mysqli->set_charset("utf8");
    $schedule = 'SELECT * FROM horaires';
    $time = $mysqli->query($schedule);

    ?>
    <div class="hide">
        <?php
        include __DIR__ . '/ressources/config/config_hour.php';
        echo $horaireContent;
        ?>
    </div>
    <!--Start FOOTER -->
    <?php

    require_once __DIR__ . '/ressources/views/footer.php';
    ?>

</body>

<script src="/ressources/js/imagemoove.js"></script>
<script src="/ressources/js/nav.js"></script>
<script src="/ressources/js/formulaire.js"></script>

</html>