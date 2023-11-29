-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 21 sep. 2023 à 17:17
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecfgarage`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int NOT NULL AUTO_INCREMENT,
  `annonce` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `annonce`) VALUES
(1, 'Tous les membres de l\'atelier avec le XV de France!');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `note` float NOT NULL,
  `avis` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `statut` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'A valider',
  PRIMARY KEY (`id`),
  KEY `type` (`statut`),
  KEY `avis_statut` (`statut`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `pseudo`, `note`, `avis`, `statut`) VALUES
(1, 'Anne Onyme', 5, 'Un Super Garage! une équipe à l\'écoute et des solutions trouvées pour ma panne', 'Publié'),
(2, 'Jonh doe', 4, 'Le choix des véhicules d\'occasion est assez restreint mais M. Parrot à su me proposer un véhicule qui correspond à mon budget et besoin', 'Publié'),
(3, 'Jamy contan', 3, 'je suis assez déçu ...même si l\'équipe est sympa je n\'avais pas de thé mais que du café en attendant l\'entretien de ma voiture', 'Publié'),
(4, 'Jean Petit', 3, 'Une experience belle pour ma voiture dur pour mon portefeuille', 'Publié'),
(5, 'Hater', 1, 'BOUH TROP NUL!', 'A valider'),
(7, '', 1, '', 'A valider'),
(8, 'test', 1, 'bof', 'A valider');

-- --------------------------------------------------------

--
-- Structure de la table `formulaire`
--

DROP TABLE IF EXISTS `formulaire`;
CREATE TABLE IF NOT EXISTS `formulaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `objet` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `ref` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `contenu` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formulaire`
--

INSERT INTO `formulaire` (`id`, `firstname`, `lastname`, `email`, `phone`, `objet`, `ref`, `contenu`) VALUES
(1, 'Jean', 'vidal', 'jean.vidal@example.com', '0641603749', '1', '', 'J\'ai eu un accrochage . ma portiere gauche est enfoncée. je souhaite un rendez vous'),
(2, 'Jean', 'Marc', 'jean.marc@example.com', '0102365478', '2', '', 'Bonjour, j\'ai un Dacia Duster et les voyants moteurs sont rouge par intermittences. Je souhaite prendre rendez vous.'),
(3, 'Marie', 'Denise', 'md@example.com', '0302050604', '3', '', 'Bonjour, j\'aimerais voir votre clio 2');

-- --------------------------------------------------------

--
-- Structure de la table `horaires`
--

DROP TABLE IF EXISTS `horaires`;
CREATE TABLE IF NOT EXISTS `horaires` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jour` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `heure_ouverture_am` time(2) DEFAULT NULL,
  `heure_fermeture_am` time(2) NOT NULL,
  `heure_ouverture_pm` time(2) NOT NULL,
  `heure_fermeture_pm` time(2) DEFAULT NULL,
  `statut` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `horaires`
--

INSERT INTO `horaires` (`id`, `jour`, `heure_ouverture_am`, `heure_fermeture_am`, `heure_ouverture_pm`, `heure_fermeture_pm`, `statut`) VALUES
(1, 'Lundi', '08:00:00.00', '12:00:00.00', '14:00:00.00', '18:00:00.00', 'Ouvert'),
(2, 'Mardi', '08:00:00.00', '12:00:00.00', '14:00:00.00', '18:00:00.00', 'Ouvert'),
(3, 'Mercredi', '08:00:00.00', '12:00:00.00', '14:00:00.00', '18:00:00.00', 'Ouvert'),
(4, 'Jeudi', '08:00:00.00', '12:00:00.00', '14:00:00.00', '18:00:00.00', 'Ouvert'),
(5, 'Vendredi', '08:00:00.00', '12:00:00.00', '14:00:00.00', '18:00:00.00', 'Ouvert'),
(6, 'Samedi', '09:00:00.00', '12:00:00.00', '13:00:00.00', '19:00:00.00', 'Ouvert'),
(7, 'Dimanche', NULL, '00:00:00.00', '00:00:00.00', NULL, 'Fermé');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `detail` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `detail`, `img_url`) VALUES
(1, 'RÉPARATION', 'Une panne et un accident peuvent arriver. Nous sommes là pour vous accompagner dans vos réparations.\r\n', 'Réparation Mécanique\r\nElectrique - Electronique\r\nCarrosserie: peinture\r\nPneumatique', 'ressources/asset/image/auto-repair-g9ea5d1564_640.jpg'),
(2, 'ENTRETIEN', 'La date du contrôle technique approche, un départ en vacances ? Voici une liste non exhaustive des entretiens courants.', 'Vidange et remplacement des filtres\r\nRemplacement des bougies\r\nContrôle des niveaux et système informatique\r\nRéglage des freins\r\nNettoyage du véhicule', '/ressources/asset/image/photo%20entretien.jpg'),
(3, 'VENTE DE VÉHICULES D\'OCCASION', 'Notre parc automobile se renouvelle régulièrement. N\'hésitez pas à consultez notre catalogue.', 'Véhicules toutes marques\r\nPropositions de financement\r\nReprise de votre ancien véhicule possible\r\nGaranti : 1 à 2 ans pour tous types de véhicules', '/ressources/asset/image/pre-owned-vehicles-6893760_1280.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `societe`
--

DROP TABLE IF EXISTS `societe`;
CREATE TABLE IF NOT EXISTS `societe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `mailing` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adresse` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `siret` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logo_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `societe`
--

INSERT INTO `societe` (`id`, `name`, `phone`, `mailing`, `adresse`, `siret`, `logo_url`) VALUES
(1, 'Garage V.Parrot', '0459874532', 'garagevparrot@example.com', '118 rue fictive 31000 Toulouse', '90350104500031', '');

-- --------------------------------------------------------

--
-- Structure de la table `statuts_avis`
--

DROP TABLE IF EXISTS `statuts_avis`;
CREATE TABLE IF NOT EXISTS `statuts_avis` (
  `valeur` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`valeur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `statuts_avis`
--

INSERT INTO `statuts_avis` (`valeur`) VALUES
('A valider'),
('Publié');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `pseudo` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `role`, `pseudo`, `email`, `password`, `phone`, `img_url`) VALUES
(1, 'Administrateur', 'Vincent Parrot', 'vparrot@gmail.com', '123456', '0689786541', ''),
(2, 'Employe', 'Alekseï Stakhanov', 'parfait-employe@example.com', '03011906charbon', '0653145896', ''),
(3, 'Employe', 'Gaston Lagaffe', 'gaston.lagaffe@example.com', 'Franquin1957', '0633330107', '');

-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

DROP TABLE IF EXISTS `voitures`;
CREATE TABLE IF NOT EXISTS `voitures` (
  `id` int NOT NULL AUTO_INCREMENT,
  `marque` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modele` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `carburant` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `boite` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mise_en_circulation` date DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `km` int DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img_url_1` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img_url_2` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `img_url_3` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `img_url_4` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voitures`
--

INSERT INTO `voitures` (`id`, `marque`, `modele`, `carburant`, `boite`, `mise_en_circulation`, `prix`, `km`, `description`, `img_url_1`, `img_url_2`, `img_url_3`, `img_url_4`) VALUES
(1, 'AUDI Q5', '2.0 TDI 190 S TRONIC', 'diesel', 'automatique', '2014-09-16', 32500, 98657, 'Magnifique voiture avec contrôle CT. Toute option. Idéale pour les familles ou pour les entrepreneurs.\r\npuissance fiscale 10cv', 'https://image.noelshack.com/fichiers/2023/38/3/1695228449-voiture-1.jpg', 'https://image.noelshack.com/fichiers/2023/38/3/1695228449-voiture-1-bis.jpg', 'https://image.noelshack.com/fichiers/2023/38/3/1695228449-interieur-voiture-1.jpg', 'https://image.noelshack.com/fichiers/2023/38/3/1695228431-interieur-voiture-1-bis.jpg'),
(2, 'Renault', 'EXPRESS BLUE DCI 80 ', 'diesel', 'manuel', '2018-09-12', 12900, 46000, 'Bonne voiture qui tient la route.\r\n\r\n5cv\r\n', 'https://image.noelshack.com/fichiers/2023/38/3/1695228811-voiture-2.jpg', 'https://image.noelshack.com/fichiers/2023/38/3/1695228811-voiture-2-bis.jpg', 'https://image.noelshack.com/fichiers/2023/38/3/1695228811-interieur-voiture-2.jpg', 'https://image.noelshack.com/fichiers/2023/38/3/1695228811-interieur-voiture-2-bis.jpg'),
(3, 'FORD', '2.0 TDCI 150 S S 4X2', 'essence', 'manuel', '2015-09-17', 23218, 38421, '8cv et consomme très peu 4.7/100 km. C\'est la voiture de l\'actualité', 'https://image.noelshack.com/fichiers/2023/38/3/1695228910-voiture-3.jpg', 'https://image.noelshack.com/fichiers/2023/38/3/1695228910-voiture-3-bis.jpg', 'https://image.noelshack.com/fichiers/2023/38/3/1695228910-interieur-voiture-3.jpg', 'https://image.noelshack.com/fichiers/2023/38/3/1695228910-interieur-voiture-3-bis.jpg'),
(4, 'Citroen', 'BLUEHDI 100 S S BVM6', 'ESSENCE', 'AUTOMATIQUE', '0000-00-00', 6500, 110000, 'Superbe voiture parfaite pour le quotidien', 'https://image.noelshack.com/fichiers/2023/38/4/1695288650-voiture-4.jpg', '', '', ''),
(5, 'FORD', 'SW 2.0 HYBRID 187 BV', 'Hybride', 'AUTOMATIQUE', '1970-01-01', 30148, 29224, 'La voiture qu\'il vous faut', 'https://image.noelshack.com/fichiers/2023/38/4/1695295704-voiture-5.jpg', 'https://image.noelshack.com/fichiers/2023/38/4/1695295704-voiture-5-bis.jpg', 'https://image.noelshack.com/fichiers/2023/38/4/1695295704-interieur-voiture-5.jpg', 'https://image.noelshack.com/fichiers/2023/38/4/1695295704-interieur-voiture-5-bis.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
