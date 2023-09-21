<?php
$horaireContent = '<ul>';
while ($res = $time->fetch_assoc()) {
    $jour = $res['jour'];
    $heure_ouverture_am = date("H:i", strtotime($res['heure_ouverture_am']));
    $heure_fermeture_am = date("H:i", strtotime($res['heure_fermeture_am']));
    $heure_ouverture_pm = date("H:i", strtotime($res['heure_ouverture_pm']));
    $heure_fermeture_pm = date("H:i", strtotime($res['heure_fermeture_pm']));

    // Vérifie si c'est dimanche et que les horaires sont à 00:00
    if ($jour === 'Dimanche' && $res['statut'] === 'Fermé') {
        $horaireContent .= '<li>' . $jour . ' : ' . $res['statut'] . '</li>';
    } else {
        $horaireContent .= '<li>' . $jour . ' : ';
        if ($res['statut'] === 'Fermé') {
            $horaireContent .= $res['statut'];
        } else {
            $horaireContent .= $heure_ouverture_am . ' - ' . $heure_fermeture_am . ' / ' . $heure_ouverture_pm . ' - ' . $heure_fermeture_pm;
        }
        $horaireContent .= '</li>';
    }
}

$horaireContent .= '</ul>';
