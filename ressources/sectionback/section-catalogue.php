<h3 class="text-center">Votre parc automobile</h3>
<?php
$table_name = "voitures";
$count = getTableObjectCount($bdd, $table_name);
echo "<p class=\"font-weight-bold\">Le nombre de véhicule à la vente est de : $count </p>";
?>
<div class="catalogue row">
    <?php foreach ($cars as $car) : ?>
        <details class="col-md-4 mb-3">
            <summary>
                <h4><?= $car['marque'] ?></h4>
                <h5><?= $car['modele'] ?></h5>
                <img class="card-img-top" name="img_url_1" src="<?= $car['img_url_1'] ?>" alt="Car Image 1">
            </summary>
            <div class="card">
                <form class="formulaire card-body" action="./ressources/controller/profil-controller.php" method="post">
                    <input readonly type="text" name="id" value="<?= $car['id'] ?> " />
                    <h4><input class="form-control" type="text" name="marque" value="<?= $car['marque'] ?>" /></h4>
                    <p>
                        <img class="card-img-top" name="img_url_1" src="<?= $car['img_url_1'] ?>" alt="Car Image 1">
                        <input class="form-control" type="text" name="img_url_1" value="<?= $car['img_url_1'] ?>" />
                    </p>
                    <!--autres informations-->
                    <p>
                        <img class="img-fluid img-thumbnail " src="<?= $car['img_url_2'] ?>" alt="Car Image 2">
                        <input class="form-control" type="text" name="img_url_2" value="<?= $car['img_url_2'] ?>" />
                    </p>
                    <p>
                        <img class=" img-fluid img-thumbnail" src="<?= $car['img_url_3'] ?>" alt="Car Image 3">
                        <input class="form-control" type="text" name="img_url_3" value="<?= $car['img_url_3'] ?>" />
                    </p>
                    <p>
                        <img class="img-fluid img-thumbnail " src="<?= $car['img_url_4'] ?>" alt="Car Image 4">
                        <input class="form-control" type="text" name="img_url_4" value="<?= $car['img_url_4'] ?>" />
                    </p>
                    <p><input class="form-control" type="text" name="modele" value="<?= $car['modele']; ?>" /></p>

                    <div>
                        <input class="form-control" type="number" name="km" value="<?= $car['km']; ?>" />
                        <p> km</p>
                    </div>
                    <p><input class="form-control" type="number" name="prix" value="<?= $car['prix']; ?>" />€</p>
                    <p><input class="form-control" type="date" name="année" value="<?= $car['mise_en_circulation']; ?>" />date</p>
                    <p><input class="form-control" type="text" name="energie" value="<?= $car['carburant']; ?>" />energie</p>
                    <p><input class="form-control" type="text" name="boite" value="<?= $car['boite']; ?>" />boite</p>


                    <p><textarea class="form-control" rows="3" type="text" name="description"><?= $car['description']; ?></textarea></p>
                    <button class="btn btn-primary" type="submit" name="savecar">Sauvegarder</button>
                    <button class="btn btn-danger" type="submit" name="deletecar">Supprimer</button>
                </form>
            </div>
        </details>
    <?php endforeach ?>
</div>