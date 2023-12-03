    <?php
    while ($avres = $notes->fetch()) {

        echo '<div class="avis-content"><h5>' . $avres['id'] . ". " . $avres['pseudo'] . '</h5>
        <p>' . $avres['avis'] . '</p>';

        // Afficher les étoiles en fonction de la note
        $note = htmlentities($avres['note']);
        echo '<div class="rating">';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $note) {
                echo '<span class="yellowStars">★</span>';
            } else {
                echo '<span class="empty">★</span>'; // Étoiles vides pour les notes inférieures
            }
        }
        echo '</div>';

        echo '</div>';
    }

    ?>
  