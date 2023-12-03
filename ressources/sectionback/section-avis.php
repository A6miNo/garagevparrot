<form class="formulaire" action="./ressources/controller/profil-controller.php" method="post">
    <div class="row">
        <?php
        $compteur = 0;
        while ($avres = $avis->fetch()) {
            $compteur++;
            echo '<div class="col-md-6 mb-3">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h3 class="card-title"><span name="id">' . $avres['id'] . "</span>. " . $avres['pseudo'] . '</h3>';
            echo '<p class="card-text">Note: ' . $avres['note'] . '</p>';
            echo '<p class="card-text">' . $avres['avis'] . '</p>';
            echo '<div class="btnavis d-flex justify-content-between">';
            echo '<button class="btn btn-success mr-2" type="submit" name="publie" value="' . $avres['id'] . '">Publier</button>';
            echo '<button class="btn btn-danger" type="submit" name="deleteavis" value="' . $avres['id'] . '">Supprimer</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <p class="text-center">Nombre d'avis dans la table <?php echo $countavis; ?> dont <?php echo $compteur; ?> en attente de traitement</p>
</form>