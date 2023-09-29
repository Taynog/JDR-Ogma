-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 26 juin 2022 à 09:56
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ogma`
--

-- --------------------------------------------------------

--
-- Structure de la table `armes`
--

DROP TABLE IF EXISTS `armes`;
CREATE TABLE IF NOT EXISTS `armes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Type_degats` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Degats` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Maniabilite` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Portee` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Propriete` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Categorie` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ENC` tinyint(4) NOT NULL,
  `Prix` smallint(4) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `armes`
--

INSERT INTO `armes` (`Id`, `Type`, `Type_degats`, `Degats`, `Maniabilite`, `Portee`, `Propriete`, `Categorie`, `ENC`, `Prix`) VALUES
(15, 'Dague', 'Perforants ou Tranchants', '1d4', '1M', 'Courte', 'Dard, Lancer(10), Petite', 'Lames', 1, 20),
(16, 'Dague de parade', 'Perforants', '1d4', '1M', 'Courte', 'Dard, Défensive, Petite', 'Lames', 1, 25),
(17, 'Épée Courte', 'Tranchants ou Perforants', '1d6', '1M', 'Moyenne', 'Dard', 'Lames', 1, 50),
(18, 'Épée Courbe', 'Tranchants', '1d6', '1M', 'Moyenne', 'Duel', 'Lames', 1, 50),
(19, 'Rapières', 'Perforants', '1d6', '1M', 'Moyenne', 'Duel', 'Lames', 1, 50),
(20, 'Épée Longue', 'Tranchants ou Perforants', '1d8', '1M', 'Moyenne', '-', 'Lames', 2, 75),
(21, 'Grande épée', 'Tranchants ou Perforants', '1d12', '2M', 'Longue', 'Impact, Peu maniable', 'Lames', 3, 100),
(22, 'Hachette', 'Tranchant', '1d4', '1M', 'Courte', 'Lancer(10), Petite', 'Haches', 1, 15),
(23, 'Hache de guerre', 'Tranchant', '1d8', '1M', 'Moyenne', 'Brise-bouclier, Peu maniable', 'Haches', 2, 60),
(24, 'Grande hache', 'Tranchant', '1d12', '2M', 'Longue', 'Brise-bouclier, Impact, Peu maniable', 'Haches', 3, 75),
(25, 'Maillet', 'Écrasants', '1d4', '1M', 'Courte', 'Lancer(10), Petite', 'Masses et marteaux', 1, 15),
(26, 'Masse', 'Écrasants', '1d8', '1M', 'Moyenne', 'Peu maniable', 'Masses et marteaux', 1, 50),
(27, 'Grand marteau', 'Écrasants', '1d12', '2M', 'Longue', 'Brise-bouclier, Peu maniable, Impact', 'Masses et marteaux', 3, 75),
(28, 'Javelot', 'Perforants', '1d4', '1M', 'Longue', 'Lancer(20)', 'Armes d\'hast', 2, 20),
(29, 'Lance', 'Perforants', '1d6', '1M', 'Très Longue', 'Anti-Large, Sentinelle', 'Armes d\'hast', 2, 25),
(30, 'Pique', 'Perforants', '1d10', '2M', 'Extrême', 'Anti-Large, Sentinelle, Peu maniable', 'Armes d\'hast', 3, 25),
(31, 'Hallebarde', 'Tranchants ou Perforants', '1d10', '2M', 'Très Longue', 'Anti-Large, Sentinelle', 'Armes d\'hast', 3, 100),
(32, 'Lance d\'arçon', '-', '1d10', '1M', 'Extrême', 'Montée, Peu maniable, Perce-armure(3)', 'Armes d\'hast', 3, 50),
(33, 'Fouet', 'Tranchants', '1d4', '1M', 'Très Longue', 'Petite', 'Diverses', 1, 10),
(34, 'Bâton', 'Écrasants', '1d4', '1M', 'Longue', '-', 'Diverses', 2, 1),
(35, 'Ceste', 'Écrasants', '1d4', '1M', 'Courte', 'Petite', 'Diverses', 1, 5),
(55, 'Pistolet de poche', 'Perforants et écrasants', '1d6', '1M', '50m', 'Rechargement(2 min 1), Peu maniable, Perce-armure(1), Petite', 'Armes de poing', 1, 100),
(53, 'Arbalète lourde', 'Perforants', '1d12', '2M', '200m', 'Rechargement(3 min 1), Peu maniable, Perce-armure(4)', 'Arcs et arbalètes', 3, 100),
(54, 'Arbalète à main', 'Perforants', '1d6', '1M', '50m', 'Rechargement(1 min 1)', 'Arcs et arbalètes', 1, 75),
(52, 'Arbalète', 'Perforants', '1d10', '2M', '150m', 'Rechargement(2 min 1), Peu maniable, Perce-armure(2)', 'Arcs et arbalètes', 3, 50),
(51, 'Arc Long', 'Perforants', '1d8', '2M', '150m', 'Rechargement(1), Peu maniable', 'Arcs et arbalètes', 2, 75),
(49, 'Sarbacane', 'Perforants', '1d4', '1M', '30m', '-', 'Armes à distance diverses', 1, 1),
(50, 'Arc Court', 'Perforants', '1d6', '2M', '100m', '-', 'Arcs et arbalètes', 2, 50),
(48, 'Fronde', 'Écrasants', '1d4', '1M', '100m', '-', 'Armes à distance diverses', 1, 5),
(47, 'Fléchettes de lancer', 'Perforants', '1d4', '1M', '15m', 'Lancer(15), Petite', 'Armes de jet', 0, 5),
(46, 'Étoiles de lancer', 'Tranchants', '1d4', '1M', '15m', 'Lancer(15), Petite', 'Armes de jet', 0, 5),
(56, 'Pistolet à silex', 'Perforants et écrasants', '1d8', '1M', '100m', 'Rechargement(2 min 1), Peu maniable, Perce-armure(2)', 'Armes de poing', 1, 100),
(57, 'Pistolet à double canon', 'Perforants et écrasants', '1d8', '1M', '100m', 'Chargeur(2), Rechargement(2 min 1), Peu maniable, Perce-armure(2)', 'Armes de poing', 1, 150),
(58, 'Poivrière', 'Perforants et écrasants', '1d8', '1M', '100m', 'Chargeur(6), Rechargement(2 min 1), Peu maniable, Perce-armure(2)', 'Armes de poing', 1, 300),
(59, 'Pétoire', 'Perforants et écrasants', '1d6', '1M', '15m', 'Rechargement(3 min 1), Peu maniable, Perce-armure(1), Zone(2)', 'Armes de poing', 1, 100),
(60, 'Mousquet', 'Perforants et écrasants', '1d12', '2M', '200m', 'Rechargement(3 min 1), Peu maniable, Perce-armure(4)', 'Armes d\'épaule', 3, 150),
(61, 'Mousquet à double canon', 'Perforants et écrasants', '1d12', '2M', '200m', 'Chargeur(2), Rechargement(3 min 1), Peu maniable, Perce-armure(4)', 'Armes d\'épaule', 3, 175),
(62, 'Tromblon', 'Perforants et écrasants', '1d8', '2M', '15m', 'Rechargement(3 min 1), Peu maniable, Perce-armure(2), Zone(3)', 'Armes d\'épaule', 3, 150);

-- --------------------------------------------------------

--
-- Structure de la table `armures`
--

DROP TABLE IF EXISTS `armures`;
CREATE TABLE IF NOT EXISTS `armures` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Materiau` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PR` tinyint(11) NOT NULL,
  `PR_mag` tinyint(11) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Categorie` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `armures`
--

INSERT INTO `armures` (`Id`, `Materiau`, `PR`, `PR_mag`, `Prix`, `Categorie`) VALUES
(1, 'Peau', 1, 0, 75, 'Légère'),
(2, 'Cuir', 2, 0, 150, 'Légère'),
(3, 'Alkite', 3, 1, 375, 'Légère'),
(4, 'Kusni', 4, 2, 1000, 'Légère'),
(5, 'Gnistar', 5, 3, 1800, 'Légère'),
(6, 'Chitine', 2, 0, 100, 'Intermédiaire'),
(7, 'Os', 3, 1, 200, 'Intermédiaire'),
(8, 'Nilaroy', 4, 2, 500, 'Intermédiaire'),
(9, 'Adamantine', 5, 3, 1200, 'Intermédiaire'),
(10, 'Lakma', 6, 4, 2500, 'Intermédiaire'),
(11, 'Fer', 3, 1, 125, 'Lourde'),
(12, 'Acier', 4, 2, 300, 'Lourde'),
(13, 'Shoren', 5, 3, 750, 'Lourde'),
(14, 'Orichalque', 6, 4, 1500, 'Lourde'),
(15, 'Skymma', 7, 5, 3000, 'Lourde');

-- --------------------------------------------------------

--
-- Structure de la table `boucliers`
--

DROP TABLE IF EXISTS `boucliers`;
CREATE TABLE IF NOT EXISTS `boucliers` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Materiau` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RB` tinyint(4) NOT NULL,
  `Prix` int(4) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `boucliers`
--

INSERT INTO `boucliers` (`Id`, `Materiau`, `RB`, `Prix`) VALUES
(1, 'Bois', 1, 20),
(2, 'Fer / Chitine / Os', 2, 50),
(3, 'Acier / Alkite / Nilaroy', 3, 120),
(7, 'Adamantine / Shoren / Orichalque', 4, 300),
(8, 'Gnistar / Lakma / Skymma', 5, 800);

-- --------------------------------------------------------

--
-- Structure de la table `sorts`
--

DROP TABLE IF EXISTS `sorts`;
CREATE TABLE IF NOT EXISTS `sorts` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Effet` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Propriete` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cout` tinyint(10) NOT NULL,
  `Duree` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sup` longtext COLLATE utf8mb4_unicode_ci,
  `Inkarnai` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ecole` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sorts`
--

INSERT INTO `sorts` (`Id`, `Effet`, `Propriete`, `Cout`, `Duree`, `Description`, `Sup`, `Inkarnai`, `Ecole`) VALUES
(101, 'Télépathie', 'Concentration', 2, '-', 'La cible obtient le trait <a href=\'Glossaire.php#telepathe\'>Télépathe(SC)</a> tant que le lanceur se conectre sur le sort.', NULL, 'Orizo', 'Mysticisme'),
(3, 'Aspect animal', '-', 2, '1 heure', 'La cible obtient les capacités d\'un animal (catégorie bête ou vermine) de gabarit Minuscule ou inférieur. Les effets dépendent de l\'animal choisi.', 'Pour chaque cercle au delà du premier, le <a href=\'Tableaux.php#gabarit_creatures\'>gabarit</a> de l\'animal augmente d\'un cran jusqu\'au gabarit Colossale au cercle 8.', 'Kynigi', 'Altération'),
(4, 'Aisance aquatique', '-', 2, '1 heure', 'La cible obtient le trait <a href=\'Glossaire.php#amphibien\'>Amphibien</a> et peut respirer sous l\'eau pour toute la durée du sort.', 'Aux cercles supérieurs, la durée du sort augmente double pour chaque cercle au delà du premier.', 'Nero', 'Altération'),
(5, 'Marche aquatique', '-', 1, '1 heure', 'La cible peut marcher sur l\'eau comme si elle marchait sur la terre ferme.', 'Aux cercles supérieurs, la durée du sort augmente double pour chaque cercle au delà du premier.', 'Nero', 'Altération'),
(6, 'Chute ralentie', 'Réaction', 2, '1 minute', 'La cible ignore les 5 premiers mètres de sa prochaine chute lors du <a href=\'Survie.php#chutes\'>calcul des dégâts</a>.', 'Aux cercles supérieurs, la distance de chute double pour chaque cercle au delà du premier.', 'Aïgida', 'Altération'),
(7, 'Lévitation', 'Concentration, Réaction', 3, '-', 'La cible obtient une vitesse de déplacement en vol de 2 mètres par round.', 'Aux cercles supérieurs, la vitesse de déplacement obtenue double pour chaque cercle au delà du premier.', 'Aïgida', 'Altération'),
(8, 'Saut', '-', 2, '1 minute', 'La cible pourra parcourir un mètre supplémentaire en hauteur et le double en longueur lors de son prochain saut.', 'Aux cercles supérieurs, la distance de saut double pour chaque cercle au delà du premier.', 'Aïgida', 'Altération'),
(9, 'Verrouillage', '-', 3, '-', 'La serrure ciblé devient verrouillée. Ouvrir cette serrure nécessite un test étendu de crochetage avec un DR total de SC*5.', NULL, 'Ourgal', 'Altération'),
(10, 'Déverrouillage', '-', 3, '-', 'La serrure ciblé ajoute SC*5 DR au total nécessaire à la dévérouiller.', NULL, 'Ourgal', 'Altération'),
(11, 'Transmutation', '-', 4, 'Permanent', 'Le lanceur lance SCd4, si le résultat total dépasse la resistance magique de la cible, elle devient métallique ou minérale. Une cible métamorphosée en pierre ou en métal est invulnérable aux dégâts du temps et son poids est multiplié par 5. l\'effet dure indéfiniment tant que la cible ne brise pas le sort (une tentative par jour).', NULL, 'Ourgal', 'Altération'),
(12, 'Renforcement [Caractéristique]', '[Force, Dextérité, Agilité, Vigueur, Intelligence, Volonté, Perception, Éloquence]', 3, '1 minute', 'La cible voit sa [Caractéristique] augmenter de SC cran(s) pendant une minute.', NULL, 'Agones(FOR, AGI, VIG), Eftis(DEX), Orizo(INT, VOL), Kynigi(PER), Psema(ÉLO)', 'Altération'),
(13, 'Affaiblissement [Caractéristique]', '[Force, Dextérité, Agilité, Vigueur, Intelligence, Volonté, Perception, Éloquence]', 3, '1 minute', 'La cible doit passer un test de Vigueur dans le cas d\'une caractéristique physique ou de Volonté pour une caractéristique mentale avec un NDR équivalent au résultat du lanceur de sort et un DC équivalent au cercle du sort. La [Caractéristique] de la cible diminue de SC cran(s) pendant une minute.', NULL, 'Agones(FOR, AGI, VIG), Eftis(DEX), Orizo(INT, VOL), Kynigi(PER), Psema(ÉLO)', 'Altération'),
(14, 'Résistance [Élément]', '[Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]', 3, '1 minute', 'Procure à la cible le trait <a href=\'Glossaire.php#resistance\'>résistance(SC,[élément])</a>.', NULL, 'Aïgida, Anathos, Horoï, Kuga, Nero, Safi', 'Altération'),
(15, 'Vulnérabilité [Élément]', 'Concentration, [Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]', 3, '1 minute', 'La cible doit passer un test de Vigueur ou Volonté avec un NDR équivalent au résultat du lanceur de sort et un DC équivalent au cercle du sort. La cible subit le trait <a href=\'Glossaire.php#vulnerabilite\'>vulnérabilité(SC,[élément])</a> pendant une minute.', NULL, 'Aïgida, Anathos, Horoï, Kuga, Nero, Safi', 'Altération'),
(16, 'Guérison', '-', 8, '-', 'La cible passe un test de Vigueur avec un DC de 3 et un bonus équivalent au DR du lanceur. Sur une réussite, la cible guérie d\'une blessure. Chaque palier de 3 DR de la cible soigne une blessure supplémentaire.', NULL, 'Agapi', 'Altération'),
(17, 'Stabilisation', '-', 8, '-', 'La cible passe un test de Vigueur avec un DC de 6 et un bonus équivalent au DR du lanceur. Sur une réussite, la cible n\'est plus <a href=\'Glossaire.php#mourant\'>mourante</a> et devient <a href=\'Glossaire.php#stable\'>stable</a>.', NULL, 'Agapi', 'Altération'),
(18, 'Récupération', '-', 4, '-', 'La cible passe un test de Vigueur avec un DC de 3 et un bonus équivalent au DR du lanceur. Sur une réussite, la cible guérie d\'un trauma. Chaque palier de 3 DR de la cible soigne un trauma supplémentaire.', NULL, 'Agapi', 'Altération'),
(19, 'Purge', 'Concentration', 8, '-', 'La cible obtient un bonus équivalent au DR du lanceur pour résister et purger les effets négatifs(Vulnérabilité, Saignement, Poison, etc..) tant que le lanceur se concentre sur le sort.', NULL, 'Agapi', 'Altération'),
(20, 'Invisibilité', 'Concentration', 8, '-', 'La cible devient invisible et le reste tant que le lanceur se concentre sur le sort.', NULL, 'Safi', 'Altération'),
(21, 'Armure Physique', '-', 3, '1 minute', 'La cible obtient SC PR sur toute les localisations.', NULL, 'Pravoï', 'Conjuration'),
(24, 'Armure Magique', '-', 3, '1 minute', 'La cible obtient SC PR magique.', NULL, 'Pravoï', 'Conjuration'),
(27, 'Protection', 'Réaction', 2, '-', 'Réduis les dégâts subis par la cible de 2*SC pour une seule attaque.', NULL, 'Pravoï', 'Conjuration'),
(30, 'Entrave', 'Concentration', 3, '-', 'La cible doit passer un test de Force, de Vigueur ou de Volonté un NDR équivalent au résultat du lanceur de sort et un DC équivalent au cercle du sort. puis être <a href=\'Glossaire.xhtmlmaitrise_paralysie\'>maitrisée</a> tant que le lanceur se concentre sur le sort.', 'Aux cercles supérieurs, la cible effectue son jet avec un désavantage supplémentaire par cercle au delà du premier.', 'Pravoï', 'Conjuration'),
(33, 'Toile d\'araignée', '-', 2, '1 minute', 'L\'endroit ciblé par le lanceur diminue la vitesse des entité le traversant de 1.', 'Aux cercles supérieurs, la réduction de vitesse est doublée pour chaque cercle au delà du premier', 'Kynigi', 'Conjuration'),
(36, 'Invocation de Karnarim élémentaire mineur', '[Acide, Eau, Feu, Foudre, Glace, Lumière, Métal, Nécrotique, Pierre, Poison, Sable, Terre]', 6, '1 minute', 'Invoque un Karnarim mineur de l\'[élément]. Voir <a href=\'../World/Bestiaire.php#elementaire_mineur\'>Élémentaire mineur</a> dans le Bestiaire.', NULL, 'Aïgida, Anathos, Horoï, Kormo, Kuga, Nero, Ourgal, Safi', 'Conjuration'),
(39, 'Invocation de Karnarim élémentaire', '[Acide, Eau, Feu, Foudre, Glace, Lumière, Métal, Nécrotique, Pierre, Poison, Sable, Terre]', 12, '1 minute', 'Invoque un Karnarim de l\'[élément]. Voir <a href=\'../World/Bestiaire.php#elementaire\'>Élémentaire</a> dans le Bestiaire.', NULL, 'Aïgida, Anathos, Horoï, Kormo, Kuga, Nero, Ourgal, Safi', 'Conjuration'),
(42, 'Invocation de Karnarim élémentaire majeur', '[Acide, Eau, Feu, Foudre, Glace, Lumière, Métal, Nécrotique, Pierre, Poison, Sable, Terre]', 18, '1 minute', 'Invoque un Karnarim de l\'[élément]. Voir <a href=\'../World/Bestiaire.php#elementaire_majeur\'>Élémentaire majeur</a> dans le Bestiaire.', NULL, 'Aïgida, Anathos, Horoï, Kormo, Kuga, Nero, Ourgal, Safi', 'Conjuration'),
(45, 'Invocation d\'Arme', '-', 3, '1 heure', 'Invoque une arme infligeant 1d4 dégâts magiques à l\'endroit ciblé, cette arme peut utiliser la caractéristique de Volonté du lanceur pour les jets de Style de Combat.', 'Aux cercles supérieurs, le dé de dégâts de l\'arme invoqué augmente d\'un <a href=\'Systeme.php#cran_des\'>cran</a>.', 'Agones', 'Conjuration'),
(48, 'Projection psychique', 'Concentration', 5, '-', 'L\'esprit de cible est envoyé dans un domaine de Karnaï. Elle doit passer un test étendu de Vigueur ou Volonté un NDR équivalent au résultat du lanceur de sort et un DC équivalent au cercle du sort. si elle souhaite résister. Sans esprit pour le contrôler, le corps de la cible est inanimé pendant cette période. Une minute dans le monde matériel équivaut à une heure dans le monde de Karnaï.', 'Aux cercles supérieurs, la cible effectue son jet avec un désavantage supplémentaire par cercle au delà du premier.', 'Selon le domaine visité', 'Conjuration'),
(51, 'Bannissement', '-', 8, '-', 'La cible est renvoyé dans sa dimension d\'Origine. Elle doit passer un test de Vigueur ou Volonté avec un DC équivalent au DR du lanceur si elle souhaite résister.', NULL, 'Pravoï', 'Conjuration'),
(54, 'Pas de l\'ombre', '-', 4, '-', 'La cible doit se tenir dans une ombre. Elle se téléporte dans une autre ombre située à moins de 10 mètres de sa position. Si elle souhaite résister, elle doit passer un test de Volonté avec un DC équivalent au résultat du lanceur.', 'Aux cercles supérieurs, la portée de téléportation double pour chaque cercle au delà du premier.', 'Eftis', 'Conjuration'),
(57, 'Téléportation', '-', 5, '-', 'La cible se téléporte sur une distance de 10 mètres ou moins dans un éclair de lumière. Si elle souhaite résister, elle doit passer un test de Volonté avec un DC équivalent au résultat du lanceur.', 'Aux cercles supérieurs, la portée de téléportation double pour chaque cercle au delà du premier.', 'Safi', 'Conjuration'),
(60, 'Racines du monde', '-', 3, '-', 'La cible se téléporte via les racines d\'un arbre sur une distance de 10 mètres ou moins, elle doit être en contact avec un arbre en vie et réapparaître sur un autre arbre en vie. Si elle souhaite résister, elle doit passer un test de Volonté avec un DC équivalent au résultat du lanceur.', 'Aux cercles supérieurs, la portée de téléportation double pour chaque cercle au delà du premier.', 'Kormo', 'Conjuration'),
(63, 'Assaut minéral', '[Métal, Pierre, Terre, Sable]', 3, '-', 'La cible subit SCd4 dégâts physiques.', NULL, 'Kormo, Ourgal', 'Conjuration'),
(66, 'Assaut élémentaire', '[Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]', 3, '-', 'La cible subit SCd4 dégâts d\'[Élément].', NULL, 'Aïgida, Anathos, Horoï, Kuga, Nero, Safi', 'Conjuration'),
(69, 'Création élémentaire', 'Concentration, [Glace, Métal, Pierre, Sable, Terre]', 2, '-', 'L\'[élément] apparaît à l\'endroit ciblé et reste tant que le lanceur reste concentré dessus. La création doit subir 5 dégâts avant de se briser.', 'Aux cercles supérieurs, la solidité de la création double pour chaque cercle au delà du premier.', 'Kormo, Nero, Ourgal', 'Conjuration'),
(72, 'Bourrasque', 'Concentration', 2, '-', 'Invoque du vent se déplaçant à 25km/h à l\'endroit ciblé, la directon du vent est au choix du lanceur.', 'Aux cercles supérieurs, la vitesse du vent double pour chaque cercle au delà du premier.', 'Aïgida', 'Conjuration'),
(75, 'Spores [type]', '[Paralysie, Sommeil, Poison,...]', 3, '-', 'Invoque des spores infligeant l\'effet [type]. La cible doit réussir un test étendu de Vigueur ou Volonté un NDR équivalent au résultat du lanceur de sort et un DC équivalent au cercle du sort.. (<a href=\'Glossaire.php#paralyse\'>Paralysie</a> pendant SC round, sommeil pendant SC minutes, Poison : <a href=\'Glossaire.php#empoisonnement\'>Empoisonnement(SC)</a>,...)', NULL, 'Kormo', 'Conjuration'),
(78, 'Chaleur', 'Concentration', 2, '-', 'Augmente la température ambiante de la cible de 5 C°.', 'Aux cercles supérieurs, l\'augmentation de chaleur double pour chaque cercle au delà du premier.', 'Horoï', 'Conjuration'),
(81, 'Fraîcheur', 'Concentration', 2, '-', 'Diminue la température ambiante de la cible de 5 C°.', 'Aux cercles supérieurs, la diminution de chaleur double pour chaque cercle au delà du premier.', 'Nero', 'Conjuration'),
(84, 'Lumière', '-', 2, '1 heure', 'Génère de la lumière vive sur 5 mètres et de la lumière faible sur 10 mètre de façon circulaire.', 'Aux cercles supérieurs, la portée de la lumière double pour chaque cercle au delà du premier.', 'Safi', 'Conjuration'),
(87, 'Création illusoire', 'Concentration', 3, '-', 'Façonne une création intangible de la forme souhaitée avec sons et odeurs de gabarit TP. Un test d\'Observation ou d\'Investigation avec un DC équivalent au résultat du lanceur est nécessaire pour se rendre compte de l\'illusion sans la toucher.', 'Pour chaque cercle au delà du premier, le <a href=\'Tableaux.php#gabarit_creatures\'>gabarit</a> de l\'illusion augmente d\'un cran jusqu\'au gabarit Colossale au cercle 8.', 'Psema', 'Conjuration'),
(90, 'Réanimation', '-', 3, '1 heure', 'La cible doit être une créature inanimé de gabarit TP. La créature réanimé agit comme bon lui semble.', 'Pour chaque cercle au delà du premier, le <a href=\'Tableaux.php#gabarit_creatures\'>gabarit</a> de la créature réanimé augmente d\'un cran jusqu\'au gabarit Colossale au cercle 8.', 'Anathos', 'Domination'),
(91, 'Contrôle mental', 'Concentration', 5, '-', 'La cible doit passer un test étendu de Volonté avec un NDR équivalent au résultat du lanceur de sort et un DC équivalent au cercle du sort. La cible passe sous le contrôle du lanceur tant qu\'il se concentre sur le sort.', 'Aux cercles supérieurs, la cible effectue son jet de volonté avec un désavatange pour chaque cercle au delà du premier.', 'Kynigi(Animaux), Kormo(Plantes), Psema(Humanoïdes)', 'Domination'),
(92, 'Réécriture mémorielle', '-', 8, '-', 'La cible doit passer un test de Résistance(Vol) avec un modificateur de +20-(5*SC) ou voir sa mémoire immédiate (60 dernières secondes) modifiée par le lanceur. Si la modification porte sur une période minoritaire de la vie de la cible et qu\'elle est incohérente ou trop contradictoire avec le comportement habituel de la cible, elle considérera les effets du sort comme une hallucination/mauvais rêve. Dans le cas d\'une modification de grande ampleur (au moins la moitié de la vie de la cible), seules les pensés incohérentes sont perçues comme des mauvais rêves.', 'Aux cercles supérieurs, la portion de vie réecrie augmente selon le cercle : SC2 -> 10 minutes, SC3 -> une heure, SC4 -> une journée, SC5 -> une semaine, SC6 -> un mois, SC7 -> une année, SC8 -> une décennie, SC9 -> un siècle, SC10 -> vie entière', 'Psema', 'Domination'),
(93, 'Mot de pouvoir : Douleur', 'Concentration', 4, '-', 'La cible doit passer un test de Vigueur ou Volonté avec un NDR équivalent au résultat du lanceur de sort et un DC équivalent au cercle du sort. La cible voie sa vitesse diminuée de 1 et effectue toute action (sauf se libérer) avec un désavantage tant que le lanceur se concetre sur le sort.', 'Aux cercles supérieurs, la réduction de vitesse double et le nombre de désavatanges imposée pour les actions de la cible augmente de 1.', 'Psema', 'Domination'),
(94, 'Mot de pouvoir : Mort', '-', 15, '-', 'La cible doit passer un test de Vigueur ou Volonté avec un DC équivalent au DR du lanceur de sort ou être réduite à 0 points de vitalité.', NULL, 'Anathos', 'Domination'),
(95, 'Télékinésie', 'Concentration', 2, '-', 'La cible obtient le trait <a href=\'Glossaire.php#telekinesiste\'>Télékinésiste(SC)</a> tant que le lanceur se concentre sur le sort.', NULL, 'Agones', 'Domination'),
(96, 'Peur', 'Concentration', 5, '-', 'La cible doit passer un test étendu de Volonté un NDR équivalent au résultat du lanceur de sort et un DC équivalent au cercle du sort. La cible est <a href=\'Glossaire.php#effraye\'>Effrayé(lanceur)</a> tant que le lanceur se concentre sur le sort.', 'Aux cercles supérieurs, la cible effectue son jet de volonté avec un désavatange pour chaque cercle au delà du premier.', 'Agapi(mort-vivant), Psema', 'Domination'),
(97, 'Calme', 'Concentration', 5, '-', 'La cible doit passer un test étendu de Volonté un NDR équivalent au résultat du lanceur de sort et un DC équivalent au cercle du sort. La cible est <a href=\'Glossaire.php#fascine\'>fasciné</a> tant que le lanceur se concentre sur le sort.', 'Aux cercles supérieurs, la cible effectue son jet de volonté avec un désavatange pour chaque cercle au delà du premier.', 'Psema', 'Domination'),
(98, 'Rage', 'Concentration', 5, '-', 'La cible doit passer un test étendu de Volonté un NDR équivalent au résultat du lanceur de sort et un DC équivalent au cercle du sort. La cible considère tout le monde comme un adversaire tant que le lanceur se concentre sur le sort.', 'Aux cercles supérieurs, la cible effectue son jet de volonté avec un désavatange pour chaque cercle au delà du premier.', 'Agones', 'Domination'),
(99, 'Silence', 'Concentration', 5, '-', 'La cible doit passer un test étendu de Volonté un NDR équivalent au résultat du lanceur de sort et un DC équivalent au cercle du sort. La cible est incapable de parler tant que le lanceur se concentre sur le sort.', 'Aux cercles supérieurs, la cible effectue son jet de volonté avec un désavatange pour chaque cercle au delà du premier.', 'Psema', 'Domination'),
(100, 'Apparence trompeuse', 'Concentration', 10, '-', 'La cible est perçue comme quelqu\'un d\'autre par les personnes non-consciente du sort tant que le lanceur se concentre sur le sort. Se rendre compte du sort nécessite de passer un test d\'Observation(Per) ou d\'Arcanes(Int ou Per) avec un DC équivalent au DR du lanceur de sort.', NULL, 'Psema', 'Domination'),
(102, 'Archives d\'Orizo', '-', 2, '1 minute', 'Le prochain test de compétence de la cible pouvant être facilité avec des connaissances spécifiques se fera avec SC avantages.', NULL, 'Orizo', 'Mysticisme'),
(103, 'Détection de la vie / des morts / de la magie', '-', 3, '-', 'Détecte les être vivants / les morts / la magie dans un rayon de 10*SC mètres du point d\'impact du sort.', 'Aux cercles supérieurs, la portée de détection double pour chaque cercle au dela du premier', 'Kynigi(vie), Anathos(morts), Orizo(magie)', 'Mysticisme'),
(104, 'Vision véritable', 'Concentration', 10, '-', 'La cible voit tout, même les entités invisibles, peut voir dans le noir le plus complet et même dans une obscurité magique.', NULL, 'Orizo', 'Mysticisme'),
(105, 'Destinée', '-', 4, '24 heures', 'Permet de lancer SC d100. La cible peut utiliser un des résultats obtenus pour remplacer le résultat de n\'importe quel test. (Le lanceur doit annoncer l\'utilisation d\'un dé pré-tiré avant que le dé ne soit lancé).', NULL, 'Tychi', 'Mysticisme'),
(106, 'Augure', '-', 5, '-', 'La cible est avertie de son futur proche. (fortune, péril, les deux ou rien).', NULL, 'Tychi', 'Mysticisme'),
(107, 'Prophétie', '-', 15, '-', 'La cible obtient une réponse fiable sur un évènement à venir dans les 7 jours. (avoir recours à cet effet sans 7 jours d\'intervalles augmente de 25% les chances de réponse aléatoires).<i>Cet effet est toujours de SC6</i>', NULL, 'Tychi', 'Mysticisme'),
(108, 'Communion avec la nature', '-', 8, '-', 'La cible obtient trois informations sur son environnement.', NULL, 'Kormo et Kynigi', 'Mysticisme'),
(109, 'Localisation d\'entité', 'Concentration', 4, '-', 'La cible connait la position de l\'entité de son choix dans un rayon d\'un kilomètre tant que le lanceur se concentre sur le sort.', 'Aux cercles supérieurs, la portée de détection double pour chaque cercle supérieur au premier.', 'Kynigi', 'Mysticisme'),
(110, 'Langue enchantée', 'Concentration', 6, '-', 'La cible sait parler dans toute les langues tant que le lanceur se concentre sur le sort.', NULL, 'Orizo', 'Mysticisme'),
(111, 'Lien sensoriel', 'Concetration', 5, '-', 'La cible peut voir/entendre/sentir à traver les sens d\'une créature consentante dans un rayon d\'un kilomètre tant que le lanceur se concentre sur le sort.', 'Aux cercles supérieurs, la portée de détection double pour chaque cercle supérieur au premier.', 'Kynigi', 'Mysticisme');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
