<?php
//Session utilisateurs
session_start();
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
//Connection à la bdd
require_once 'configbdd.php';
require __DIR__ . '/ressources/config/menu.php';

//include __DIR__ . '/ressources/config/config_profil.php';
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Donner du SEO-->

    <link rel="shortcut icon" type="image/x-icon" href="../asset/image/icone-removebg-preview.png">
    <title><?= $mainMenu[$currentPage]['head_title'] ?></title>
    <!--Liaison avec fichier style-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../ressources/css/style-AC.css">
    <link rel="stylesheet" type="text/css" href="../ressources/css/catalogue-style.css">
    <script src="https://kit.fontawesome.com/609ebaf712.js" crossorigin="anonymous"></script>


</head>





<?php
$society = $bdd->query('SELECT * FROM societe');
$infos = $society->fetch();

$mysqli = new mysqli("localhost", "root", "", "garage_v_parrot");
$mysqli->set_charset("utf8");
$schedule = 'SELECT * FROM horaires';
$time = $mysqli->query($schedule);

$product = $bdd->query('SELECT * FROM voitures');
$cars = $product->fetch();

?>

<body>

    <!--Start : header-->
    <?php

    require_once __DIR__ . '/ressources/views/nav.php';

    ?>

    <h1><?= htmlentities($infos['name']) ?>:<br> Nos Véhicules d'occasion</h1>
    <div class="hide">
        <h2>Horaires</h2>
        <?php

        include __DIR__ . '/ressources/config/config_hour.php';
        echo $horaireContent;
        ?>
    </div>

    <main class="container_catalogue">
        <section class="side_bar">
            <div class="head-filter">
                <h2>Filtres</h2>
                <button class="arrow">
                    <span class="bar-arrow"></span>
                </button>

            </div>
            <div class="searchDiv">
                <form id="filter-form">

                    <!-- info et btn recherche -->
                    <div class="form-title separator">Rechercher</div>
                    <div class="info-filter">
                        <p> <span id="nbsearch"></span></p>
                        <button class="btn btn-filter" type="submit" id="applyFilters">Filtrer</button>
                        <button class="btn btn-filter" type="submit" id="reset-filters">Réinitialiser</button>
                    </div>
                    <br>
                    <!-- Marques / Modèles -->
                    <div class="form-title">Marques / Modèles</div>
                    <div class="searchDiv">
                        <label for="marque">Marques</label>
                        <select id="marque" name="marque">
                            <option value="all">Toutes les marques</option>

                        </select>
                        <label for="modele">Modèles</label>
                        <select id="modele" name="modele">
                            <option value="all">choisissez d'abord une marque</option>
                            <!-- Options de la liste déroulante pour les modèles -->
                        </select>
                    </div>

                    <!-- Prix -->
                    <div class="form-title separator">Prix</div>
                    <div class="searchDiv">
                        <div class="price-group">
                            <label for="minPrice">Prix minimum:</label>
                            <input type="number" id="minPrice" name="minPrice" min=0 placeholder="Min" />
                            <label for="maxPrice">Prix maximum:</label>
                            <input type="number" id="maxPrice" name="maxPrice" max=999999, placeholder="Max" />
                        </div>
                    </div>
                    <div class="form-title separator">Caractéristiques</div>
                    <div class="searchDiv column">
                        <label for="annee">Année</label>
                        <div class="input-group row">
                            <input type="number" id="annee-min" name="annee-min" placeholder=" année min">
                            <input type="number" id="annee-max" name="annee-max" placeholder=" année max">
                        </div>
                        <label for="km">Kilométrage </label>
                        <div class="input-group row">
                            <input type="number" id="minKm" name="minKm" placeholder=" km min" min=0>
                            <input type="number" id="maxKm" name="maxKm" placeholder=" km max" max=9999999999>
                        </div>
                        <!-- A METTRE LORS DU UPDATE 
                        <div class="fieldset-group column">
                            <div class="input-group row">
                                <fieldset>
                                    <legend>Energie</legend>
                                    <input type="checkbox" id="essence" class="energie-checkbox" name="energie" value="essence">
                                    <label>Essence</label>
                                    <input type="checkbox" id="diesel" class="energie-checkbox" name="energie" value="diesel">
                                    <label>Diesel</label>
                                    <input type="checkbox" id="hybride" class="energie-checkbox" name="energie" value="hybride">
                                    <label>Hybride</label>
                                    <input type="checkbox" id="electrique" class="energie-checkbox" name="energie" value="electrique">
                                    <label>Electrique</label>
                                </fieldset>
                            </div>
                            <div class="input-group row">
                                <fieldset>
                                    <legend>Boite de vitesse</legend>
                                    <input type="radio" id="manuel" name="boite-vitesse">
                                    <label for="manuel">Manuel</label>
                                    <input type="radio" id="automatique" name="boite-vitesse">
                                    <label for="automatique">Auto</label>
                                </fieldset>
                            </div>
                        </div>
                        -->
                    </div>




                </form>
            </div>
        </section>
        <section>
            <div class="tri">
                <div>
                    <label for="cars">Trier par:</label>
                    <select name="tri" id="tri">
                        <option disabled selected value> </option>
                        <option value="gr_up">par prix croissant</option>
                        <option value="gr_dw">par prix décroissant</option>
                    </select>
                </div>
                <p class="info"> </p>
            </div>


            <div class="catalogue " id="listeVehicules"></div>
        </section>

    </main>
    <!--Start FOOTER -->
    <?php
    require_once __DIR__ . '/ressources/views/footer.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="/ressources/js/ajax.js"></script>

    <script src="/ressources/js/openfiche.js"></script>
    <script src="/ressources/js/nav.js"></script>

    <script>
        console.log(' . json_encode($data) . ')
    </script>
    ?>
</body>






</html>