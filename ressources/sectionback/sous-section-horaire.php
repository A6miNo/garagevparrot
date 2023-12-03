<div>
    <h3>Les horaires</h3>
    <?php

    echo $horaireContent;

    $options_statut = array("Ouvert", "Fermé");

    if (isset($_SESSION['user']) && $role == "Administrateur") {
        echo '<div class="adm-gestion">';
        echo '<p><strong> Modifier les horaires</strong></p>';
        echo '<form class="formulaire horaires" action="./controller/profil-controller.php" method="post">';

        if ($result->num_rows > 0) {
            echo '<div class="col-12">';
            echo '<table class="table table-bordered">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Jour</th>';
            echo '<th>Heure d\'ouverture AM</th>';
            echo '<th>Heure de fermeture AM</th>';
            echo '<th>Heure d\'ouverture PM</th>';
            echo '<th>Heure de fermeture PM</th>';
            echo '<th>Statut</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td><input class="form-control" name="openam" value="' . $row["id"] . '"</td>';
                echo '<td>' . $row["jour"] . '</td>';
                echo '<td><input class="form-control" name="openam" value="' . $row["heure_ouverture_am"] . '"</td>';
                echo '<td><input class="form-control" name="closeam" value="' . $row["heure_fermeture_am"] . '"</td>';
                echo '<td><input class="form-control" name="openpm" value="' . $row["heure_ouverture_pm"] . '"</td>';
                echo '<td><input class="form-control" name="closepm" value="' . $row["heure_fermeture_pm"] . '"</td>';
                echo '<td>';
                echo '<select class="form-control" name="statut">';
                foreach ($options_statut as $option) {
                    $selected = ($row["statut"] == $option) ? "selected" : "";
                    echo '<option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
                }
                echo '</select>';
                echo '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo "Aucun résultat trouvé dans la table 'horaires'.";
        }

        echo '<button class="btn btn-primary" type="submit" value="Sauvegarder" name="savehour">Sauvegarder</button>';
        echo '</form>';
        echo '</div>';
    }
    ?>
</div>