<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Donner du SEO-->
    <meta name="keywords" content="Garage, automobile, reparation, panne, depannage, entretien, Toulouse, Sud-Ouest, Haute-Garonne">
    <meta name="descritption" content="formulaire avis">
    <link rel="shortcut icon" type="image/x-icon" href="../ressources/asset/lib/icone-removebg-preview.png">
    <title>Donnez votre Avis</title>
    <!--Liaison avec fichier style-->




    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/style-AC.css">
    <link rel="stylesheet" href="../css/form.css">


    <script src="https://kit.fontawesome.com/609ebaf712.js" crossorigin="anonymous"></script>

    <?php
    //Session utilisateurs
    session_start();
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
    //Connection à la bdd
    require_once 'C:\wamp64\www\garagevparrot\configbdd.php';

    // Vérifier si le formulaire a été soumis
    if (isset($_POST['save'])) {
        // Traitement du formulaire ici (insertion en base de données, etc.)

        // Stocker le message de remerciement dans une variable de session
        $_SESSION['message'] = "Merci pour votre contribution!";

        // Rediriger l'utilisateur vers une autre page ou recharger la page pour éviter le renvoi du formulaire par actualisation
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    ?>
</head>

<body>
    <h1>Votre Avis nous interesse</h1>
    <form class="formulaire" action="/ressources/controller/form-avis-controller.php" method="post">
        <label>Votre nom</label>
        <input type="text" name="name" />
        <label>Votre note de 1 à 5</label>
        <select name="note" required="">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <textarea name="avis" rows="5" cols="20" placeholder="Votre commentaire ici."></textarea>
        <div class="cgu">
            <label class="form-check-label" for="conditions"><a href="cgu.html">J'accepte les conditions</a></label>
            <input type="checkbox" class="form-check-input" id="conditions" name="conditions" required="">
        </div>
        <div class="invalid-feedback">
            Merci de lire les conditions avant de valider le formulaire.
        </div>


        <input class="save" type='submit' value='Envoyer' name='save' />
    </form>
</body>

</html>