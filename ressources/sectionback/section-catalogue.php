<h3 class="text-center">Votre parc automobile</h3>

<div class="catalogue row">
    <?php foreach ($cars as $car) : ?>
        <div class="col-md-4 mb-3">
            <div class="card">
                <form class="formulaire card-body" action="./ressources/controller/profil-controller.php" method="post">
                    <input readonly type="text" name="id" value="<?= $car['id'] ?> " />
                    <h4><input class="form-control" type="text" name="marque" value="<?= $car['marque'] ?>" /></h4>
                    <p><?php echo '<img class="card-img-top" src="' . $car['img_url_1'] . '" alt="Car Image">'; ?></p>
                    <p><input class="form-control" type="text" name="modele" value="<?= $car['modele']; ?>" /></p>
                    <p><input class="form-control" type="number" name="km" value="<?= $car['km']; ?>" />km</p>
                    <p><input class="form-control" type="number" name="prix" value="<?= $car['prix']; ?>" />€</p>
                    <p><textarea class="form-control" rows="3" type="text" name="description"><?= $car['description']; ?></textarea></p>
                    <button class="btn btn-primary" type="submit" name="savecar">Sauvegarder</button>
                    <button class="btn btn-danger" type="submit" name="deletecar">Supprimer</button>
                </form>
            </div>
        </div>
    <?php endforeach ?>
</div>