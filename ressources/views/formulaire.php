<?php

$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
//Connection à la bdd
require_once 'C:\wamp64\www\garagevparrot\configbdd.php';

?>

<?php
$service = $bdd->query('SELECT * FROM services');
$product = $bdd->query('SELECT * FROM voitures');



?>
<div class="form-demande">
    <h1> Nous Contacter </h1>
    <form method="post" id="id-form" action="/ressources/controller/formulaire-controller.php">
        <fieldset class="flux" form="id-form">

            <p class="row ">
                <input type="radio" id="mister" name="civil" value="monsieur">
                <label for="mister">M.</label>
                <input type="radio" id="madam" name="civil" value="madame">
                <label for="madam">MME</label>
            </p>
            <div class="row">
                <p><label for="user-name">Votre Nom</label>
                    <input name="user-name" id="user-name" placeholder="Votre Nom ici" type="text">
                </p>
                <p><label for="firstname">Votre Prénom</label>
                    <input name="firstname" id="firstname" placeholder="Votre prénom ici" type="text">
                </p>
            </div>
            <div class="row">
                <p><label for="email">Votre e-mail </label>
                    <input type="email" name="email" id="email" placeholder="ex:anne-onyme@gmail.com" required="">
                </p>
                <p><label for="phone">Votre numero de téléphone </label>
                    <input type="tel" name="phone" id="phone" placeholder="ex:0612345678" required="" minlength="10" maxlength="10">
                </p>
            </div>

            <p><label for="object-select"> Objet de votre message:</label>
                <select name="object" id="object-select" onchange="afficher(this)" required="">
                    <option value=""> <span class="light">Merci de choisir le motif de votre demande</span></option>

                    <?php
                    if ($_SERVER['PHP_SELF'] == '/fiche.php') {
                        echo '<option value="3">VENTE DE VÉHICULES D\'OCCASION</option>';
                    } else {
                        while ($result = $service->fetch()) {
                            echo '<option value="' . $result['id'] . '">' . $result['title'] . '</option>';
                        }
                    }
                    ?>
                </select>

            <div id="refDiv">
                <select id="ref">
                    <?php
                    if ($_SERVER['PHP_SELF'] !== '/fiche.php') {
                        echo '<option value=""> <span class="light">Merci de préciser la réference</span></option>';
                    }
                    if ($_SERVER['PHP_SELF'] == '/fiche.php') {
                        echo '<option>' . htmlentities($article['id']) . 'XXX' . htmlentities($article['modele']) . '</option>';
                    } else {
                        while ($cars = $product->fetch()) {
                            echo '<option>' . $cars['id'] . 'XXX' . $cars['modele'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            </p>
            <textarea name="object" placeholder="Bonjour, je souhaite..."></textarea>

            <div class="row cgu">
                <label class="form-check-label" for="conditions" required="">
                    <a href="../views/cgu.html">J'accepte les conditions</a>
                </label>
                <input type="checkbox" class="form-check-input" id="conditions" name="conditions" required="">
            </div>

            <div class="invalid-feedback">
                <!-- echo-->
            </div>
        </fieldset>

        <fieldset class="flux">
            <div class="capchat">
                <p>recopier ce code:<span id="random"></span></p>
                <input type="text" id="input" placeholder="ici le code de verification" />
            </div>
            <button id="submit">Envoyer</button>
        </fieldset>



    </form>
</div>