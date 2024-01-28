<?php
//Session utilisateurs
session_start();
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
//Connection à la bdd
require_once 'configbdd.php';
//recup pour le head
require __DIR__ . '/ressources/config/menu.php';
include __DIR__ . '/ressources/config/config_profil.php';
include __DIR__ . '/ressources/config/config_hour.php';


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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!--<link rel="stylesheet" type="text/css" href="../ressources/css/profil.css">-->
  <link rel="stylesheet" type="text/css" href="../ressources/css/profilv2.css">
  <script src="https://kit.fontawesome.com/609ebaf712.js" crossorigin="anonymous"></script>


</head>

<body>
  <header class="head-profil">
    <div class="container">
      <div class="row align-items-center">
        <!-- Logo à gauche -->
        <div class="col-md-4">
          <img class="logo img-fluid" title="logo-garage-parrot" src="/asset/image/logo_parrot-removebg-preview.png" alt="logo garage">
        </div>

        <!-- Titre au milieu -->
        <div class="col-md-4 text-center">
          <h1><?= $greeting ?></h1>
        </div>

        <!-- Head annonce à droite -->
        <div class="col-md-4 text-right">
          <div class="head-annonce column">
            <p>
              <?php if (!empty($additionalMessage)) : ?>
            <p><?= $additionalMessage ?></p>
          <?php endif; ?>

          </p>
          </div>
        </div>
      </div>

    </div>
  </header>


  <main class="container-fluid">
    <div class="row">
      <!-- Sidebar pour les écrans md et lg -->
      <div class="sidebar col-md-2 border d-md-flex flex-md-column bg-dark text-light">
        <h2 class="text-center mt-2 mb-4">Menu</h2>
        <div id="categories" class="d-flex flex-column mb-2">
          <!-- Liens de la sidebar ici -->
          <button class="mb-3 bg-dark text-light" data-category="info">Info de la société</button>
          <button class="mb-3 bg-dark text-light" data-category="message">Message <span class="countmess badge badge-pill bg-white text-danger">
              <?php
              $table_name = "formulaire";
              $table_name = "formulaire";
              $column = "etat";
              $value = "A TRAITER";

              $count = getTableObjectCount($bdd, $table_name, $column, $value);
              echo  $count;
              ?>
            </span>
          </button>
          <button class="mb-3 bg-dark text-light" data-category="catalogue">Parc automobile</button>
          <button class="mb-3 bg-dark text-light" data-category="avis">Modération des avis</button>
          <a class="mb-3 btn-road btn-home text-light" href="index.php">Voir le site</a>
          <a class="mb-3 btn-road btn-home text-light" href="/ressources/views/logout.php">Se déconnecter</a>
        </div>
      </div>


      <!-- Contenu principal à droite -->
      <div class="col-md-10 mt-2 ">
        <!-- ------------------------------------------- Info -->
        <section id="infosociete" class="info">
          <h2>LES INFORMATIONS GENERALES</h2>
          <?php
          include './ressources/sectionback/section-info.php';
          ?>
        </section>
        <!-- ------------------------------------------- MESSAGE -->
        <section id="message" class=" info message mt-2">
          <h2>CONSULTER LES MESSAGES </h2>
          <?php
          include './ressources/sectionback/section-message.php';
          ?>
        </section>
        <!-- -------------------------------------------Catalogue -->
        <section id="catalogue" class=" info catalogue mt-2">
          <h2>LES VOITURES A LA VENTE</h2>
          <button class="btn btn-success"><a class="createbtn text-white" href="./ressources/views/registercar.php">Créer un nouvel article</a></button>
          <!-- ici  les cartes -->
          <?php
          include './ressources/sectionback/section-catalogue.php'
          ?>
        </section>
        <!-- ------------------------------------------- AVIS -->
        <section id="avis" class=" info avis mt-2">
          <h2>LES AVIS EN ATTENTE DE VALIDATION</h2>
          <p id="infoavis" class="font-weight-bold"></p>
          <?php
          include './ressources/sectionback/section-avis.php'
          ?>
        </section>
      </div>
    </div>
  </main>


  <footer class="footer bg-dark text-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p class="mb-0">Au Garage V PARROT</p>
        </div>
        <div class="col-md-6 text-md-right">
          <p class="mb-0">&copy; 2023 A.Cimmino</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="/ressources/js/filtrebackoffice.js"></script>
</body>


</html>