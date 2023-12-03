<div class="service">
    <h3> Les Services</h3>

    <div class="row">
        <?php foreach ($service as $serv) : ?>
            <div class="col-md-4">
                <article class="servicecarte">
                    <form class="formulaire" action="./ressources/controller/profil-controller.php" method="post">
                        <input readonly type="id" name="id" value="<?= $serv['id'] ?>" />
                        <input type="text" name="title" value="<?= $serv['title'] ?>" />
                        <p><textarea rows="10" cols="40" name="description"><?= $serv['description'] ?></textarea></p>
                        <p><textarea rows="10" cols="40" name="detail"><?= $serv['detail'] ?> </textarea></p>
                        <?php
                        if (isset($_SESSION['user']) && $role == "Administrateur") {
                            echo '<input class="save btn btn-primary" type="submit" value="Sauvegarder" name="savecar" />';
                        }
                        ?>
                    </form>
                </article>
            </div>
        <?php endforeach ?>
    </div>
</div>