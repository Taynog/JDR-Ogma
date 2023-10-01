-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 01 oct. 2023 à 14:40
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

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
-- Structure de la table `arts_combat`
--

DROP TABLE IF EXISTS `arts_combat`;
CREATE TABLE IF NOT EXISTS `arts_combat` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Conditions` text COLLATE utf8_unicode_ci NOT NULL,
  `Effet` text COLLATE utf8_unicode_ci NOT NULL,
  `Cout` tinyint(4) DEFAULT NULL,
  `Test_assaillant` text COLLATE utf8_unicode_ci NOT NULL,
  `Test_defenseur` text COLLATE utf8_unicode_ci NOT NULL,
  `Type_arme` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `arts_combat`
--

INSERT INTO `arts_combat` (`Id`, `Nom`, `Description`, `Conditions`, `Effet`, `Cout`, `Test_assaillant`, `Test_defenseur`, `Type_arme`) VALUES
(1, 'Balayette', 'Le héros tente de faire tomber son adversaire au sol', '-', 'La cible est au sol et passe son prochain tour, elle subit 2 dégâts', NULL, 'Action bonus : DEX', 'AGI', NULL),
(2, 'Charge d\'épaule', 'Le héros bouscule son adversaire pour le faire tomber au sol', '-', 'La cible est au sol et passe son prochain tour, elle subit 4 dégâts', NULL, 'Action bonus : FOR', 'VIG', NULL),
(3, 'Coup dans les yeux', 'Avec un rapide coup de dague au visage, le héros aveugle momentanément son adversaire', 'Dague<br/>Cible sans casque', 'cible aveuglée partiellement : Atq et Prd -20 (3 tours)', NULL, 'Action simple :<br/>Jet d\'Atq à -20', 'Parade/Esquive à +10', NULL),
(4, 'Désarmement', 'Le héros lutte habilement pour ôter son arme à son adversaire', 'Après une attaque réussie', 'La cible est désarmée', NULL, 'Action bonus : DEX ou FOR', 'DEX', NULL),
(5, 'Balayette', 'Le héros tente de faire tomber son adversaire au sol', '-', 'La cible est au sol et passe son prochain tour, elle subit 2 dégâts', NULL, 'Action bonus : DEX', 'AGI', NULL),
(6, 'Charge d\'épaule', 'Le héros bouscule son adversaire pour le faire tomber au sol', '-', 'La cible est au sol et passe son prochain tour, elle subit 4 dégâts', NULL, 'Action bonus : FOR', 'VIG', NULL),
(7, 'Coup dans les yeux', 'Avec un rapide coup de dague au visage, le héros aveugle momentanément son adversaire', 'Dague<br/>Cible sans casque', 'cible aveuglée partiellement : Atq et Prd -20 (3 tours)', NULL, 'Action simple :<br/>Jet d\'Atq à -20', 'Parade/Esquive à +10', NULL),
(8, 'Désarmement', 'Le héros lutte habilement pour ôter son arme à son adversaire', 'Après une attaque réussie', 'La cible est désarmée', NULL, 'Action bonus : DEX ou FOR', 'DEX', NULL),
(9, 'Feinte', 'Le héros distrait son adversaire avant de frapper. La forme de la feinte est à préciser par le joueur', 'Arme de corps-à-corps pouvant infliger des dégâts perforants', 'R: dégâts + 4<br/>E: Le héros baisse sa garde et subit une attaque d\'opportunité', NULL, 'Action bonus :<br/>Le joueur lance un d100 avant de faire son jet d\'attaque (avec bonus éventuels selon le personnage et au choix du MJ), son adversaire lance aussi un d100 (encore bonus et malus au choix du MJ). Le plus haut score l\'emporte.', 'La cible ne peut pas se défendre', NULL),
(10, 'Fente', 'Le héros s\'appuie sur sa jambe avant pour frapper de loin', 'Arme de corps-à-corps pouvant infliger des dégâts perforants', 'La portée augmente d\'un mètre', NULL, 'Action simple :<br/>Moyenne Atq/AGI', 'Parade/Esquive classique', NULL),
(11, 'Lacération', 'Le héros frappe pour ouvrir les veines de son adversaire', 'Cible sans armure à l\'endroit ciblé', 'la cible saigne (1d6/tour) pendant 3 tours', NULL, 'Action simple :<br/>Jet d\'Atq à -10, les dégâts sont divisés par deux', 'Parade/Esquive classique, si le coup touche, épreuve de VIG pour contrer le saignement', NULL),
(12, 'Lutte', 'Le héros agrippe son adversaire pour entraver ses options de combat', 'Une main libre (si deux mains libres bonus de +20)', 'Le héros doit réussir un jet par tour pour maintenir sa prise (FOR ou DEX du héros - FOR ou DEX de cible + 5 par tour). Durant la lutte, le héros peut déplacer la cible de la moitié de sa vitesse de déplacement, l\'attaquer (ignore l\'armure à 30 ou moins), l\'immobiliser ou l\'attacher (avec cordes ou autre) via une épreuve de DEX à -30.', NULL, 'Action simple : DEX ou FOR', 'DEX ou FOR pour contrer la prise', NULL),
(13, 'Provocation', 'Le héros provoque son/ses adversaire(s) et le(s) pousse(nt) à l\'attaquer en priorité', '-', 'La cible se concentre sur le héros et attaque désormais avec deux désavantages les autres cibles pendant 3 rounds', NULL, 'Action bonus : ELO', 'Un jet de VOL pour chaque adversaire provoqué', NULL),
(14, 'Ralliement', 'Le héros motive ses alliés à continuer le combat', '-', 'Les alliés récupèrent 1d6+(marge de réussite/10) points d\'endurance', NULL, 'Action bonus : ELO', '-', NULL),
(15, 'Repositionnement', 'Le héros lutte pour déplacer son adversaire', '-', 'La cible est déplacée de 1m + 1m par 10 points de marge de réussite.', NULL, 'Action de mouvement : DEX ou FOR', 'AGI ou VIG', NULL),
(16, 'Tranche', 'Le héros saisit son arme à deux mains pour un violent coup horizontal', 'Arme polyvalente ou à deux mains', 'Touche toutes les cibles en face et à portée', NULL, 'Action complexe :<br/>Un seul jet d\'Atq à -15', 'Chaque cible peut parer ou esquiver', NULL),
(17, 'Tranche-tendons', 'Le héros frappe la cible dans les articulations des jambes pour l\'empêcher de bouger.', '-', 'Déplacement de la cible limité à un mètre par round', NULL, 'Action simple :<br/>Jet d\'attaque d\'Atq à -25', 'Parade/Esquive à -10', NULL),
(18, 'Tir précis', 'L\'arbalétrier prend son temps pour viser sa cible', '-', 'Dégâts normaux', NULL, 'Action complexe :<br/>Tir à +15', '-', NULL),
(19, 'Tir déstabilisant', 'L\'arbalétrier prépare un tir particulièrement puissant pour faire chuter sa cible', 'Jet rupture pour l\'arme à +1', 'La cible est à terre', NULL, 'Action complexe :<br/>Tir classique', 'VIG pour ne pas tomber', NULL),
(20, 'Tir rapide', 'L\'arbalétrier effectue un tir rapide à la hanche', '-', 'Dégâts normaux', NULL, 'Action bonus :<br/>Tir à -15', '-', NULL),
(21, 'Tir pénétrant', 'L\'arbalétrier tire sur deux cibles alignées et transperce la première pour atteindre la seconde', '2 cibles alignées', 'Dégâts normaux pour la première cible, -3 pour la deuxième', NULL, 'Action complexe :<br/>Tir classique', '-', NULL),
(22, 'Tir précis', 'L\'archer prend son temps pour viser sa cible', '-', 'Dégâts normaux', NULL, 'Action complexe :<br/>Tir à +15', '-', NULL),
(23, 'Tir déstabilisant', 'L\'archer prépare un tir particulièrement puissant pour faire chuter sa cible', 'Jet rupture pour l\'arme à +1', 'La cible est à terre', NULL, 'Action complexe :<br/>Tir classique', 'VIG pour ne pas tomber', NULL),
(24, 'Volée de flèches', 'L\'archer tire une flèche sur chacun des opposants qu\'il a en ligne de mire (max 5)', '-', 'Autant de jets que d\'attaques réussies', NULL, 'Action complexe :<br/>Tir classique pour le premier, les tirs suivants subissent un malus de -10 par tir consécutif', '-', NULL),
(25, 'Frappe assassine', 'L\'assassin frappe un point faible de l\'adversaire', 'Attaque avec avantage', 'Degâts x1,5', NULL, 'Action simple :<br/>Atq classique', 'Parade/Esquive classique', NULL),
(26, 'Coup mortel', 'L\'assassin élimine une cible incapable de se défendre', 'Cible vulnérable(aveuglée, immobilisée, inconscient, etc...)', 'Mort instantanée de la cible', NULL, 'Acton complexe :<br/>Jet d\'Atq à -20', 'Jet de Vigueur', NULL),
(27, 'Frappe lourde', 'Le barbare envoie son adversaire au sol en le frappant avec un force surhumaine', 'FOR du barbare supérieure à celle de sa cible', 'Dégâts x1,5, cible mise au sol et envoyée à 1m + 1m par 10 points de marge de réussite.', NULL, 'Action complexe<br/>Atq à -10', 'jet d\'AGI pour esquiver puis VIG pour résister à la mise au sol', NULL),
(28, 'Destruction', 'Le barbare tente de briser l\'équipement de son adversaire avec son arme', 'Rupture du barbare supérieure à l\'adversaire', 'L\'équipement ciblé est endommagé (arme: Atq et Prd -15, Dgt -2; armure : PR -2)', NULL, 'Action simple :<br/>FOR', 'AGI pour l\'armure ou DEX pour l\'arme suivi d\'un test de rupture', NULL),
(29, 'Double attaque', 'Le héros frappe deux fois avec son arme dans un mouvement fluide', '-', 'Autant de jets que d\'attaques réussies', NULL, 'Action complexe :<br/>1er coup : Attaque classique<br/>2ème coup : Jet d\'Atq à -10', 'Parade/Esquive classique pour chaque frappe', NULL),
(30, 'Triple attaque', 'Le héros délivre un déluge de coup sur son adversaires et frappe trois fois', '-', 'Autant de jets que d\'attaques réussies', NULL, 'Action complexe :<br/>1er coup : Attaque classique, malus de -10 par attaque supplémentaire', 'Parade/Esquive classique pour chaque frappe', NULL),
(31, 'Déplacement forcé', 'À l\'aide de son arme, le faucheur force sa cible à se déplacer sous peine de subir une autre blessure', 'Après une attaque réussie', 'La cible est déplacée de 1m + 1m par 10 points de marge de réussite', NULL, 'Action de mouvement :<br/>DEX pour coincer l\'adversaire puis FOR pour le tirer', 'AGI pour passer sous la lame puis VIG pour résister au déplacement', NULL),
(32, 'Frappe dans le dos', 'Le faucheur utilise son arme pour frapper sa cible dans le dos, où l\'armure est plus fine', '-', 'Ignore 2 points de PR de l\'armure', NULL, 'Action simple :<br/>Jet d\'Atq à -10', 'Parade/Esquive classique', NULL),
(33, 'Frappe de la faucheuse', 'Le faucheur frappe deux fois en un seul et large mouvement', '-', 'Autant de jets que d\'attaques réussies', NULL, 'Action complexe :<br/>1er coup : Attaque classique<br/>2ème coup : Jet d\'Atq à -10', 'Parade/Esquive classique pour chaque frappe', NULL),
(34, 'Tir précis', 'Le fusilier prend son temps pour viser sa cible', '-', 'Dégâts normaux', NULL, 'Action complexe :<br/>Tir à +15', '-', NULL),
(35, 'Tir déstabilisant', 'Le fusilier prépare un tir particulièrement puissant en ajoutant une dose de poudre pour faire chuter sa cible', '2 doses de poudres au lieu d\'une', 'La cible est à terre', NULL, 'Action complexe :<br/>Tir classique', 'VIG pour ne pas tomber', NULL),
(36, 'Réception de charge', 'Le hallebardier se prépare à infliger une attaque d\'opportunité à quiconque pénètre sa zone de contrôle', '-', 'Le hallebardier peut porter une attaque d\'opportunité (avec un bonus de 10 à l\'Atq) supplémentaire sur un adversaire pénétrant sa zone de contrôle.', NULL, 'Action de mouvement :<br/>Aucune épreuve pour se préparer', '-', NULL),
(37, 'Mise au sol', 'Le hallebardier profite d\'une attaque réussie pour agripper son adversaire avec le croc de son fer et l\'amener au sol', 'Après une attaque réussie', 'La cible est à terre', NULL, 'Action bonus :<br/>FOR', 'VIG pour ne pas tomber', NULL),
(38, 'Frappe de la hampe', 'Le hallebardier enchaîne après une attaque par un coup de la hampe', 'Après une attaque', '1d4 de dégâts contondants', NULL, 'Action bonus :<br/>Atq', 'Parade/Esquive classique', NULL),
(39, 'Tir précis', 'Le lanceur prend son temps pour viser sa cible', '-', 'Dégâts normaux', NULL, 'Action complexe :<br/>Tir à +10', '-', NULL),
(40, 'Tir déstabilisant', 'Le lanceur prépare un tir particulièrement puissant en ajoutant une dose de poudre pour faire chuter sa cible', '-', 'La cible est à terre', NULL, 'Action complexe :<br/>Tir classique', 'VIG pour ne pas tomber', NULL),
(41, 'Réception de charge', 'Le lancier se prépare à infliger une attaque d\'opportunité à quiconque pénètre sa zone de contrôle', '-', 'Le lancier peut porter une attaque d\'opportunité (avec un bonus de 10 à l\'Atq) supplémentaire sur un adversaire pénétrant sa zone de contrôle.', NULL, 'Action de mouvement :<br/>Aucune épreuve pour se préparer', '-', NULL),
(42, 'Double estoc', 'Le lancier frappe deux fois de la pointe de sa lance', '-', 'Autant de jets que d\'attaques réussies', NULL, 'Action complexe :<br/>1er coup : Attaque classique<br/>2ème coup : Jet d\'Atq à -10', 'Parade/Esquive classique pour chaque frappe', NULL),
(43, 'Triple estoc', 'Le lancier délivre un déluge d\'estoc sur son adversaires et frappe trois fois', '-', 'Autant de jets que d\'attaques réussies', NULL, 'Action complexe :<br/>1er coup : Attaque classique, malus de -10 par attaque supplémentaire', 'Parade/Esquive classique pour chaque frappe', NULL),
(44, 'Frappe lourde', 'Le martelier envoie son adversaire au sol en le frappant avec un force surhumaine', 'FOR du martelier supérieure à celle de sa cible', 'Dégâts x1,5, cible mise au sol et envoyée à 1m + 1m par 10 points de marge de réussite.', NULL, 'Action complexe<br/>Atq à -10', 'VIG pour résister à la mise au sol', NULL),
(45, 'Destruction', 'Le martelier tente de briser l\'équipement de son adversaire avec son arme', 'Rupture du martelier supérieure à l\'adversaire', 'L\'équipement ciblé est endommagé (arme: Atq et Prd -10,Dgt -2; armure : PR -2)', NULL, 'Action simple :<br/>FOR', 'AGI pour l\'armure ou DEX pour l\'arme suivi d\'un test de rupture', NULL),
(46, 'Coup étourdissant', 'Le moine frappe son adversaire au visage pour l\'étourdir', '-', 'La cible est étourdie', NULL, 'Action complexe :<br/>Jet d\'Atq à -10', 'VIG pour résister', NULL),
(47, 'Enchaînement', 'Le moine enchaîne les coups et frappe deux fois avec son bâton', '-', 'Autant de jets que d\'attaques réussies', NULL, 'Action complexe :<br/>1er coup : Attaque classique<br/>2ème coup : Jet d\'Atq à -10', 'Parade/Esquive classique pour chaque frappe', NULL),
(48, 'Enchaînement supérieur', 'Le moine délivre un déluge de coups sur son adversaires et frappe trois fois avec son bâton', '-', 'Autant de jets que d\'attaques réussies', NULL, 'Action complexe :<br/>1er coup : Attaque classique, malus de -10 par attaque supplémentaire', 'Parade/Esquive classique pour chaque frappe', NULL),
(49, 'Tir précis', 'Le pistolier prend son temps pour viser sa cible', '-', 'Dégâts normaux', NULL, 'Action complexe :<br/>Tir à +15', '-', NULL),
(50, 'Tir déstabilisant', 'Le pistolier prépare un tir particulièrement puissant avec une charge de poudre supplémentaire pour faire chuter sa cible', '2 doses de poudre au lieu d\'une', 'La cible est à terre', NULL, 'Action complexe :<br/>Tir classique', 'VIG pour ne pas tomber', NULL),
(51, 'Tir rapide', 'Le pistolier effectue un tir rapide à la hanche', '-', 'Dégâts normaux', NULL, 'Action bonus :<br/>Tir à -10', '-', NULL),
(52, 'Tir précis', 'Le tirailleur prend son temps pour viser sa cible', '-', 'Dégâts normaux', NULL, 'Action complexe :<br/>Tir à +15', '-', NULL),
(53, 'Harcelement', 'Le tirailleur harcèle ses adversaires avec trois tirs consécutifs', '-', 'Dégâts normaux', NULL, 'Action complexe :<br/>Tir classique pour le premier, les tirs suivants subissent un malus de -10 par tir consécutif', '-', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bestiaire`
--

DROP TABLE IF EXISTS `bestiaire`;
CREATE TABLE IF NOT EXISTS `bestiaire` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Force` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dexterite` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Agilite` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Vigueur` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Intelligence` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Volonte` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Perception` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Eloquence` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gabarit` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Blessures_max` int(11) NOT NULL,
  `RP` tinyint(11) NOT NULL,
  `RM` tinyint(11) NOT NULL,
  `Vitesse` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Langages` text COLLATE utf8mb4_unicode_ci,
  `Competences` text COLLATE utf8mb4_unicode_ci,
  `Traits` text COLLATE utf8mb4_unicode_ci,
  `Attaques` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Capacites` text COLLATE utf8mb4_unicode_ci,
  `Menace` tinyint(4) NOT NULL,
  `Cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sous_cat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bestiaire`
--

INSERT INTO `bestiaire` (`Id`, `Nom`, `Image`, `Description`, `Force`, `Dexterite`, `Agilite`, `Vigueur`, `Intelligence`, `Volonte`, `Perception`, `Eloquence`, `Gabarit`, `Blessures_max`, `RP`, `RM`, `Vitesse`, `Langages`, `Competences`, `Traits`, `Attaques`, `Capacites`, `Menace`, `Cat`, `Sous_cat`) VALUES
(1, 'A', 'Bulvak.png', 'Gros élan du Nord', '1d10', '1d4', '1d6', '1d6', '1d6', '1d6', '1d6', '1d6', 'Grand (G)', 2, 4, 3, '6', NULL, 'Adepte : Athlétisme;\nNovice : Survie', 'Résistance(Froid,2) : une épaisse fourrure protège le Bulvak des températures les plus froides ;\nVulnérabilité(Poison,1)', 'Épée longue/1d8+1/Moyenne/-;Lance/1d6+1/Longue/Sentinelle, Anti-large', 'Charge : Si le bulvak parcourt plus de 10m en ligne droite et percute un adversaire avec ses bois, l\'attaque est considéré comme une charge et la cible doit réussir un jet de Vigueur ou d\'Agilité ou être mise à terre.;Cuir épais : réduit les dégâts des flèches de 2', 0, 'Bêtes', '145'),
(2, 'B', 'Bulvak.png', 'Gros élan du Nord', '1d10', '1d4', '1d6', '1d6', '1d6', '1d6', '1d6', '1d6', 'Grand (G)', 2, 4, 3, '6', NULL, 'Adepte : Athlétisme;\r\nNovice : Survie', 'Résistance(Froid,2) : une épaisse fourrure protège le Bulvak des températures les plus froides ;\r\nVulnérabilité(Poison,1)', 'Épée longue/1d8+1/Moyenne/-;Lance/1d6+1/Longue/Sentinelle, Anti-large', 'Charge(Si le bulvak parcourt plus de 10m en ligne droite et percute un adversaire avec ses bois, l\'attaque est considéré comme une charge et la cible doit réussir un jet de Vigueur ou d\'Agilité ou être mise à terre.);Cuir épais(réduite les dégâts des flèches de 2)', 0, 'Bêtes', '145'),
(3, 'desc_Bulvak', 'Bulvak.png', 'Les bulvaks c\'est des élans.\n\n<i>des gros élans</i>', '1d10', '1d4', '1d6', '1d6', '1d6', '1d6', '1d6', '1d6', 'Grand (G)', 2, 4, 3, '6', NULL, 'Adepte : Athlétisme;\r\nNovice : Survie', 'Résistance(Froid,2) : une épaisse fourrure protège le Bulvak des températures les plus froides ;\r\nVulnérabilité(Poison,1)', 'Épée longue/1d8+1/Moyenne/-;Lance/1d6+1/Longue/Sentinelle, Anti-large', 'Charge(Si le bulvak parcourt plus de 10m en ligne droite et percute un adversaire avec ses bois, l\'attaque est considéré comme une charge et la cible doit réussir un jet de Vigueur ou d\'Agilité ou être mise à terre.);Cuir épais(réduite les dégâts des flèches de 2)', 0, 'Bêtes', '145');

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
-- Structure de la table `objets`
--

DROP TABLE IF EXISTS `objets`;
CREATE TABLE IF NOT EXISTS `objets` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Objet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prix` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ENC` tinyint(4) NOT NULL,
  `Cat` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `objets`
--

INSERT INTO `objets` (`Id`, `Objet`, `Description`, `Prix`, `ENC`, `Cat`) VALUES
(1, 'Boite d\'allume-feu (D)', 'Silex, amorces et amadou, tout ce qu\'il faut pour allumer un feu', '5 pc', 1, 'Campement'),
(2, 'Gamelle', 'Assiette creuse accompagnée de couverts, peut également servir de casserole', '2 pc', 1, 'Campement'),
(3, 'Rations (D)', 'Aliments appropriés pour un long voyage : viande séchée, fruits secs, biscuit,...', '5 pc', 1, 'Campement'),
(4, 'Tente', 'Légère et pliable, elle permet à deux personnes de gabarit Moyen de dormir à l\'abri des intempéries', '10 pa', 2, 'Campement'),
(5, 'Sac de couchage', 'Bien enroulé et très chaud, il s\'attache facilement sur un sac à dos et permet de passer sa nuit sans grelotter', '1 pa', 1, 'Campement'),
(6, 'Couverture', 'Peut également servir de tapis de sol, elle tient moins chaud qu\'un sac de couchage mais reste indispensable pour un sommeil de qualité', '5 pc', 1, 'Campement'),
(7, 'Baril (D)', 'Petit tonneau pouvant stocker tout et n\'importe quoi.', '3 pa', 2, 'Contenants'),
(8, 'Poire à poudre (D)', 'Conteneur métallique préservant la poudre à canon de l\'humidité', '5 pa', 1, 'Contenants'),
(9, 'Fiole vide (D)', 'Petit récipient en verre d\'une contenance de 100mL', '1 pa', 0, 'Contenants'),
(10, 'Flasque vide (D)', 'Récipient en verre d\'une contenance d\'un litre', '2 pa', 1, 'Contenants'),
(11, 'Carquois (D)', 'Étui en cuir protégeant les munitions à l\'intérieur', '3 pa', 1, 'Contenants'),
(12, 'Chaîne (3 m)', 'Lourde chaîne de métal devant subir 25 dégâts avant de se briser', '35 pa', 2, 'Cordes et chaînes'),
(13, 'Corde (15 m)', 'Longue corde en chanvre devant subir 5 dégâts avant de se briser', '1 pa', 1, 'Cordes et chaînes'),
(14, 'Échelle de corde (5 m)', 'Pliable, elle s\'attache facilement sur un sac et permet de créer un passage facile sur un mur', '5 pc', 2, 'Déplacement'),
(15, 'Équipement d’escalade', 'Crampons et piolets, accorde 3 avantages pour les épreuves d\'escalade', '25 pa', 2, 'Déplacement'),
(16, 'Grappin', 'Permet de sécuriser une corde sans avoir à faire de noeuds, utile lorsque l\'on souhaite escalader une falaise', '5 pa', 1, 'Déplacement'),
(17, 'Palan', 'Système de poulies permettant de monter/descendre de lourdes charges', '3 pa', 1, 'Déplacement'),
(18, 'Bougie (D)', 'Faite de cire, cette bougie éclaire une petite zone pendant 2 heures', '1 pc', 1, 'Éclairage'),
(19, 'Lampe', 'Faite de métal, cette lampe éclaire une zone modeste et consomme une flasque d\'huile toute les 8 heure', '5 pa', 1, 'Éclairage'),
(20, 'Lanterne', 'Faite de métal, cette lanterne éclaire une grande zone, un système de miroir peut être utilisé pour créer un grand cone de lumière, elle consomme une flasque d\'huile toute les 4 heure', '10 pa', 1, 'Éclairage'),
(21, 'Torche (D)', 'Morceau de bois imbibé d\'huile, elle éclaire une zone moyenne pendant 1 heure', '1 pc', 1, 'Éclairage'),
(22, 'Craie (D)', 'Permet d\'écrire sur presque toutes les surfaces mais s\'efface avec l\'eau', '1 pc', 0, 'Écrits'),
(23, 'Grimoire', 'Imposant ouvrage relié de cuir', '20 pa', 1, 'Écrits'),
(24, 'Livre', 'Petit ouvrage relié de cuir', '15 pa', 1, 'Écrits'),
(25, 'Papier (D)', 'Permet de noter des informations quelconques', '1 pc', 0, 'Écrits'),
(26, 'Parchemin (D)', 'Permet de créer des cartes ou des parchemins magiques', '2 pc', 0, 'Écrits'),
(27, 'Plume d’écriture', 'Permet d\'écrire sur du papier ou du parchemin', '2 pc', 0, 'Écrits'),
(28, 'Encre', 'À stockée dans une fiole, à combiner avec une plume d\'écriture', '10 pa', 0, 'Écrits'),
(29, 'Poudre à canon (baril)', 'Stocké dans un baril, cette poudre est parfois utilisée pour creuser rapidement des galeries', '10 pa', 0, 'Explosifs'),
(30, 'Poudre à canon (poire)', 'Stockée dans une poire, permet de recharger une arme à feu', '3 pa', 0, 'Explosifs'),
(31, 'Parfum', 'Stocké dans une fiole, peut cacher certaines odeurs, très apprécié dans les évènements mondains', '5 pa', 0, 'Liquides'),
(32, 'Huile', 'Stockée dans une flasque, très inflammable, sert de combustible à lanterne', '5 pc', 0, 'Liquides'),
(33, 'Bélier portatif', 'Morceau de bois renforcé de métal, permet d\'enfoncer les portes avec 5 avantages', '15 pa', 2, 'Outils'),
(34, 'Crochets (D)', 'Permet de crocheter des serrures verrouillées, se casse en cas d\'échec du test', '1 po', 0, 'Outils'),
(35, 'Marteau', 'Possède un côté plat pour marteler et un arrache-clou de l\'autre côté, utile dans toute sorte de situation', '2 pa', 1, 'Outils'),
(36, 'Pelle', 'Très utile dès qu\'on veut creuser la terre', '5 pa', 2, 'Outils'),
(37, 'Pied-de-biche', 'Permet d\'ouvrir par la force les contenants scellés, accorde 2 avantages aux épreuves de Force où il est possible de faire levier', '10 pa', 2, 'Outils'),
(38, 'Pioche', 'Très utile dès qu\'on veut creuser la pierre', '5 pa', 3, 'Outils'),
(39, 'Longue-vue', 'Permet de voir 5 fois plus loin qu\'à l\'oeil nu', '5 po', 1, 'Optique'),
(40, 'Loupe', 'Permet de grossir 5 fois un objet proche ou d\'allumer un feu s\'il y a du soleil', '2 po', 0, 'Optique'),
(41, 'Balance de marchand', 'Plateaux et arrangements de poids, permet de déterminer le poids exact d\'objets inférieur à 1 kg', '25 pa', 1, 'Outils de marchand'),
(42, 'Boulier', 'Cadre de bois remplis de tiges serties de boules servant à compter rapidement de grand nombre.', '2 pa', 1, 'Outils de marchand'),
(43, 'Billes (D)', 'Petites billes recouvrant une zone de 5m x 5m une fois déversées sur le sol, les entités traversant cette zone doivent passer un test d\'Agilité ou tomber <a href=\'Glossaire.php#a_terre\'>à terre</a>', '10 pa', 1, 'Pièges'),
(44, 'Chausse-trappes (D)', 'Petits picots métalliques présentant toujours une pointe vers le haut recouvrant une zone de 2m x 2m une fois déversées sur le sol, les entités traversant cette zone doivent passer un test d\'Agilité DC 8 (DC 5 si on se déplace à la moitié de sa vitesse), sur un échec on subit une blessure. Tant qu\'elles n\'ont pas récupéré de cette blessure elles conservent cette pénalité de vitesse.', '5 pa', 1, 'Pièges'),
(45, 'Piège à mâchoires', 'Anneau d\'acier en dents de scie s\'activant via une plaque de pression et possédant une chaîne d\'un mètre, une entité activant le piège subit 2d8 dégâts perforants et écrasants et voit sa vitesse divisée par 4 si elle subit une blessure. Tant qu\'elle n\'a pas récupéré de cette blessure elle conserve cette pénalité de vitesse. Elle peut se libérer en passant un test d\'Athlétisme(Force) DC10 avec 2 désavantages.', '25 pa', 2, 'Pièges'),
(46, 'Pointes en fer (D)', 'Bâtons métalliques de 20cm possédant une tête plate et une pointe, utile dans toute sorte de situations', '1 pa', 1, 'Pièges'),
(47, 'Cadenas', 'Solide cadenas métallique, nécessite au moins 10 DR sur un test étendu de crochetage', '35 pa', 0, 'Autres'),
(48, 'Chevalière', 'Bague possédant un relief, permet d\'apposer un sceau à la cire', '20 pa', 0, 'Autres'),
(49, 'Cire à cacheter (D)', 'Petit bâton de cire à faire fondre pour cacheter des documents importants', '5 pc', 0, 'Autres'),
(50, 'Cloche', 'Cloche à main résonnant bruyamment quand secouée', '1 pa', 1, 'Autres'),
(51, 'Matériel de pêche', 'Canne, lignes, hameçons et leurres, permet de pêcher n\'importe où. Sur un test étendu de Survie(Dex) DC 5, vous lancez un dé par heure, à la fin du test, diviser le DR total par 2, c\'est le nombre de rations de poisson que vous obtenez.', '1 pa', 2, 'Autres'),
(52, 'Menottes', 'Solides attaches métalliques devant subir 10 dégâts avant de se briser, pouvant <a href=\'Glossaire.php#entrave\'>entraver</a> une créature de Gabarit Moyen ou Petit.', '25 pa', 1, 'Autres'),
(53, 'Miroir en acier', 'Petit miroir fort utile pour se recoiffer ou voir sans être vu depuis un mur en angle', '15 pa', 1, 'Autres'),
(54, 'Perche (3 m)', 'Longue perche de bois possédant de nombreuses applications', '5 pc', 2, 'Autres'),
(55, 'Pierre à aiguiser', 'Petite pierre faite pour affiner le fil d\'une lame', '3 pc', 0, 'Autres'),
(56, 'Sablier / Clepsydre', 'Petit contenant en verre contenant du sable / de l\'eau mettant un temps déterminé à s\'écouler', '25 pa', 0, 'Autres'),
(57, 'Savon (D)', 'Petit cube de savon possédant de nombreuses applications', '5 pc', 0, 'Autres'),
(58, 'Sifflet / Appeau', 'Petit sifflet émettant du bruit dans une zone donnée. Certains imitent le cri d\'un animal.', '5 pc', 0, 'Autres'),
(59, 'Trousse de soins (D)', 'Bandages, aiguille et fil de suture, tout le nécessaire pour panser des plaies. Permet de stabiliser une créature mourante sur un test de Médecine(Int ou Dex) DC 4. La créature mourante passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR de l\'utilisateur de la trousse médicale. Sur une réussite, la créature n\'est plus <a href=\'Glossaire.php#mourant\'>mourante</a> et devient <a href=\'Glossaire.php#stable\'>stable</a>.', '25 pa', 1, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `sorts`
--

DROP TABLE IF EXISTS `sorts`;
CREATE TABLE IF NOT EXISTS `sorts` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Effet` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Propriete` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `DC` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Magnitude` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sup` longtext COLLATE utf8mb4_unicode_ci,
  `Inkarnai` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ecole` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sorts`
--

INSERT INTO `sorts` (`Id`, `Effet`, `Propriete`, `DC`, `Magnitude`, `Description`, `Sup`, `Inkarnai`, `Ecole`) VALUES
(101, 'Télépathie', 'Concentration', '2', '-', 'WIP\r\nLa cible obtient le trait <a href=\'Glossaire.php#telepathe\'>Télépathe</a>.', 'Le sort perd la propriété Concentration, dure désormais une heure mais le DC est de 4.\nLa durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 6 : 1 journée ; DC 8 : 1 semaine...', 'Orizo', 'Mysticisme'),
(3, 'Aspect animal', '-', '4+2X', 'Formula 1+1X', 'La cible se métamorphose en un animal (catégorie bête ou vermine) Menace [Mag]', 'La difficulté augmente de 2 par rang de menace.', 'Kynigi', 'Altération'),
(4, 'Aisance aquatique', '-', '3+2X', 'Time une heure', 'La cible obtient le trait <a href=\'Glossaire.php#amphibien\'>Amphibien</a> et peut respirer sous l\'eau pendant [Mag].', 'Le sort perd la propriété Concentration, dure désormais une heure mais le DC est de 6.\nLa durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 8 : 1 journée ; DC 10 : 1 semaine...', 'Nero', 'Altération'),
(5, 'Marche aquatique', '-', '2+2X', 'Time une heure', 'La cible peut marcher sur l\'eau comme si elle marchait sur la terre ferme pendant [Mag].', 'Le sort perd la propriété Concentration, dure désormais une heure mais le DC est de 4.\nLa durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 6 : 1 journée ; DC 8 : 1 semaine...', 'Nero', 'Altération'),
(6, 'Chute ralentie', 'Réaction', '3+2X', 'Double 5', 'La cible ignore les [Mag] premiers mètres de sa prochaine chute lors du <a href=\'Survie.php#chutes\'>calcul des dégâts</a>.', 'La distance de chute ignorée double mais le DC augmente de 2.\nEx : DC 5 -> 10m ; DC 7 -> 20m ; DC 9 -> 40m...', 'Aïgida', 'Altération'),
(7, 'Lévitation', 'Concentration, Réaction', '6+2X', 'Double 3', 'La cible obtient une vitesse de déplacement en vol de [Mag] mètres par round.', 'La vitesse de déplacement obtenue double mais le DC augmente de 2.\nEx : DC 8 -> 6m ; DC 10 -> 12m ; DC 12 -> 24m ; DC 15 -> 48m...', 'Aïgida', 'Altération'),
(8, 'Saut', '-', '2+2X', 'Double 1', 'La cible pourra parcourir [Mag] mètre(s)s supplémentaire(s) en hauteur et le double en longueur lors de son prochain saut dans la minute qui suit l\'incantation du sort.', 'La distance double mais le DC augmente de 1.\nEx : DC 4 -> 2m hauteur ; DC 5 -> 4m hauteur ; DC 6 -> 5m hauteur...', 'Aïgida', 'Altération'),
(9, 'Verrouillage', '-', '3+3X', 'Double 5', 'La serrure ciblé devient verrouillée. Ouvrir cette serrure nécessite un test étendu de crochetage avec un DR total de [Mag].', 'Le DR total requis pour le test étendu double mais le DC augmente de 2.\nEx : DC 5 -> DR total de 10 ; DC 7 -> DR total de 20...', 'Ourgal', 'Altération'),
(10, 'Déverrouillage', '-', '3+3X', 'Double 5', 'La serrure ciblé ajoute [Mag] DR au total nécessaire à la déverrouiller.', 'Le nombre de DR ajoutés au total double mais le DC augmente de 3.\nEx : DC 5 -> 10 DR ; DC 7 -> 20 DR...', 'Ourgal', 'Altération'),
(11, 'Transmutation', '-', '10+1X', 'Dice_nb 2d4', 'Le lanceur lance [Mag] et en fait le total, si le résultat dépasse la résistance magique de la cible, elle devient métallique ou minérale. Une cible métamorphosée en pierre ou en métal est invulnérable aux dégâts du temps et son poids est multiplié par 5. L\'effet dure indéfiniment tant que la cible ne brise pas le sort.\r\nPour se libérer, la cible peut effectuer chaque jour un jet d\'Altération(Volonté ou Vigueur) avec un DC équivalent au résultat du lanceur. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut à la somme des d4 lancés initialement par le lanceur.', 'Le lanceur lance un d4 supplémentaire pour tenter de dépasser la résistance magique de la cible mais le DC augmente de 1.\nEx : DC 11 -> 3d4 ; DC 12 -> 4d4...', 'Ourgal', 'Altération'),
(12, 'Renforcement [Caractéristique]', '[Force, Dextérité, Agilité, Vigueur, Intelligence, Volonté, Perception, Éloquence]', '4+3X', 'Formula 1+1X', 'La cible voit sa [Caractéristique] augmenter de [Mag] cran(s) pendant une minute.', 'La caractéristique augmente d\'un cran supplémentaire mais le DC augmente de 2.\nEx : DC 7 -> 2 crans ; DC 9 -> 3 crans...', 'Agones(FOR, AGI, VIG), Eftis(DEX), Orizo(INT, VOL), Kynigi(PER), Psema(ÉLO)', 'Altération'),
(13, 'Affaiblissement [Caractéristique]', '[Force, Dextérité, Agilité, Vigueur, Intelligence, Volonté, Perception, Éloquence]', '4+3X', 'Formula 1+1X', 'La [Caractéristique] de la cible diminue de [Mag] crans pendant une minute.\n\nPour se libérer, la cible peut effectuer chaque round un test de la caractéristique affecté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort. ', 'La caractéristique diminue d\'un cran supplémentaire mais le DC augmente de 2.\nEx : DC 7 -> 2 crans ; DC 9 -> 3 crans...\n', 'Agones(FOR, AGI, VIG), Eftis(DEX), Orizo(INT, VOL), Kynigi(PER), Psema(ÉLO)', 'Altération'),
(14, 'Résistance [Élément]', '[Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]', '3+2X', 'Formula 1+1X', 'Procure à la cible le trait <a href=\'Glossaire.php#resistance\'>Résistance([Mag],[élément])</a>.', 'La magnitude de la résistance procurée augmente de 1 mais le DC augmente de 1.\nEx : DC 4 -> Résistance(2) ; DC 5 -> Résistance(3)...', 'Aïgida, Anathos, Horoï, Kuga, Nero, Safi', 'Altération'),
(15, 'Vulnérabilité [Élément]', 'Concentration, [Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]', '3+2X', 'Formula 1+1X', 'La cible subit le trait <a href=\'Glossaire.php#vulnerabilite\'>Vulnérabilité([Mag],[élément])</a>.\r\nPour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort. ', 'La magnitude de la vulnérabilité infligée augmente de 1 mais le DC augmente de 1.\nEx : DC 4 -> Vulnérabilité(2) ; DC 5 -> Vulnérabilité(3)...', 'Aïgida, Anathos, Horoï, Kuga, Nero, Safi', 'Altération'),
(16, 'Guérison', '-', '4', '-', 'WIP\r\nLa cible passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR du lanceur. Sur une réussite, la cible guérie d\'une blessure. Chaque palier de 3 DR de la cible soigne une blessure supplémentaire.', 'WIP', 'Agapi', 'Altération'),
(17, 'Stabilisation', '-', '4', '-', 'WIP\r\nLa cible passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR du lanceur. Sur une réussite, la cible n\'est plus <a href=\'Glossaire.php#mourant\'>mourante</a> et devient <a href=\'Glossaire.php#stable\'>stable</a>.', 'WIP', 'Agapi', 'Altération'),
(18, 'Récupération', '-', '2', '-', 'WIP\r\nLa cible passe un test de Vigueur pour les traumas Physiques ou de Volonté pour les traumas Mentaux avec un DC équivalent au triple de ses traumas physiques/mentuax et un bonus équivalent au DR du lanceur. Sur une réussite, la cible guérie d\'un trauma. Chaque palier de 3 DR de la cible soigne un trauma supplémentaire.', 'WIP', 'Agapi', 'Altération'),
(19, 'Purge', 'Concentration', '3+2X', 'AD +1', 'La cible obtient [Mag] avantages pour résister et purger les effets négatifs(Vulnérabilité, Saignement, Poison, etc..) tant que le lanceur se concentre sur le sort.', 'WIP', 'Agapi', 'Altération'),
(20, 'Invisibilité', 'Concentration', '8', '-', 'La cible devient invisible et le reste tant que le lanceur se concentre sur le sort.', 'Le sort perd la propriété Concentration et sa durée passe à une minute mais le DC est de 10.\nLa durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 12 : 1 heure ; DC 14 : 1 journée...\n', 'Safi', 'Altération'),
(21, 'Armure', '[Physique,Magique]', '4+3X', 'Formula 1+1X', 'La résistance [type] de la cible augmente de [Mag].', 'La magnitude de la résistance procurée augmente de 1 mais le DC augmente de 1.\nEx : DC 4 -> Résistance +2 ; DC 5 -> Résistance +3...', 'Pravoï', 'Conjuration'),
(27, 'Protection', 'Réaction', '3+3X', 'Double 2', 'Réduis les dégâts subis par la cible de [Mag] pour une instance de dégâts dans la minute qui suit l\'incantation du sort.', 'La réduction de dégâts augmente de 1 mais le DC augmente de 1.', 'Pravoï', 'Conjuration'),
(30, 'Entrave', 'Concentration', '4+2X', 'AD -0', 'WIP\r\nLa cible est <a href=\'Glossaire.php#immobilise\'>immobilisée</a>.\r\nPour se libérer, la cible peut effectuer chaque round un test de Force, de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort. \r\n', 'La cible subit un désavantage pour se libérer mais le DC augmente de 2.', 'Pravoï', 'Conjuration'),
(33, 'Toile d\'araignée', '-', '3+3X', 'Double 2', 'L\'endroit ciblé par le lanceur diminue la vitesse des entité le traversant de [Mag].', 'La réduction de vitesse est doublée mais le DC augmente de 3.\nEx : DC 6 -> vitesse -4 ; DC 9 -> vitesse -8 ; DC 12 -> vitesse -16...', 'Kynigi', 'Conjuration'),
(39, 'Invocation de Karnarim élémentaire', '[Acide, Eau, Feu, Foudre, Glace, Lumière, Métal, Nécrotique, Pierre, Poison, Sable, Terre]', '6', '-', 'WIP\r\n\r\nInvoque un Karnarim de l\'[élément] pendant une minute. Voir <a href=\'../World/Bestiaire.php#elementaire_mineur\'>Élémentaire mineur</a> dans le Bestiaire.', 'Le Karnarim n\'est plus mineur mais le DC passe à 12. Voir <a href=\'../World/Bestiaire.php#elementaire\'>Élémentaire</a> dans le Bestiaire.\nLe Karnarim devient majeur mais le DC passe à 18. Voir <a href=\'../World/Bestiaire.php#elementaire_majeur\'>Élémentaire majeur</a> dans le Bestiaire.', 'Aïgida, Anathos, Horoï, Kormo, Kuga, Nero, Ourgal, Safi', 'Conjuration'),
(45, 'Invocation d\'Arme', '-', '6+2X', 'Dice_scale 1d4', 'Invoque une arme infligeant [Mag] dégâts magiques à l\'endroit ciblé, cette arme peut utiliser la caractéristique de Volonté du lanceur pour les jets de Style de Combat.', 'Le dé de dégâts de l\'arme invoquée augmente d\'un <a href=\'Systeme.php#cran_des\'>cran</a> mais le DC augmente de 2.\nEx : DC 7 -> 1d6 ; DC 9 1d8...', 'Agones', 'Conjuration'),
(48, 'Projection psychique', 'Concentration', '10', '-', 'WIP\r\nL\'esprit de cible est envoyé dans un domaine de Karnaï.\r\nSans esprit pour le contrôler, le corps de la cible est inanimé pendant cette période. Une minute dans le monde matériel équivaut à une heure dans le monde de Karnaï. \r\nL\'esprit de la cible doit consentir à ce voyage ou au moins ne pas y être opposée sinon le lanceur risque de perdre son propre esprit lors de l\'incantation.', 'WIP', 'Selon le domaine visité', 'Conjuration'),
(51, 'Bannissement', '-', '0', '-', 'WIP\r\nLa cible est renvoyé dans sa dimension d\'Origine.\r\nElle doit passer un test de Vigueur ou Volonté opposé à l\'incantation du lanceur si elle souhaite résister.\r\nSi l\'invocateur de la cible est conscient de la tentative de bannissement, il peut effectuer le test à la place de la cible en utilisant sa compétence de Conjuration.', 'WIP', 'Pravoï', 'Conjuration'),
(54, 'Pas de l\'ombre', '-', '6+2X', 'Distance 10 mètres', 'La cible doit se tenir dans une ombre. Elle se téléporte dans une autre ombre située à moins de [Mag] de sa position. Si elle souhaite résister, elle doit passer un test de Volonté avec un DC équivalent au résultat du lanceur.', 'La portée de téléportation est multiplié par 10 mais le DC augmente de 2.\nEx : DC 8 -> 100 mètres ; DC 10 -> 1km...', 'Eftis', 'Conjuration'),
(57, 'Téléportation', '-', '8', 'Distance 10 mètres', 'La cible se téléporte sur une distance de [Mag] ou moins dans un éclair de lumière. Si elle souhaite résister, elle doit passer un test de Volonté avec un DC équivalent au résultat du lanceur.', 'La portée de téléportation est multiplié par 10 mais le DC augmente de 2.\nEx : DC 8 -> 100 mètres ; DC 10 -> 1km...', 'Safi', 'Conjuration'),
(60, 'Racines du monde', '-', '6', 'Distance 10 mètres', 'La cible se téléporte via les racines d\'un arbre sur une distance de [Mag] ou moins, elle doit être en contact avec un arbre en vie et réapparaître sur un autre arbre en vie. Si elle souhaite résister, elle doit passer un test de Volonté avec un DC équivalent au résultat du lanceur.', 'La portée de téléportation est multiplié par 10 mais le DC augmente de 2.\nEx : DC 8 -> 100 mètres ; DC 10 -> 1km...', 'Kormo', 'Conjuration'),
(63, 'Assaut minéral', '[Métal, Pierre, Terre, Sable]', '2+2X', 'Dice_scale d2', 'La cible subit [Mag] dégâts physiques.', 'Les dégâts augmentent d\'un <a href=\"Systeme.php#cran_des\">cran</a> mais le DC augmente de 2.\nEx : DC 4 -> 1d4 ; DC 6 -> 1d6...', 'Kormo, Ourgal', 'Conjuration'),
(66, 'Assaut élémentaire', '[Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]', '2+2X', 'Dce_scale d2', 'La cible subit [Mag] dégâts d\'[Élément].', '<a href=\"Systeme.php#cran_des\">cran</a>', 'Aïgida, Anathos, Horoï, Kuga, Nero, Safi', 'Conjuration'),
(69, 'Création élémentaire', '[Glace, Métal, Pierre, Sable, Terre]', '2+2X', 'Double 10 && Time une minute', 'L\'[élément] apparaît à l\'endroit ciblé pendant [Mag]. La création doit subir [Mag] dégâts avant de se briser.', 'La solidité de la création double et la durée du sort augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 4 -> 20 dégâts, 1 heure ; DC 6 -> 40 dégâts, 1journée...', 'Kormo, Nero, Ourgal', 'Conjuration'),
(72, 'Bourrasque', 'Concentration', '2+2X', 'Double 10', 'Invoque du vent se déplaçant à [Mag] km/h à l\'endroit ciblé, la direction du vent est au choix du lanceur.', 'La vitesse du vent double mais le DC augmente de 2.\nEx : DC 4 -> 20km/h ; DC 6 -> 40 km/h...', 'Aïgida', 'Conjuration'),
(75, 'Spores [type]', '[Paralysie, Sommeil, Fascination, Confusion,...]', '5', '-', 'WIP\r\nInvoque des spores infligeant l\'effet [type]. \r\nPour se libérer, la cible peut effectuer un test de Force, de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort. \r\nLa fréquence du test dépend du [type] :<a href=\'Glossaire.php#paralyse\'>Paralysie</a>/<a href=\'Glossaire.php#fascine\'>Fascination</a>/<a href=\'Glossaire.php#confus\'>Confusion</a> -> chaque round ; sommeil chaque minute', 'La cible subit un désavantage pour se libérer mais le DC augmente de 2.', 'Kormo', 'Conjuration'),
(78, 'Contrôle de la température', 'Concentration', '2+3X', 'Double 5', 'Augmente ou diminue la température ambiante de la cible de [Mag] C°.', 'L\'augmentation/diminution de température double mais le DC augmente de 3.\nEx : DC 5 -> ± 10C° ; DC 8 -> ± 20C°...', 'Horoï', 'Conjuration'),
(84, 'Lumière', '-', '2+2X', 'Double 5 && Time une heure', 'Génère de la lumière vive sur [Mag] mètres et de la lumière faible sur [Mag]*2 mètres de façon circulaire pendant [Mag].', 'La portée de la lumière double mais le DC augmente de 2.\nEx : DC 4 -> 10m vive ; DC 6 -> 20m vive...', 'Safi', 'Conjuration'),
(87, 'Création illusoire', '-', '3+2', 'Gabarit TP && Time une minute', 'Façonne une création intangible de la forme souhaitée avec sons et odeurs de gabarit [Mag] ou moins pendant [Mag] minute. Un test d\'Observation ou d\'Investigation avec un DC équivalent au résultat du lanceur est nécessaire pour se rendre compte de l\'illusion sans la toucher.', 'Le <a href=\'Gabarit.php#gabarit_creatures\'>gabarit</a> de l\'illusion augmente d\'une catégorie mais le DC augmente de 2.\nEx : DC 5 -> P ; DC 7 -> M...', 'Psema', 'Conjuration'),
(90, 'Réanimation', '-', '6+2X', 'Gabarit P && Time une heure', 'La cible doit être une créature inanimé de gabarit [Mag] ou moins pendant [Mag]. La créature réanimé agit comme bon lui semble.', 'Le <a href=\'Gabarit.php#gabarit_creatures\'>gabarit</a> de la créature ranimée augmente d\'une catégorie mais le DC augmente de 2.\nEx : DC 8 -> M ; DC 10 -> G...', 'Anathos', 'Domination'),
(91, 'Contrôle mental', 'Concentration', '6', '-', 'WIP\r\nLa cible passe sous le contrôle du lanceur.\r\nPour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort. ', 'La cible subit un désavantage pour se libérer mais le DC augmente de 2.', 'Kynigi(Animaux), Kormo(Plantes), Psema(Humanoïdes)', 'Domination'),
(92, 'Réécriture mémorielle', '-', '8', '-', 'WIP\r\nLa dernière minute de mémoire de la cible est modifiée par le lanceur. \r\nPour résister, la cible peut passer un test de Vigueur ou de Volonté avec un DC équivalent au résultat du lanceur.\r\nSi la modification porte sur une période minoritaire de la vie de la cible et qu\'elle est incohérente ou trop contradictoire avec le comportement habituel de la cible, elle considérera les effets du sort comme une hallucination/mauvais rêve. Dans le cas d\'une modification de grande ampleur (au moins la moitié de la vie de la cible), seules les pensés incohérentes sont perçues comme des mauvais rêves.', 'La portion de mémoire modifiée augmente d\'un <a Magie.php#cran_duree>cran</a> mais le DC augmente de 2.\nEx : DC 10 : 1 heure; DC 12 : 1 journée...', 'Psema', 'Domination'),
(93, 'Mot de pouvoir : Douleur', 'Concentration', '4+2X', 'Double 1 && AD -1', 'La cible voie sa vitesse diminuée de [Mag] et effectue toute action (sauf se libérer) avec [Mag] désavantage(s).\r\nPour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort. ', 'La réduction de vitesse double et le nombre de désavantages imposée pour les actions de la cible augmente de 1 mais le DC augmente de 2.\nEx : DC 6 -> vitesse -2 et -2 AD ; DC 8 -> vitesse -4 et -3 AD...', 'Psema', 'Domination'),
(94, 'Mot de pouvoir : Mort', '-', '15', '-', 'La cible meurt instantanément. \nPour résister, la cible peut lancer son dé de Vigueur et son dé de Volonté, en faire la somme et la comparer au résultat du lanceur.', 'WIP', 'Anathos', 'Domination'),
(95, 'Télékinésie', 'Concentration', '2+2X', 'Formula 1+1X', 'La cible obtient le trait <a href=\'Glossaire.php#telekinesiste\'>Télékinésiste([Mag])</a>.', 'La magnitude de la télékinésie augmente de 1 mais le DC augmente de 2.\nEx : DC 4 : magnitude 2 ; DC 6 : magnitude 3...', 'Agones', 'Domination'),
(96, 'Peur', '-', '5', '1 minute', 'WIP\r\nLa cible est <a href=\'Glossaire.php#effraye\'>Effrayé(lanceur)</a>.\r\nPour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort. ', 'La cible subit un désavantage pour se libérer et la durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 7 : 1 heure ; DC 9 : 1 journée...', 'Agapi(mort-vivant), Psema', 'Domination'),
(97, 'Calme', '-', '5', '1 minute', 'WIP\r\nLa cible est <a href=\'Glossaire.php#fascine\'>fasciné</a>.\r\nPour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.', 'La durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 12 : 1 heure ; DC 14 : 1 journée...', 'Psema', 'Domination'),
(98, 'Rage', '-', '5', '1 minute', 'WIP\r\nLa cible considère tout le monde comme un adversaire.\r\nPour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.', 'La durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 12 : 1 heure ; DC 14 : 1 journée...', 'Agones', 'Domination'),
(99, 'Silence', '-', '5', '1 minute', 'WIP\r\nLa cible est incapable de parler.\r\nPour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.', 'La durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 12 : 1 heure ; DC 14 : 1 journée...', 'Psema', 'Domination'),
(100, 'Apparence trompeuse', 'Concentration', '6', '-', 'WIP\r\nLa cible est perçue comme quelqu\'un d\'autre.\r\nSe rendre compte du sort nécessite de passer un test d\'Observation(Per) ou d\'Arcanes(Int ou Per) avec un DC équivalent au résultat du lanceur de sort.', 'Le sort perd la propriété Concentration, dure désormais une heure mais le DC est de 8.\nLa durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 10 : 1 journée ; DC 12 : 1 semaine...', 'Psema', 'Domination'),
(102, 'Archives d\'Orizo', '-', '2+2X', 'AD +1', 'Le prochain test de compétence de la cible pouvant être facilité avec des connaissances spécifiques se fera avec [Mag] avantage(s).', 'La cible obtient un avantage supplémentaire mais le DC augmente de 2.', 'Orizo', 'Mysticisme'),
(103, 'Détection de la vie / des morts / de la magie', '-', '3+1X', 'Double 10', 'Détecte les être vivants / les morts / la magie dans un rayon de [Mag] mètres du point d\'impact du sort.', 'Aux cercles supérieurs, la portée de détection double pour chaque cercle au dela du premier', 'Kynigi(vie), Anathos(morts), Orizo(magie)', 'Mysticisme'),
(104, 'Vision véritable', 'Concentration', '6', '-', 'WIP\r\nLa cible voit tout, même les entités invisibles, peut voir dans le noir le plus complet et même dans une obscurité magique.\r\nLa cible peut voir grâce à ce sort même si elle est aveugle.', 'Le sort perd la propriété Concentration, dure désormais une heure mais le DC est de 8.\nLa durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 10 : 1 journée ; DC 12 : 1 semaine...', 'Orizo', 'Mysticisme'),
(105, 'Destinée', '-', '6+2X', 'Dice_nb 2d6', 'Le lanceur peut ajouter/enlever le résultat d\'un des dés lancés par ce sort pour modifier le résultat de n\'importe quel test. (Le lanceur doit annoncer l\'utilisation d\'un dé pré-tiré avant que le dé ne soit lancé).', 'WIP', 'Tychi', 'Mysticisme'),
(106, 'Augure', '-', '5', '-', 'La cible est avertie de son futur proche. (fortune, péril, les deux ou rien).', 'WIP', 'Tychi', 'Mysticisme'),
(107, 'Prophétie', '-', '10', '-', 'La cible obtient une réponse fiable sur un évènement à venir dans les 7 jours. (avoir recours à cet effet sans 7 jours d\'intervalles augmente de 25% les chances de réponse aléatoires).', 'WIP', 'Tychi', 'Mysticisme'),
(108, 'Communion avec la nature', '-', '6', '-', 'La cible obtient trois informations sur son environnement.', 'WIP', 'Kormo et Kynigi', 'Mysticisme'),
(109, 'Localisation d\'entité', 'Concentration', '4+2X', 'Distance 100 mètres', 'La cible connait la position de l\'entité de son choix dans un rayon de [Mag].', 'La portée de localisation est multiplié par 10 mais le DC augmente de 2.\nEx : DC 6 -> 1 km; DC 8-> 10km...', 'Kynigi', 'Mysticisme'),
(110, 'Langue enchantée', 'Concentration', '4', '-', 'La cible sait parler dans toute les langues tant que le lanceur se concentre sur le sort.', 'WIP', 'Orizo', 'Mysticisme'),
(111, 'Lien sensoriel', 'Concentration', '6+2X', 'Distance 100 mètres', 'La cible peut voir/entendre/sentir à travers les sens d\'une créature consentante dans un rayon de [Mag].', 'La portée du lien est multiplié par 10 mais le DC augmente de 2.\nEx : DC 8 -> 1 km; DC 10-> 10km...', 'Kynigi', 'Mysticisme');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
