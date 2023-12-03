<div class="row">
    <div class="col-md-6">
        <div class="info">
            <h3>Information de la société </h3>
            <!-- Affiche les informations de la société pour tous les utilisateurs (admin et employés) -->
            <?php
            foreach ($infos as $info) {
                echo '<pre>';
                print_r($info);
                echo '</pre>';
            }
            ?>
        </div>
    </div>
    <div class="col-md-6">
        <?php
        if (isset($_SESSION['user'])) {
            if ($role == "Administrateur") {
                echo '<div class="adm-gestion">';
                echo '<p><strong> Modifier les informations</strong></p>'
        ?>
                <form class="formulaire" action="./ressources/controller/profil-controller.php" method="post">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $infos['name'] ?>" />
                    </div>
                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" minlength="10" maxlength="10" value="<?= $infos['phone'] ?>" />
                    </div>
                    <div class="form-group">
                        <label for="mailing">Email</label>
                        <input type="text" class="form-control" id="mailing" name="mailing" value="<?= $infos['mailing'] ?>" />
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" value="<?= $infos['adresse'] ?>" />
                    </div>
                    <div class="form-group">
                        <label for="siret">Siret</label>
                        <input type="text" class="form-control" id="siret" name="siret" maxlength="14" value="<?= $infos['siret'] ?>" />
                    </div>
                    <?php
                    if (isset($_SESSION['user']) && $role == "Administrateur") {
                        echo '<input class="save" type="submit" value="Sauvegarder" name="savesociete" />';
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