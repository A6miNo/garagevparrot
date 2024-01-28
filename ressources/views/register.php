<!--FORMULAIRE DE CREATION EMPLOYE-->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../asset/image/icone-removebg-preview.png" />
    <link rel="stylesheet" href="../css/register.css">
    <title>Créer un compte</title>
</head>

<body>

    <a href="/profil.php">
        <button class="BtnRetour"> Retourner à la page précedente</button>
    </a>

    <div class="center">
        <h1>Créer un nouveau collaborateur</h1>
        <form action="../controller/registerUser-controller.php" method="post" enctype="multipart/form-data">

            <input type="radio" name="role" value="Administrateur">
            <label for="admin">Administrateur</label>
            <input type="radio" name="role" value="Employe">
            <label for="employé">Employe</label>


            <div class="txt_field">
                <input type="text" required name="name">
                <span></span>
                <label>Pseudo</label>
            </div>
            <div class="txt_field">
                <input type="text" required name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" required name="password">
                <span></span>
                <label>Mot de passe</label>
            </div>
            <div class="txt_field">
                <input type="tel" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" maxlength="10" required name="tel">
                <span></span>
                <label>Numéro de téléphone</label>
            </div>

            <input type="submit" value="Créer" name="createUser">
            <div class="signup_link">
            </div>
        </form>
    </div>
</body>

</html>