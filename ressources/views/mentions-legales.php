<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style-AC.css">
    <link rel="stylesheet" type="text/css" href="../css/cgu-style.css">
    <title>Mentions legales</title>
</head>

<body>
    <div class="bloc">
        <section>
            <div class="container column">
                <div class="column">
                    <h1>Mentions légales</h1>
                </div>
            </div>
        </section>

        <section>
            <div class="container column">
                <div class="column">
                    <h2>Informations générales</h2>
                    <p>Nom de l'entreprise : <?= $infos['name'] ?></p>
                    <p>Adresse : <br>
                        <?= $infos['adresse'] ?>
                    </p>
                    <p>Téléphone : <?= $infos['phone'] ?></p>
                    <p>Email : <?= $infos['email'] ?></p>
                    <p>Responsable de la publication : <?= $salaries['role == Administrateur']['pseudo']; ?></p>
                    <p>Nom de l'hébergeur : WAMP</p>
                </div>
            </div>
        </section>

        <section>
            <div class="container column">
                <div class="column">
                    <h2>Propriété intellectuelle</h2>
                    <p>Tous les contenus présents sur ce site sont protégés par le droit d'auteur. Toute reproduction, même partielle, est interdite sans autorisation préalable.</p>
                </div>
            </div>
        </section>
        <section>
            <div class="container column">
                <div class="column">
                    <h2>Liens externes</h2>
                    <p>Ce site peut contenir des liens vers des sites externes. Nous ne sommes pas responsables du contenu de ces sites.</p>
                </div>
            </div>
        </section>
        <section>
            <div class="container column">
                <div class="column">

                    <h2>Collecte des données personnelles</h2>
                    <p>Nous collectons des données personnelles uniquement dans le cadre de la fourniture de nos services. Les données collectées ne seront pas transmises à des tiers sans votre consentement.</p>
                </div>
            </div>
        </section>
        <section>
            <div class="container column">
                <div class="column">
                    <h2>Cookies</h2>
                    <p>Ce site utilise des cookies pour améliorer l'expérience utilisateur. En utilisant ce site, vous acceptez l'utilisation de cookies.</p>
                </div>
            </div>
        </section>
        <section>
            <div class="container column">
                <div class="column">
                    <h2>Modification des mentions légales</h2>
                    <p>Nous nous réservons le droit de modifier les présentes mentions légales à tout moment, veuillez consulter cette page régulièrement.</p>
                </div>
            </div>
        </section>

    </div>


</body>

</html>