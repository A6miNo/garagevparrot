<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/ressources/img/logo.png" />
    <link rel="stylesheet" href="../css/register.css">
    <title>Créer un compte</title>
</head>

<body>

    <a href="/profil.php">
        <button class="BtnRetour"> Retourner à la page précedente</button>
    </a>

    <div class="center">
        <h1>Créer un nouveau collaborateur</h1>
        <form action="../controller/register-controller.php" method="post" enctype="multipart/form-data">

            <div class="grp1">
                <div class="txt_field">
                    <input type="text" required name="marque">
                    <span></span>
                    <label>Marque</label>
                </div>
                <div class="txt_field">
                    <input type="text" required name="modele">
                    <span></span>
                    <label>Modèle</label>

                </div>
                <div class="grp">
                    <div class="txt_field">
                        <input type="text" required name="carburant">
                        <span></span>
                        <label>Carburant</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" required name="boite">
                        <span></span>
                        <label>Boite</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" required name="mise_en_circulation">
                        <span></span>
                        <label>Année de mise en circulation</label>
                    </div>

                </div>
                <div class="grp">
                    <div class="txt_field">
                        <input type="number" maxlength="10" required name="prix">
                        <span></span>
                        <label>Prix</label>
                    </div>
                    <div class="txt_field">
                        <input type="number" maxlength="10" required name="km">
                        <span></span>
                        <label>Kilometres</label>
                    </div>
                </div>

            </div>

            <div class="grp2">
                <div class="txt_field">
                    <input type="text" required name="description">
                    <span></span>
                    <label>Description</label>
                </div>
                <div class="grp">
                    <div class="txt_field">
                        <input type="url" name="img_url_1">
                        <span></span>
                        <label>Image 1</label>
                    </div>
                    <div class="txt_field">
                        <input type="url" name="img_url_2">
                        <span></span>
                        <label>Image 2</label>
                    </div>
                    <div class="txt_field">
                        <input type="url" name="img_url_3">
                        <span></span>
                        <label>Image 3</label>
                    </div>
                    <div class="txt_field">
                        <input type="url" name="img_url_4">
                        <span></span>
                        <label>Image 4</label>
                    </div>
                </div>
            </div>





            <input type="submit" value="Créer" name="createCar">
            <div class="signup_link">
            </div>
        </form>
    </div>
</body>

</html>