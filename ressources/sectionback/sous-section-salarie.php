<div class="info-salaries">
    <h3>Information des salariés </h3>

    <?php
    echo '<div class="table-responsive-sm">';
    echo '<table class="table table-bordered table-sm">';
    echo '<thead class="thead-dark">';
    echo '<tr>';

    if (isset($_SESSION['user']) && $role == "Administrateur") {
        echo '<th style="width: 5%;">ID</th>';
    }

    echo '<th>Pseudo</th><th>Email</th><th>Telephone</th><th>Rôle</th>';

    if (isset($_SESSION['user']) && $role == "Administrateur") {
        echo '<th style="width: 10%;">Supprimer</th>';
    }

    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($infoUser = $users->fetch()) {
        echo '<tr>';

        if (isset($_SESSION['user']) && $role == "Administrateur") {
            echo '<th><input class="form-control inputid" readonly type="text" name="id" value="' . $infoUser['id'] . '" /></th>';
        }

        echo '<td>' . $infoUser['pseudo'] . '</td>';
        echo '<td>' . $infoUser['email'] . '</td>';
        echo '<td>' . $infoUser['phone'] . '</td>';
        echo '<td>' . $infoUser['role'] . '</td>';

        if (isset($_SESSION['user']) && $role == "Administrateur") {
            echo '<td><input class="btn btn-danger delete" type="submit" value="Supprimer" name="deleteUser" /></td>';
        }

        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';

    if (isset($_SESSION['user']) && $role == "Administrateur") {
    ?>
        <p>Cliquer ici pour créer un compte utilisateur</p>
        <a class="btn btn-primary createbtn" href="./ressources/views/register.php">Créer les employés</a>
    <?php
    }
    ?>
</div>