<?php
// Inclure le fichier de configuration de la base de données
require_once('C:\wamp64\www\garagevparrot\configbdd.php');

// Récupérer l'ID de l'employé à partir de la requête GET
$employeeId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Requête SQL pour obtenir les détails de l'employé
$getEmployee = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
$getEmployee->execute([$employeeId]);
$employeeDetails = $getEmployee->fetch(PDO::FETCH_ASSOC);

// Vérifier si l'employé existe
if (!$employeeDetails) {
    echo 'L\'employé n\'existe pas.';
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/ressources/img/logo.png" />
    <link rel="stylesheet" href="../css/register.css">
    <title>Mise a jour d'un compte</title>
</head>

<body>
    <a href="/profil.php">
        <button class="BtnRetour"> Retourner à la page précedente</button>
    </a>
    <h1>Modifier les informations de l'employé</h1>
    <form action="../controller/profil-controller.php" method="post">
        <input type="hidden" name="employeeId" value="<?php echo $employeeDetails['id']; ?>">

        <label for="newName">Nouveau nom :</label>
        <input type="text" name="newName" value="<?php echo $employeeDetails['pseudo']; ?>" required>


        <label for="newEmail">Nouvel email :</label>
        <input type="email" name="newEmail" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" value="<?php echo $employeeDetails['email']; ?>" required>

        <label for="newTelephone">Nouveau téléphone :</label>
        <input type="tel" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" maxlength="10" name="newTelephone" value="<?php echo $employeeDetails['phone']; ?>" required>


        <input class="btn btn-primary d-inline-block" type="submit" value="Sauvegarder" name="updateUser">
    </form>

</body>

</html>