# garagevparrot
Garage V.PARROT
I -- Installation de l'application en local:
Cette application n'est actuellement pas déployée sur internet. Pour l'ouvrir il vous faut en prérequis installer un serveur web local sur votre ordinateur. WAMP pour les systemes d'exploitation Windows.

1- cloner ce dossier sur votre ordinateur
Copiez l'url : https://github.com/A6miNo/garagevparrot.git Dans votre terminal de commande entre git clone suivi de l'url ci dessus.

2-acceder au visuel web 
une fois installé, allez dans vos dossier pour récuperer le serveur web. un chemin courant est: C:\wamp64\www.
Dans le dossier "www" copier le dossier cloner precedemment. à l'ouverture de phpMyAdmin l'utilisateur est "root" et il n'ya pas de mot de passe. Ces informations sont accessibles dans le fichier configbdd.php
nom du virtual Host: garagevparrot
chemin: C:\wamp64\www\garagevparrot
PHP: 7.4.33

II -- Utilisation
1- Se connecter
garage_v_parrot.sql contient la base de données
Les utilisateurs se connectent en utilisant leur adresse e-mail et un mot de passe sécurisé.

L'administrateur dispose d'un compte préalablement créé : email : vparrot@gmail.com mot de passe : 123456
Vous pouvez également vous connecter en tant qu'employé : email : parfait-employe@example.com mot de passe : 03011906charbon

Note: les images devront etres stockées sur un hebergeur comme  https://www.noelshack.com/ 

2- Les droits
Les employées peuvent consulter les messages, modérer les avis et modifier la liste de vehicule.
L'admnistrateur est le seul à avoir des droits étendus. En plus des droits de l'utilisateur employé, l'administrateur peut modifier la liste des employés, les informations générales de la société ainsi que modifier la section "services". 

3- Les services
Les services de réparation automobile proposés par le garage sont affichés sur la page d'accueil et dans une page 'garage'.

4- Catalogue de vente de voitures d'occasion
Le site web présente les voitures d'occasion disponibles à la vente avec des photos, des informations techniques et le prix. Chaque voiture affiche son prix, une image mise en avant, l'année de mise en circulation et le kilométrage.

La page catalogue propose aux visiteurs d'effectuer une recherche détaillée par l'utilisation de differents filtres: fourchette de prix, kilometrique et année de mise en circualtion. tri par prix croissant et décroissant. filtre selon la boite de vitesse, le carburant la marque et le modele.

5- Contacter le garage
Les visiteurs peuvent contacter le garage par téléphone  ou en utilisant un formulaire de contact en ligne. Le sujet du formulaire est automatiquement ajusté en fonction du titre de l'annonce.

6- Recueillir les témoignages des clients
Les visiteurs peuvent laisser des témoignages composés d'un nom, d'un commentaire et d'une note. Les témoignages sont modérés par un employé du garage et s'affichent sur la page d'accueil. Les employés du garage peuvent ajouter ou rejeter des témoignages clients directement depuis leur espace dédié.
