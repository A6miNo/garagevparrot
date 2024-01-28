<form class="formulaire" action="./ressources/controller/profil-controller.php" method="post">
    <?php
    $table_name = "formulaire";
    $column = "etat";
    $value = "A TRAITER";

    $count = getTableObjectCount($bdd, $table_name, $column, $value);
    echo "<p>Le nombre de formulaires à traiter est de : $count </p>";

    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered table-sm">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th>ID</th><th>civilité</th><th>Prenom</th><th>Nom</th><th>Mail</th><th>Téléphone</th><th>Objet</th><th>Ref</th><th>Contenu</th><th>Action</th>';


    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';



    // Utiliser foreach pour parcourir le tableau
    foreach ($formRows as $formulaire) {
        // Ajouter une condition pour afficher uniquement les formulaires avec l'état "A TRAITER"
        if ($formulaire['etat'] == 'A TRAITER') {
            echo '<tr>';
            echo '<td><input class="form-control inputid" readonly type="text" name="id" value="' . $formulaire['id'] . '" /></td>';
            echo '<td>' . $formulaire['genre'] . '</td>';
            echo '<td>' . $formulaire['firstname'] . '</td>';
            echo '<td>' . $formulaire['lastname'] . '</td>';
            echo '<td>' . $formulaire['email'] . '</td>';
            echo '<td>' . $formulaire['phone'] . '</td>';
            echo '<td>' . $formulaire['objet'] . '</td>';

            echo '<td>' . $formulaire['ref'] . '</td>';
            echo '<td class="tdlarge">' . $formulaire['contenu'] . '</td>';
            echo '<td><input class="btn btn-warning delete" type="submit" value="A ARCHIVE" name="archiveformulaire" /></td>';

            echo '</tr>';
        }
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';

    echo '<p> Les messages traités et archivés:</p>';


    // Vérifier s'il y a des résultats
    if (count($rowsArchive) > 0) {
        // Affichage de l'en-tête du tableau
        echo '<table border="1">
            <tr>
                <th>ID</th>
                <th>Genre</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Objet</th>
                <th>Référence</th>
                <th>Contenu</th>
                <th>État</th>
                
                <th>Suppression définitive</th>
            </tr>';

        // Affichage des lignes du tableau
        foreach ($rowsArchive as $archiveRow) {
            echo '<tr>
        <td>' . $archiveRow['id'] . '</td>
        <td>' . $archiveRow['genre'] . '</td>
        <td>' . $archiveRow['firstname'] . '</td>
        <td>' . $archiveRow['lastname'] . '</td>
        <td>' . $archiveRow['email'] . '</td>
        <td>' . $archiveRow['phone'] . '</td>
        <td>' . $archiveRow['objet'] . '</td>
        <td>' . $archiveRow['ref'] . '</td>
        <td>' . $archiveRow['contenu'] . '</td>
        <td>' . $archiveRow['etat'] . '</td>
        
        <td><input class="btn btn-danger delete" type="submit" value="Supprimer" name="deleteformulaireAdmin" /></td> 
    </tr>';
        }

        // Fin du tableau
        echo '</table>';
    } else {
        // Aucun résultat trouvé
        echo 'Aucun résultat à afficher.';
    }


    ?>


</form>
<br>