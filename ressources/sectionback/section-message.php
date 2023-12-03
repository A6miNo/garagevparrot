<form class="formulaire" action="./ressources/controller/profil-controller.php" method="post">
    <?php
    $table_name = "formulaire";
    $count = getTableObjectCount($bdd, $table_name);
    echo "<p>Le nombre de formulaires à traiter est de : $count </p>";

    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered table-sm">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th>ID</th><th>Prenom</th><th>Nom</th><th>Mail</th><th>Téléphone</th><th>Objet</th><th>Ref</th><th>Contenu</th><th>Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($formulaire = $form->fetch()) {
        echo '<tr>';
        echo '<td><input class="form-control inputid" readonly type="text" name="id" value="' . $formulaire['id'] . '" /></td>';
        echo '<td>' . $formulaire['firstname'] . '</td>';
        echo '<td>' . $formulaire['lastname'] . '</td>';
        echo '<td>' . $formulaire['email'] . '</td>';
        echo '<td>' . $formulaire['phone'] . '</td>';
        echo '<td>' . $formulaire['objet'] . '</td>';
        echo '<td>' . $formulaire['ref'] . '</td>';
        echo '<td class="tdlarge">' . $formulaire['contenu'] . '</td>';
        echo '<td><input class="btn btn-danger delete" type="submit" value="Supprimer" name="deleteformulaire" /></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    ?>
</form>