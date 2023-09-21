<?php
//Session utilisateurs
session_start();
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
//Connection à la bdd
require 'C:\wamp64\www\garagevparrot\configbdd.php';
//recup pour le head
require __DIR__ . '/ressources/config/menu.php';
include __DIR__ . '/ressources/config/config_profil.php';


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


  <link rel="stylesheet" type="text/css" href="../ressources/css/profil.css">

  <script src="https://kit.fontawesome.com/609ebaf712.js" crossorigin="anonymous"></script>


</head>

<body>
  <header class="head-profil">
    <img class="logo" title="logo-garage-parrot" src="/asset/image/logo_parrot-removebg-preview.png" alt="logo garage">
    <h1>Bonjour <?= $salaries['pseudo'] ?></h1>
    <div class="head-annonce column ">
      <p>
        <?php

        if ($salaries['role'] === "Administrateur") {
          echo $salaries['pseudo'] . ' fait bien parti des utilisateurs  ayant des droits étendus !';
        }

        ?></p>

    </div>
  </header>


  <div class="sidebar">
    <a class="btn-road btn-home" href="#infosociete">Info de la société</a>
    <a class="btn-road btn-home" href="#messsage">Message <span class="countmess">
        <?php
        $table_name = "formulaire";
        $count = getTableObjectCount($bdd, $table_name);
        echo  $count;
        ?>
      </span></a>
    <a class="btn-road btn-home" href="#catalogue">Parc automobile</a>
    <a class="btn-road btn-home" href="#avis">Moderation des avis</a>
    <a class="btn-road btn-home" href="index.php">Voir le site</a>
    <a class="btn-road btn-home" href="/ressources/views/logout.php">Se deconnecter</a>
  </div>

  <button id="retour-en-haut" title="Retour en haut">^</button>
  <div class="contain">

    <section id="infosociete">
      <h2>Les informations du garage</h2>
      <div class="garage">
        <div class="">
          <div>
            <div class="">
              <h3>Information de la société </h3>
              <!--Affiche les informations de la societé pour tous les utilsateurs (admin et employés)-->
              <?php
              foreach ($infos as $info) {
                echo '<pre>';
                print_r($info);
                echo '</pre>';
              }
              ?>
            </div>
            <div class="adm">
              <?php
              if (isset($_SESSION['user'])) {
                if ($role == "Administrateur") {

                  echo '<div class="adm-gestion">';
                  echo '<p><strong> Modifier les informations</strong></p>'

              ?>
                  <form class="formulaire " action="./ressources/controller/profil-controller.php" method="post">
                    <label>Nom</label>
                    <input type="text" name="name" value="<?= $infos['name'] ?>" />
                    <label>Télephone</label>
                    <input type="tel" name="phone" minlength="10" maxlength="10" value="<?= $infos['phone'] ?>" />
                    <label>Email</label>
                    <input type="text" name="mailing" value="<?= $infos['mailing'] ?>" />
                    <label>Adresse</label>
                    <input type="text" name="adresse" value="<?= $infos['adresse'] ?>" />
                    <label>Siret</label>
                    <input type="text" name="siret" maxlength="14" value="<?= $infos['siret'] ?>" />
                    <?php
                    if (isset($_SESSION['user'])) {
                      if ($role == "Administrateur") {
                        echo '<input class="save" type="submit" value="Sauvegarder" name="savesociete" />';
                      }
                    }
                    ?>
                  </form>
              <?php
                }
              }
              ?>


            </div>

          </div>
        </div>
        <div>
          <h3>Les horaires</h3>
          <?php
          include __DIR__ . '/ressources/config/config_hour.php';
          echo $horaireContent;

          $options_statut = array("Ouvert", "Fermé");
          if (isset($_SESSION['user'])) {
            if ($role == "Administrateur") {


              echo '<div class="adm-gestion">';
              echo '<p><strong> Modifier les horaires</strong></p>';
              echo '<form class="formulaire horaires" action="./ressources/controller/profil-controller.php" method="post">';

              if ($result->num_rows > 0) {
                echo "<table border='1'>
                    <tr>
                    <th>iD</th>
                      <th>Jour</th>
                      <th>Heure d'ouverture AM</th>
                      <th>Heure de fermeture AM</th>
                      <th>Heure d'ouverture PM</th>
                      <th>Heure de fermeture PM</th>
                      <th>Statut</th>
                    </tr>";
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td> <input class=\"inputid\" name=\"openam\" value= \" " . $row["id"] . "\"</td>";
                  echo "<td>" . $row["jour"] . "</td>";
                  echo "<td> <input name=\"openam\" value= \" " . $row["heure_ouverture_am"] . "\"</td>";
                  echo "<td><input name=\"closeam \" value= \" " . $row["heure_fermeture_am"] . "\"</td>";
                  echo "<td> <input name=\"openpm \" value= \" " . $row["heure_ouverture_pm"] . "\"</td>";
                  echo "<td><input  name=\"closepm\" value= \" " . $row["heure_fermeture_pm"] . "\"</td>";
                  echo "<td><select name='statut'>";
                  foreach ($options_statut as $option) {
                    $selected = ($row["statut"] == $option) ? "selected" : "";
                    echo "<option value='$option' $selected>$option</option>";
                  }

                  echo "</tr>";
                }
                echo "
                  </table>";
              } else {
                echo "Aucun résultat trouvé dans la table 'horaires'.";
              }
            }
          }
          if (isset($_SESSION['user'])) {
            if ($role == "Administrateur") {
              echo '<button class="save" type="submit" value="Sauvegarder" name="savehour">Sauvegarder</button>';
            }
          }
          echo '</form>';

          ?>
        </div>

      </div>



  </div>

  </section>
  <section>
    <div class="info-salaries">
      <h3>Information des salariés </h3>

      <?php

      echo '<table border="1">';
      echo '<tr>';
      if (isset($_SESSION['user'])) {
        if ($role == "Administrateur") {
          echo '<th>ID</th>';
        }
      }
      echo '<th>Pseudo</th><th>Email</th><th>Telephone</th><th>role</th>';
      if (isset($_SESSION['user'])) {
        if ($role == "Administrateur") {
          echo '<th>supprimer</th>';
        }
      }
      echo '</tr>';

      while ($infoUser = $users->fetch()) {
        echo '<tr>';
        if (isset($_SESSION['user'])) {
          if ($role == "Administrateur") {
            echo '<th><input class="inputid" readonly type="text" name="id" value="' . $infoUser['id'] . '" /></th>';
          }
        }
        echo '<td>' . $infoUser['pseudo'] . '</td>';
        echo '<td>' . $infoUser['email'] . '</td>';
        echo '<td>' . $infoUser['phone'] . '</td>';
        echo '<td>' . $infoUser['role'] . '</td>';
        if (isset($_SESSION['user'])) {
          if ($role == "Administrateur") {
            echo '<td><input class="delete" type="submit" value="supprimer" name="deleteUser" /></td>';
          }
        }
        echo '</tr>';
      }
      echo '</table>';


      if (isset($_SESSION['user'])) {
        if ($role == "Administrateur") {
      ?>
          <p>Cliquer ici pour créer un compte utilisateur</p>
          <button><a class="createbtn" href="./ressources/views/register.php"> créer les employés</a></button>
      <?php
        }
      }
      ?>
    </div>

    <div class="service">
      <h3> Les Services</h3>


      <div class="row">
        <?php foreach ($service as $serv) : ?>



          <article class="servicecarte">
            <form class="formulaire" action="./ressources/controller/profil-controller.php" method="post">
              <input readonly type="id" name="id" value="<?= $serv['id'] ?>" />
              <h3><input type="text" name="title" value=" <?= $serv['title'] ?> " /></h3>
              <p><textarea rows="10" cols="40" name="description"><?= $serv['description'] ?></textarea>
              <p><textarea rows="10" cols="40" name="detail"><?= $serv['detail'] ?> </textarea>
                <?php
                if (isset($_SESSION['user'])) {
                  if ($role == "Administrateur") {

                    echo '<input class="save" type="submit" value="Sauvegarder" name="savecar" />';
                  }
                }
                ?>

            </form>
          </article>

        <?php endforeach ?>
      </div>
    </div>


  </section>
  <!-- ------------------------------------------- MESSAGE -->
  <section id="messsage">
    <h2>Consulter et traiter les messages </h2>
    <form class="formulaire" action="./ressources/controller/profil-controller.php" method="post">
      <?php
      $table_name = "formulaire";
      $count = getTableObjectCount($bdd, $table_name);
      echo "<p>Le nombre de formulaire à traiter est de : $count</p>";


      echo '<table border="1">';
      echo '<tr>';

      echo '<th>ID</th><th>Prenom</th><th>Nom</th><th>Mail</th><th>Telephone</th><th>Objet</th><th>Ref</th><th>Contenu</th><th>Action</th>';

      echo '</tr>';

      while ($formulaire = $form->fetch()) {
        echo '<tr>';

        echo '<td > <input class="inputid" readonly type="text" name="id" value="' . $formulaire['id'] . '" /></td>';
        echo '<td>' . $formulaire['firstname'] . '</td>';
        echo '<td>' . $formulaire['lastname'] . '</td>';
        echo '<td>' . $formulaire['email'] . '</td>';
        echo '<td>' . $formulaire['phone'] . '</td>';
        echo '<td>' . $formulaire['objet'] . '</td>';
        echo '<td>' . $formulaire['ref'] . '</td>';
        echo '<td class="tdlarge">' . $formulaire['contenu'] . '</td>';
        echo '<td><input class="delete" type="submit" value="supprimer" name="deleteformulaire" /></td>';

        echo '</tr>';
      }
      echo '</table>';



      ?>
    </form>
  </section>
  <!-- -------------------------------------------Catalogue -->
  <section id="catalogue">
    <h2>Les voitures actuellement à la vente</h2>
    <div class="catalogue">
      <?php foreach ($cars as $car) : ?>


        <article>
          <form class="formulaire" action="./ressources/controller/profil-controller.php" method="post">
            <input readonly type="text" name="id" value="<?= $car['id'] ?> " />
            <h3><input type="text" name="marque" value="<?= $car['marque'] ?>" /></h3>
            <p><?php echo '<img class="imagecar" src="' . $car['img_url_1'] . '">'; ?></p>
            <p><input type="text" name="modele" value="<?= $car['modele']; ?>" /></p>
            <p><input type="int" name="km" value="<?= $car['km']; ?>" />km</p>
            <p><input type="int" name="prix" value="<?= $car['prix']; ?>" />€</p>
            <p><textarea rows="10" type="text" name="description" value="<?= $car['description']; ?>"><?= $car['description']; ?></textarea></p>
            <input class="save" type="submit" value="Sauvegarder" name="savecar" />
            <input class="delete" type="submit" value="supprimer" name="deletecar" />

          </form>
        </article>

      <?php endforeach ?>
    </div>

    <div class="row">
      <p>Cliquer ici pour créer un nouvel article</p>
      <button><a class="createbtn" href="./ressources/views/registercar.php"> créer un nouvel article</a></button>
    </div>
  </section>
  <!-- ------------------------------------------- AVIS -->

  <h2>LES AVIS EN ATTENTE DE VALIDATION</h2>
  <section id="avis">
    <form class="formulaire" action="./ressources/controller/profil-controller.php" method="post">
      <?php

      $compteur = 0;
      while ($avres = $avis->fetch()) {
        $compteur++;
        echo '<div class="carte"><div class="avis"><h3><span name="id">' . $avres['id'] . "</span>. " . $avres['pseudo'] . '</h3>
        <p> note: ' . $avres['note'] . '</p><p>' . $avres['avis'] . '</p></div><div class="btnavis">
        <button class="empty" type="submit" name="publie" value="Publier">Publier</button>
        <button class="empty"><input class="delete" type="submit" value="supprimer" name="deleteavis" /></button></div></div>';
      }

      echo '<p class="position1">Nombre d\'avis dans la table ' . $countavis . ' dont ' . $compteur . ' en attente de traitement</p>';
      ?>
    </form>
  </section>

  </div>


  <div class="footer">
    <p>Au Garage V PARROT</p>
    <p> &copy; 2023 A.Cimmino</p>
  </div>
  <script src="./ressources/js/btnscrollup.js"></script>
</body>


</html>