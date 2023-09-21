<?php

function getAvis(PDO $bdd, int $limit = null): array
{
    $notes = 'SELECT * FROM avis WHERE statut = "Publié" ORDER BY id DESC';
    if ($limit) {
        $notes .= "LIMIT :limit";
    }
    $avis = $bdd->prepare($notes);
    if ($limit) {
        $avis->bindValue(":limit", $limit, PDO::PARAM_INT);
    }
    $avis->execute();
    $avisPublie = $avis->fetchAll(PDO::FETCH_ASSOC);

    return $avisPublie;
}

// $avispublié = getAvis($bdd, _HOME_AVIS_LIMIT_);

function getArticleById(PDO $bdd, int $id): array|bool
{
    $sql = 'SELECT * FROM voitures WHERE id= :id';
    $query = $bdd->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $article = $query->fetch(PDO::FETCH_ASSOC);

    return $article;
}

function getHoraires(PDO $bdd)
{

    // Second SQL Query
    $sqlhour = "SELECT id, jour, 
                    SUBSTRING(heure_ouverture_am, 1, 5) AS heure_ouverture_am,
                    SUBSTRING(heure_fermeture_am, 1, 5) AS heure_fermeture_am,
                    SUBSTRING(heure_ouverture_pm, 1, 5) AS heure_ouverture_pm,
                    SUBSTRING(heure_fermeture_pm, 1, 5) AS heure_fermeture_pm,
                    statut
                    FROM horaires";
    $result = $bdd->query($sqlhour);

    return $result->fetch(PDO::FETCH_ASSOC);
}
