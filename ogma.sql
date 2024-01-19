-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 nov. 2023 à 20:55
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

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

CREATE TABLE `armes` (
  `Id` varchar(250) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Type_degats` varchar(50) NOT NULL,
  `Degats` varchar(10) NOT NULL,
  `Maniabilite` varchar(5) NOT NULL,
  `Portee` varchar(20) NOT NULL,
  `Propriete` text NOT NULL,
  `Categorie` varchar(50) NOT NULL,
  `ENC` tinyint(4) NOT NULL,
  `Prix` smallint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `armes`
--

INSERT INTO `armes` (`Id`, `Type`, `Type_degats`, `Degats`, `Maniabilite`, `Portee`, `Propriete`, `Categorie`, `ENC`, `Prix`) VALUES
('dague', 'Dague', 'Perforants ou Tranchants', '1d4', '1M', 'Courte', 'Dard, Lancer(10), Petite', 'Lames', 1, 20),
('dague_parade', 'Dague de parade', 'Perforants', '1d4', '1M', 'Courte', 'Dard, Défensive, Petite', 'Lames', 1, 25),
('epee_courte', 'Épée Courte', 'Tranchants ou Perforants', '1d6', '1M', 'Moyenne', 'Dard', 'Lames', 1, 50),
('epee_courbe', 'Épée Courbe', 'Tranchants', '1d6', '1M', 'Moyenne', 'Duel', 'Lames', 1, 50),
('rapiere', 'Rapière', 'Perforants', '1d6', '1M', 'Moyenne', 'Duel', 'Lames', 1, 50),
('epee_longue', 'Épée Longue', 'Tranchants ou Perforants', '1d8', '1M', 'Moyenne', '-', 'Lames', 2, 75),
('grande_epee', 'Grande épée', 'Tranchants ou Perforants', '1d12', '2M', 'Longue', 'Impact, Peu maniable', 'Lames', 3, 100),
('hachette', 'Hachette', 'Tranchant', '1d4', '1M', 'Courte', 'Lancer(10), Petite', 'Haches', 1, 15),
('hache_guerre', 'Hache de guerre', 'Tranchant', '1d8', '1M', 'Moyenne', 'Brise-bouclier, Peu maniable', 'Haches', 2, 60),
('grande_hache', 'Grande hache', 'Tranchant', '1d12', '2M', 'Longue', 'Brise-bouclier, Impact, Peu maniable', 'Haches', 3, 75),
('maillet', 'Maillet', 'Écrasants', '1d4', '1M', 'Courte', 'Lancer(10), Petite', 'Masses et marteaux', 1, 15),
('masse', 'Masse', 'Écrasants', '1d8', '1M', 'Moyenne', 'Peu maniable', 'Masses et marteaux', 1, 50),
('grand_marteau', 'Grand marteau', 'Écrasants', '1d12', '2M', 'Longue', 'Brise-bouclier, Peu maniable, Impact', 'Masses et marteaux', 3, 75),
('javelot', 'Javelot', 'Perforants', '1d4', '1M', 'Longue', 'Lancer(20)', 'Armes d\'hast', 2, 20),
('lance', 'Lance', 'Perforants', '1d6', '1M', 'Très Longue', 'Anti-Large, Sentinelle', 'Armes d\'hast', 2, 25),
('pique', 'Pique', 'Perforants', '1d10', '2M', 'Extrême', 'Anti-Large, Sentinelle, Peu maniable', 'Armes d\'hast', 3, 25),
('hallebarde', 'Hallebarde', 'Tranchants ou Perforants', '1d10', '2M', 'Très Longue', 'Anti-Large, Sentinelle', 'Armes d\'hast', 3, 100),
('lance_arcon', 'Lance d\'arçon', '-', '1d10', '1M', 'Extrême', 'Montée, Peu maniable, Perce-armure(3)', 'Armes d\'hast', 3, 50),
('fouet', 'Fouet', 'Tranchants', '1d4', '1M', 'Très Longue', 'Petite', 'Diverses', 1, 10),
('baton', 'Bâton', 'Écrasants', '1d4', '1M', 'Longue', '-', 'Diverses', 2, 1),
('ceste', 'Ceste', 'Écrasants', '1d4', '1M', 'Courte', 'Petite', 'Diverses', 1, 5),
('pistolet_poche', 'Pistolet de poche', 'Perforants et écrasants', '1d6', '1M', '50m', 'Rechargement(2 min 1), Peu maniable, Perce-armure(1), Petite', 'Armes de poing', 1, 100),
('arbalete_lourde', 'Arbalète lourde', 'Perforants', '1d12', '2M', '200m', 'Rechargement(3 min 1), Peu maniable, Perce-armure(4)', 'Arcs et arbalètes', 3, 100),
('arbalete_main', 'Arbalète à main', 'Perforants', '1d6', '1M', '50m', 'Rechargement(1 min 1)', 'Arcs et arbalètes', 1, 75),
('arbalete', 'Arbalète', 'Perforants', '1d10', '2M', '150m', 'Rechargement(2 min 1), Peu maniable, Perce-armure(2)', 'Arcs et arbalètes', 3, 50),
('arc_long', 'Arc Long', 'Perforants', '1d8', '2M', '150m', 'Rechargement(1), Peu maniable', 'Arcs et arbalètes', 2, 75),
('sarbarcane', 'Sarbacane', 'Perforants', '1d4', '1M', '30m', '-', 'Armes à distance diverses', 1, 1),
('arc_court', 'Arc Court', 'Perforants', '1d6', '2M', '100m', '-', 'Arcs et arbalètes', 2, 50),
('fronde', 'Fronde', 'Écrasants', '1d4', '1M', '100m', '-', 'Armes à distance diverses', 1, 5),
('flechette', 'Fléchettes de lancer', 'Perforants', '1d4', '1M', '15m', 'Lancer(15), Petite', 'Armes de jet', 0, 5),
('etoile', 'Étoiles de lancer', 'Tranchants', '1d4', '1M', '15m', 'Lancer(15), Petite', 'Armes de jet', 0, 5),
('pistolet', 'Pistolet à silex', 'Perforants et écrasants', '1d8', '1M', '100m', 'Rechargement(2 min 1), Peu maniable, Perce-armure(2)', 'Armes de poing', 1, 100),
('pistolet_double', 'Pistolet à double canon', 'Perforants et écrasants', '1d8', '1M', '100m', 'Chargeur(2), Rechargement(2 min 1), Peu maniable, Perce-armure(2)', 'Armes de poing', 1, 150),
('poivriere', 'Poivrière', 'Perforants et écrasants', '1d8', '1M', '100m', 'Chargeur(6), Rechargement(2 min 1), Peu maniable, Perce-armure(2)', 'Armes de poing', 1, 300),
('petoire', 'Pétoire', 'Perforants et écrasants', '1d6', '1M', '15m', 'Rechargement(3 min 1), Peu maniable, Perce-armure(1), Zone(2)', 'Armes de poing', 1, 100),
('mousqeut', 'Mousquet', 'Perforants et écrasants', '1d12', '2M', '200m', 'Rechargement(3 min 1), Peu maniable, Perce-armure(4)', 'Armes d\'épaule', 3, 150),
('mousquet_double', 'Mousquet à double canon', 'Perforants et écrasants', '1d12', '2M', '200m', 'Chargeur(2), Rechargement(3 min 1), Peu maniable, Perce-armure(4)', 'Armes d\'épaule', 3, 175),
('tromblon', 'Tromblon', 'Perforants et écrasants', '1d8', '2M', '15m', 'Rechargement(3 min 1), Peu maniable, Perce-armure(2), Zone(3)', 'Armes d\'épaule', 3, 150);

-- --------------------------------------------------------

--
-- Structure de la table `armes_categories`
--

CREATE TABLE `armes_categories` (
  `id` varchar(250) NOT NULL,
  `Categorie` varchar(250) NOT NULL,
  `Description` text NOT NULL,
  `Effet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `armes_categories`
--

INSERT INTO `armes_categories` (`id`, `Categorie`, `Description`, `Effet`) VALUES
('arbalete', 'Arbalète', '', 'Si la cible est adjacente à une surface, le projectile l\'immobilise sur place, la cible peut dépenser une action interagir pour se libérer avec un test d\'Athlétisme avec un DC équivalent à la moitié des dégâts'),
('arc', 'Arc', '', 'Si la cible est adjacente à une surface, le projectile l\'immobilise sur place, la cible peut dépenser une action interagir pour se libérer avec un test d\'Athlétisme avec un DC équivalent à la moitié des dégâts'),
('baton', 'Bâton', '', 'La cible doit passer un test de Vigueur avec un DC équivalent à la moitié des dégâts ou être étourdie(1)'),
('ceste', 'Ceste', '', 'La cible est entravée, une lutte est instancié'),
('dague', 'Dague', '', 'Ignore la PR de la cible'),
('epee', 'Épée', '', 'La cible ne peut pas prendre de réaction tant qu\'elle est engagée avec l\'assaillant jusqu\'au début du prochain tour de l\'assaillant'),
('fleau', 'Fléau', '', 'La cible est entravée, une lutte est instancié'),
('fouet', 'Fouet', '', 'La cible est entravée, une lutte est instancié'),
('fronde', 'Fronde', '', 'La cible doit passer un test de Vigueur avec un DC équivalent à la moitié des dégâts ou être étourdie(1)'),
('hache', 'Hache', '', 'L\'attaque se poursuit sur une cible à portée, c\'est un nouvelle passe d\'armes qui subit un désavantage supplémentaire par rapport à la précédente'),
('lance', 'Lance', '', 'La cible est repoussé d\'un mètre par tranche de 3 dégâts\r\n'),
('masse', 'Masse', '', 'La cible doit passer un test de Vigueur avec un DC équivalent à la moitié des dégâts ou être étourdie(1)');

-- --------------------------------------------------------

--
-- Structure de la table `armes_proprietes`
--

CREATE TABLE `armes_proprietes` (
  `id` varchar(250) NOT NULL,
  `propriete` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `effet` text NOT NULL,
  `Exemple` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `armes_proprietes`
--

INSERT INTO `armes_proprietes` (`id`, `propriete`, `description`, `effet`, `Exemple`) VALUES
('anti_large', 'Anti-Large', 'Cette arme est faite pour affronter des ennemis plus larges que soi.', 'Les jets d\'attaques pour toucher les cibles d\'un gabarit supérieur à celui de l\'utilisateur se font avec 1 avantage.', ''),
('brise_bouclier', 'Brise-bouclier', 'Cette arme est très efficace contre les boucliers.', 'Les boucliers bloquant une attaque d\'une arme possédant cette propriété voient leur RB divisée par 2 lors du blocage.', ''),
('capacite', 'Capacité(X)', 'Disposant de plusieurs canons ou d\'un autre mécanisme similaire, cette arme peut tirer avec chacun d\'entre eux avant de devoir recharger.', 'L\'arme peut tirer X fois sans être rechargé, chaque mécanisme doit être rechargé individuellement selon la valeur de Rechargement de l\'arme.', ''),
('chargeur', 'Chargeur(X, Y)', 'Disposant d\'un mécanisme avancé de chargement des munitions, cette arme peut tirer plusieurs fois sans être rechargée et il suffit de remplacer le chargeur pour que l\'arme soit de nouveau complétement opérationnelle', 'L\'arme peut tirer X fois sans être rechargée.<br/>Remplacer le chargeur coute Y action(s) Interagir, il n\'est pas nécessaire qu\'elles soient consécutives.<br>Si l\'arme possède le trait Rechargement(Z), il est nécessaire d\'effectuer Z action(s) Interagir après un tir avant de pouvoir tirer à nouveau.', ''),
('dard', 'Dard', 'Cette arme est capable de trouver des failles dans l\'armure de sa cible.', 'Les jets d\'attaque avec un DR supérieur ou égal à 4 ignore l\'armure de la cible.', ''),
('defensive', 'Défensive', 'Étudiée pour protéger son manieur, cette arme facilite les manœuvres défensives', 'Lors d\'une passe d\'arme défensive, l\'arme procure un avantage aux jets de Style de Combat.', ''),
('dentelee', 'Dentelée(X)', 'Une lame terrifiante en dent de scie, capable d\'infliger de terribles saignements à sa cible.', 'L\'arme inflige un état Saignement(X) lorsqu\'elle inflige une blessure', ''),
('desequilibree', 'Déséquilibrée', 'De part son poids ou sa forme, cette arme rend les manœuvres défensives plus complexes', 'Lors d\'une passe d\'armes défensive, l\'arme impose un désavantage aux jets de Style de Combat.', ''),
('destructrice', 'Destructrice(X)', 'Particulièrement efficace pour endommager du matériel, cette arme peut rapidement transformer une armure en une boite de conserver, une arme en un joujou inoffensif ou une porte en un tas de brindilles.', 'L\'arme inflige X dégâts supplémentaires aux objets.', 'Une hache d\'incendie Destructrice(3) frappe une porte de Solidité(15), le DC est à 5.\nL\'utilisateur de la hache obtient 9 à son test et obtient donc un DR de +4\nLe jet de dégât de la hache est un 10, le total des dégâts est 10+4+3 = 17.\nLa porte subit donc 17 dégâts, cela excède sa solidité, elle est détruite.'),
('dispersion', 'Dispersion', 'Les projectiles tiré par cette arme se dispersent rapidement et perdent en efficacité à longue distance, ils sont dévastateurs à bout portant', 'L\'arme gagne un bonus de +2 pour toucher dans son premier cran de portée, la pénalité subit après le premier cran et doublée (-2 au lieu de -1)', 'Une arme à dispersion avec un cran de portée de 5m dispose d\'un bonus de +2 pour atteindre les cibles à moins de 5m.\r\nEn contrepartie, elle subit un malus de -2 pour une cible située entre 5 et 10m, un malus de -4 pour une cible entre 10 et 15m et ainsi de suite'),
('duel', 'Duel', 'Cette arme est faite pour le duel.', ' Les jets de Style de Combat se font avec un avantage en combat singulier, mais un désavantage en infériorité numérique.', ''),
('excellence', 'Excellence', 'Cette arme est d\'une qualité supérieure', 'Les jets de dégâts lancent deux fois les dés et ne gardent que le meilleur de deux résultats.\nDans le cas d\'une arme avec plusieurs dés de dégâts, on lance deux fois le groupe de dés et on conserve le meilleur groupe', 'Une arme d\'excellence (Dgt 1d8) lance deux fois son dé de dégâts et obtient 3 et 5. Son utilisateur peut choisir le résultat qu\'il préfère.\r\nUne arme d\'excellence (Dgt 2d4) lance deux fois la paire de dés et obtient deux résultats 1+3 ou 2+4. Son utilisateur choisit d\'infliger 4 ou 6 dégâts selon sa préférence. '),
('force', 'Force', 'Maniée par un puissant mage, ces armes sont dévastatrices', 'L\'arme gagne un bonus aux dégâts équivalent à la compétence magique (Altération, Domination, Invocation) la plus élevé du manieur', ''),
('impact', 'Impact', 'Les coups délivrés par cette arme peuvent envoyer valser leur cible', 'La cible est déplacée d\'un mètre par tranche de 3 dégâts, déplacement forcé, directions possibles : gauche droite, arrière', ''),
('lancer', 'Lancer(X)', 'Cette arme est suffisamment équilibrée pour être lancée.', ' L\'arme possède un cran de portée équivalent à X. Un lancer d\'arme est traité comme une attaque à distance normale (mais la Force peut être utilisée pour le test de Style de Combat). Le dé de dégâts de l\'arme augmente d\'un <a href=\'Systeme.php#cran_des\'>cran</a> si elle est lancée', ''),
('lunette', 'Lunette(X)', 'Un système complexe de lentilles est monté sur l\'arme, permettant des tirs à très longue distance', 'La pénalité de portée ne s\'applique pas sur les X premiers crans de portée au delà du premier et s\'applique normalement ensuite.\nCet effet n\'est pas applicable sur une arme effectuant une attaque à Dispersion.', 'Une arme à Lunette(1) avec un cran de portée de 20m ne subit aucun malus pour atteindre des cibles situées à moins de 40m. Elle subit un malus de -1 pour les cibles entre 40 et 60m.\r\nSi elle possède une Lunette(3), elle ne subirait pas de malus pour les cibles à moins de 80m et un malus de -1 pour les cibles entre 80 et 100m.'),
('montee', 'Montée', 'Sur le dos d\'une monture, cette arme s\'avère remarquable', 'Cette arme n\'est utilisable que depuis une monture pour des raisons de poids et de maniabilité.\nL\'attaque se fait lors d\'une charge.', ''),
('perce_armure', 'Perce-Armure(X)', 'Les frappes de cette arme sont d\'une telle puissance qu\'elle ne fait pas grand cas de l\'armure de ses victimes', 'L\'arme ignore X PR de la cible qu\'importe les conditions.', ''),
('petite', 'Petite', 'Relativement petite, facilement dissimulable, une arme de choix pour un roublard digne de ce nom', 'L\'arme ne peut être utilisée pour parer les coups des armes maniées à deux mains. \nL\'utilisateur peut passer un test de Roublardise opposé à l\'Observation de l\'adversaire pour dissimuler l\'arme. \nCette arme n\'est pas affectée par les malus dans les espaces clos. \nAttaquer avec une arme dissimulée procure 3 avantages lors d\'une passe d\'arme.', ''),
('pointes', 'Pointes', 'L\'arme est recouverte de pointes', 'La résistance la plus faible entre le type de dégâts de base et les dégâts Perforants de la cible sont prise en compte lors du calcul des dégâts.', 'Une cible avec résistance(5, contondant) et (3, Perforant) subissant 4 dégâts d\'une arme contondante à pointes subira 4+3=7 dégâts'),
('primitive', 'Primitive', 'Cette arme est d\'une qualité inférieure', 'Les jets de dégâts lancent deux fois les dés et ne gardent que le pire de deux résultats.\nDans le cas d\'une arme avec plusieurs dés de dégâts, on lance deux fois le groupe de dés et on conserve le pire groupe.', 'Une arme primitive (Dgt 1d10) lance deux fois son dé de dégâts et obtient 4 et 9, son utilisateur n\'a pas le choix et doit choisir le 4.\nUne arme primitive (Dgt 2d6) lance deux fois la paire de dés et obtient deux résultats 2+3 ou 5+4. l\'arme inflige 5 dégâts. '),
('rechargement', 'Rechargement(X)', 'Cette arme doit être rechargée avant d\'être utilisée', 'L\'arme nécessite X action Interagir avant de pouvoir tirer à nouveau.', ''),
('sentinelle', 'Sentinelle', 'L\'arme est doté d\'un pouvoir d\'arrêt impressionnant', 'La cible d\'une frappe voit sa vitese réduite d\'un montant équivalent à la moitié des dégâts jusqu\'au début du prochain tour de l\'assaillant.', ''),
('zone', 'Zone(Y, X)', 'Au lieu d\'une cible unique, cette arme est capable d\'en atteindre plusieurs d\'une seule frappe', 'La frappe touche toutes les cibles présentent dans une zone de type Y avec une magnitude X.\nL\'assaillant effectue une passe d\'arme contre chacune des cibles et conserve le même jet d\'attaque et jet de dégâts pour toutes les cibles.', '');

-- --------------------------------------------------------

--
-- Structure de la table `armures`
--

CREATE TABLE `armures` (
  `Id` varchar(250) NOT NULL,
  `Materiau` varchar(50) NOT NULL,
  `PR` tinyint(11) NOT NULL,
  `PR_mag` tinyint(11) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Categorie` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `armures`
--

INSERT INTO `armures` (`Id`, `Materiau`, `PR`, `PR_mag`, `Prix`, `Categorie`) VALUES
('peau', 'Peau', 1, 0, 75, 'Légère'),
('cuir', 'Cuir', 2, 0, 150, 'Légère'),
('alkite', 'Alkite', 3, 1, 375, 'Légère'),
('kusni', 'Kusni', 4, 2, 1000, 'Légère'),
('gnistar', 'Gnistar', 5, 3, 1800, 'Légère'),
('chitine', 'Chitine', 2, 0, 100, 'Intermédiaire'),
('os', 'Os', 3, 1, 200, 'Intermédiaire'),
('nilaroy', 'Nilaroy', 4, 2, 500, 'Intermédiaire'),
('adamantine', 'Adamantine', 5, 3, 1200, 'Intermédiaire'),
('lakma', 'Lakma', 6, 4, 2500, 'Intermédiaire'),
('fer', 'Fer', 3, 1, 125, 'Lourde'),
('acier', 'Acier', 4, 2, 300, 'Lourde'),
('shoren', 'Shoren', 5, 3, 750, 'Lourde'),
('orichalque', 'Orichalque', 6, 4, 1500, 'Lourde'),
('skymma', 'Skymma', 7, 5, 3000, 'Lourde');

-- --------------------------------------------------------

--
-- Structure de la table `arts_combat`
--

CREATE TABLE `arts_combat` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(80) NOT NULL,
  `Description` text NOT NULL,
  `Conditions` text NOT NULL,
  `Effet` text NOT NULL,
  `Cout` tinyint(4) DEFAULT NULL,
  `Test_assaillant` text NOT NULL,
  `Test_defenseur` text NOT NULL,
  `Type_arme` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `bestiaire` (
  `Id` varchar(250) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Image` text NOT NULL,
  `Description` text NOT NULL,
  `Force` varchar(10) NOT NULL,
  `Dexterite` varchar(10) NOT NULL,
  `Agilite` varchar(10) NOT NULL,
  `Vigueur` varchar(10) NOT NULL,
  `Intelligence` varchar(10) NOT NULL,
  `Volonte` varchar(10) NOT NULL,
  `Perception` varchar(10) NOT NULL,
  `Eloquence` varchar(10) NOT NULL,
  `Gabarit` varchar(25) NOT NULL,
  `Blessures_max` int(11) NOT NULL,
  `RP` tinyint(11) NOT NULL,
  `RM` tinyint(11) NOT NULL,
  `Vitesse` text NOT NULL,
  `Langages` text DEFAULT NULL,
  `Competences` text DEFAULT NULL,
  `Traits` text DEFAULT NULL,
  `Attaques` text NOT NULL,
  `Capacites` text DEFAULT NULL,
  `Menace` tinyint(4) NOT NULL,
  `Cat` varchar(255) NOT NULL,
  `Sous_cat` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bestiaire`
--

INSERT INTO `bestiaire` (`Id`, `Nom`, `Image`, `Description`, `Force`, `Dexterite`, `Agilite`, `Vigueur`, `Intelligence`, `Volonte`, `Perception`, `Eloquence`, `Gabarit`, `Blessures_max`, `RP`, `RM`, `Vitesse`, `Langages`, `Competences`, `Traits`, `Attaques`, `Capacites`, `Menace`, `Cat`, `Sous_cat`) VALUES
('1', 'A', 'Bulvak.png', 'Gros élan du Nord', '1d10', '1d4', '1d6', '1d6', '1d6', '1d6', '1d6', '1d6', 'Grand (G)', 2, 4, 3, '6', NULL, 'Adepte : Athlétisme;\nNovice : Survie', 'Résistance(Froid,2) : une épaisse fourrure protège le Bulvak des températures les plus froides ;\nVulnérabilité(Poison,1)', 'Épée longue/1d8+1/Moyenne/-;Lance/1d6+1/Longue/Sentinelle, Anti-large', 'Charge : Si le bulvak parcourt plus de 10m en ligne droite et percute un adversaire avec ses bois, l\'attaque est considéré comme une charge et la cible doit réussir un jet de Vigueur ou d\'Agilité ou être mise à terre.;Cuir épais : réduit les dégâts des flèches de 2', 0, 'Bêtes', '145'),
('2', 'B', 'Bulvak.png', 'Gros élan du Nord', '1d10', '1d4', '1d6', '1d6', '1d6', '1d6', '1d6', '1d6', 'Grand (G)', 2, 4, 3, '6', NULL, 'Adepte : Athlétisme;\r\nNovice : Survie', 'Résistance(Froid,2) : une épaisse fourrure protège le Bulvak des températures les plus froides ;\r\nVulnérabilité(Poison,1)', 'Épée longue/1d8+1/Moyenne/-;Lance/1d6+1/Longue/Sentinelle, Anti-large', 'Charge(Si le bulvak parcourt plus de 10m en ligne droite et percute un adversaire avec ses bois, l\'attaque est considéré comme une charge et la cible doit réussir un jet de Vigueur ou d\'Agilité ou être mise à terre.);Cuir épais(réduite les dégâts des flèches de 2)', 0, 'Bêtes', '145'),
('3', 'desc_Bulvak', 'Bulvak.png', 'Les bulvaks c\'est des élans.\n\n<i>des gros élans</i>', '1d10', '1d4', '1d6', '1d6', '1d6', '1d6', '1d6', '1d6', 'Grand (G)', 2, 4, 3, '6', NULL, 'Adepte : Athlétisme;\r\nNovice : Survie', 'Résistance(Froid,2) : une épaisse fourrure protège le Bulvak des températures les plus froides ;\r\nVulnérabilité(Poison,1)', 'Épée longue/1d8+1/Moyenne/-;Lance/1d6+1/Longue/Sentinelle, Anti-large', 'Charge(Si le bulvak parcourt plus de 10m en ligne droite et percute un adversaire avec ses bois, l\'attaque est considéré comme une charge et la cible doit réussir un jet de Vigueur ou d\'Agilité ou être mise à terre.);Cuir épais(réduite les dégâts des flèches de 2)', 0, 'Bêtes', '145');

-- --------------------------------------------------------

--
-- Structure de la table `boucliers`
--

CREATE TABLE `boucliers` (
  `Id` int(11) NOT NULL,
  `Materiau` varchar(50) NOT NULL,
  `RB` tinyint(4) NOT NULL,
  `Prix` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Structure de la table `glossaire_etats`
--

CREATE TABLE `glossaire_etats` (
  `id` varchar(250) NOT NULL,
  `etat` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `glossaire_etats`
--

INSERT INTO `glossaire_etats` (`id`, `etat`, `description`) VALUES
('assourdi', 'Assourdi', '<p>L\'entité perd l\'usage de l\'ouïe et subit les malus suivants :</p>\r\n<ul>\r\n<li>L\'entité n\'entend plus rien</li>\r\n<li>3 désavantages aux épreuves bénéficiant de l\'ouïe</li>\r\n<li>Rate automatiquement toutes les épreuves se basant uniquement sur l\'ouïe</li>\r\n</ul>\r\n'),
('aveugle', 'Aveuglé', '<p>L\'entité perd l\'usage de la vision et subit les malus suivants :</p>\r\n<ul>\r\n<li>L\'entité ne voit plus rien</li>\r\n<li>3 désavantages aux épreuves bénéficiant de la vision</li>\r\n<li>Rate automatiquement toutes les épreuves se basant uniquement sur la vision</li>\r\n</ul>\r\n'),
('a_terre', 'À Terre', '<p>Le personnage se trouve étendu sur le sol. Sa vitesse est divisée par 2. Certaines actions comme tirer à l\'arc sont impossibles ou se font avec une grande difficulté lorsque l\'on est allongé sur le sol.</p>\r\n<p>Se coucher au sol ne coûte rien mais se relever coûte la moitié de la vitesse du personnage et provoque une attaque d’opportunité.</p>\r\n<p>Cibler une créature à terre se fait avec 2 désavantages.</p>\r\n'),
('brulure', 'Brûlure(X)', '<p>L\'entité est en feu, l\'intensité des flammes est déterminé par un nombre X. Une entité souffrant de l\'état brûlure :</p>\r\n<ul>\r\n<li>subit X points de dégâts de feu sur la partie de son corps en train de brûler. Cette quantité de dégâts augmente de 1 par round. Si le personnage subit deux sources de brûlure en même temps, les deux X se cumulent. </li>\r\n<li>doit passer un test de Volonté DCX pour entreprendre une action autre que tenter d\'éteindre le feu.</li>\r\n<li>peut tenter d\'éteindre les flammes en se roulant au sol. Cela consomme votre mouvement pour ce tour et nécessite de passer un test d\'Agilité DCX. L\'entité passe <a href=\'Glossaire.xhtml#a_terre\'>à terre</a> et perds l\'état brûlure si le test est une réussite.</li>\r\n</ul>\r\n'),
('cache', 'Caché', '<p>Le personnage est dissimulé dans son environnement et échappe à la vue de ses ennemis. Le personnage doit dépenser le double de mouvement pour se déplacer en restant caché. Les cibles qui subissent une attaque d\'une entité cachée ne peuvent se défendre mais l\'entité perd alors son état caché.</p>\r\n<p>Si le personnage entre dans la ligne de vue d\'une entité, il doit passer un test de Furtivité(Agilité) opposé à un test d\'Observation(Perception) de l\'entité. S\'il réussit, il reste caché sinon il perd cet état.</p>\r\n'),
('confus', 'Confus', '<p>Le personnage a du mal à coordonner ses mouvements et ne peut faire qu\'une action ou un déplacement lors de son tour.</p>\r\n'),
('effraye', 'Effrayé(Source)', '<p>Une créature effrayée fait tout pour s\'éloigner de la source de sa peur. Si la créature voit la source de sa peur et que son action n\'est pas de s\'en éloigner, elle effectue cette action avec 3 désavantages.</p>\r\n'),
('empoisonnement', 'Empoisonnement(X)', '<p>La créature est affectée par une toxine nocive et doit passer un test de Vigueur DC X au début de chacun de ses tours, si elle échoue, elle subit une blessure. La magnitude de l\'Empoisonnement diminue de 1 à la fin du tour de l\'entité.</p>\r\n<p>Une créature empoisonnée effectue tous ses tests avec un nombre de désavantages équivalent à la moitié de l\'amplitude de l\'empoisonnement.</p>\r\n<p>Il est possible de réduire la magnitude de l\'Empoisonnement en passant un test de Medicine DC X, en cas de réussite, la magnitude de l\'Empoisonnement est réduite du DR de ce jet. Lorsque deux sources infligent un empoisonnement, appliquez seulement celui ayant la plus grande magnitude.</p>\r\n'),
('entrave', 'Entravé', '<p>Une entité entravée est limitée dans ses mouvements par des liens. Elle se déplace à la moitié de sa vitesse et effectue toute épreuve physique avec deux désavantages.</p>\r\n'),
('etourdi', 'Étourdi', '<p>Un personnage étourdi laisse tomber ce qu’il avait en main, ne peut intenter aucune action et se défend avec 2 désavantages durant toute cette période.</p>\r\n'),
('fascine', 'Fasciné', '<p>Une créature est fascinée par un sort ou un effet surnaturel. Tant que l’effet persiste, une créature fascinée reste assise ou debout, dans l’incapacité d’effectuer d’autre action que se concentrer sur l’effet en question. Elle subit 2 désavantages sur tous les jets. L’arrivée d’une menace potentielle (comme une créature hostile) donne droit à un nouveau jet pour contrer l’effet de fascination. Toute menace évidente, comme dégainer une arme, lancer un sort ou tirer sur la créature, rompt immédiatement l’effet de fascination. En dépensant sa réaction, il est possible de secouer une créature fascinée pour lui faire reprendre ses esprits.</p>\r\n'),
('immobilise', 'Immobilisé', '<p>Une créature immobilisée ne peut plus se déplacer. Elle peut effectuer toute action n\'incluant pas de déplacement.</p>\r\n'),
('inconscient', 'Inconscient', '<p>Un personnage inconscient est incapable de faire quoi que ce soit et s\'effondre à terre sauf s\'il est maintenu dans une autre position.</p>\r\n'),
('invisible', 'Invisible', '<p>Les créatures invisibles ne peuvent être vues. Les personnages ratent automatiquement les jets pour les détecter basés sur la vision. Attaquer une entité invisible se fait avec 3 désavantages, et ce, même si on sait à peu près ou elle se trouve.</p>\r\n'),
('maitrise_paralysie', 'Maîtrisé / Paralysé', '<p>Un personnage maîtrisé est retenu par une créature, un piège ou un effet. Il ne peut ni bouger ni attaquer ni se défendre.</p>\r\n'),
('mort', 'Mort', '<p>Le personnage était mourant et n\'est pas parvenu à se stabiliser. La psyché du personnage quitte son enveloppe corporelle. On ne peut plus soigner un personnage mort que ce soit par des moyens ordinaires ou magiques, mais il peut être ramené à la vie par magie. Un corps sans vie se décompose normalement si on ne le préserve pas.</p>\r\n'),
('mourant', 'Mourant', '<p>Le personnage est inconscient et en train de mourir. Une entité mourante ne peut pas entreprendre la moindre action et doit passer un test de Vigueur DC 1 par minute ou à chaque fois qu\'elle subit des dégâts, après 3 échecs l\'entité meurt. Après 3 réussites l\'intervalle entre chaque jet passe à une heure, après 3 autres réussites, l\'entité devient stable et n\'est plus mourante.</p>\r\n<p>Un personnage mourant peut être stabilisé par l\'intervention d\'une personne extérieure.</p>\r\n'),
('ralenti', 'Ralenti', '<p>Une créature ralentie se déplace à la moitié de sa vitesse.</p>\r\n'),
('saignement', 'Saignement(X)', '<p>La créature saigne abondamment et doit passer un test de Vigueur DC X au début de chacun de ses tours, si elle échoue, elle subit une blessure. La magnitude du Saignement diminue de 1 à la fin du tour de l\'entité.</p>\r\n<p>Une créature qui saigne effectue tous ses tests avec un nombre de désavantages équivalent à la moitié de l\'amplitude du saignement.</p>\r\n<p>Il est possible de réduire la magnitude du Saignement en passant un test de Medicine DC X, en cas de réussite, la magnitude du Saignement est réduite du DR de ce jet. Lorsque deux sources infligent un saignement, appliquez seulement celui ayant la plus grande magnitude.</p>\r\n'),
('stable', 'Stable', '<p>Le personnage a été stabilisé, il n’est plus mourant mais reste inconscient. Un personnage stable redevient conscient après 2d6 - la moitié du dé de Vigueur/Volonté du personnage.</p>\r\n'),
('surpris', 'Surpris', '<p>Prise de court, cette entité ne peut effectuer qu\'un mouvement ou une action et ne peut pas entreprendre de <a href=\'Combat.php#reactions\'>réactions</a>.</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `glossaire_traits`
--

CREATE TABLE `glossaire_traits` (
  `id` varchar(250) NOT NULL,
  `etat` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `glossaire_traits`
--

INSERT INTO `glossaire_traits` (`id`, `etat`, `description`) VALUES
('absorption_magique', 'Absorption magique(X)', '<p>Cette entité peut absorber la psy d\'un sort dont elle est la cible. Si cette entité vient à être touchée par un sort lancez un d10, si le résultat est inférieur ou égale à X le sort n\'a aucun effet sur la créature et elle récupère d\'un trauma.</p>\r\n'),
('amphibien', 'Amphibien', '<p>Cette entité se déplace à vitesse normale dans l\'eau, n\'est pas limité par sa compétence d\'Athlétisme et inflige des dégâts normaux lorsqu\'elle se bat dans l\'eau.</p>\r\n'),
('arme_naturelle', 'Arme naturelle(Z, X)', '<p>Une partie du corps Z de cette entité peut être utilisé comme une arme infligeant X dégâts. L\'entité ne perd l\'usage de cette arme que si elle perd cette partie de son corps.</p>\r\n'),
('artificiel', 'Artificiel', '<p>Cette entité n\'est pas vivante mais animé par d\'autres moyens. Elle n\'a besoin ni de respirer, ni d\'organes fonctionnels. Elle est immunisée aux effets tels que les maladies, les poisons, les blessures, le vieillissement, le sommeil et la fatigue.</p>\r\n'),
('debilitant', 'Débilitant(X)', '<p>Cette entité peut empoisonnée sa cible si elle inflige une perte de vitalité avec ses armes naturelles. L\'entité touchée doit passer un test de Résistance(Vig) DCX, si elle échoue, elle contracte un <a href=\'Glossaire.xhtml#empoisonnement\'>Empoisonnement</a> d\'une amplitude équivalente à son DR négatif.</p>\r\n'),
('endommage', 'Endommagé(X)', '<p>Cet objet est abîmé et tous les tests dans lesquels il est utilisé se font avec un malus de X désavantages. Si cet objet est une arme, elle inflige 1 point de dégâts en moins, si c\'est une armure, sa PR diminue de 1.</p>\r\n<p>Un objet endommagé peut être réparé pour un coût équivalent à X*10% du prix de base de l\'objet. Si la magnitude de l\'endommagement dépasse 3, cet objet est détruit.</p>\r\n'),
('estomac_solide', 'Estomac solide', '<p>Cette entité possède un estomac particulièrement tolérant vis-à-vis des aliments ingérés. Cette entité peut consommer de la viande crue et de l\'eau non purifiée sans craindre les maladies.</p>\r\n'),
('etheree', 'Éthérée', '<p>Cette entité est immatérielle, capable de passer au travers des objets et d\'apparence translucide. Elle obtient le trait Volant(Vitesse) et peuvent se déplacer librement dans l\'espace même à travers des objets solides. Elles peuvent être ciblées par des attaques mais ne subissent des dommages que de la part d’armes en virgonium, de sorts, de pouvoirs magiques et d’effets surnaturels.</p>\r\n<p>Les entités éthérées ne peuvent normalement pas interagir avec le monde matériel mais peuvent utiliser la magie et des attaques capables d\'infliger des dégâts aux êtres vivants. Ces attaques ignorent la PR des armures ne possédant pas un revêtement en virgonium et ne peuvent être bloqués ou parés par des boucliers et des armes sans ce même revêtement.</p>\r\n'),
('extraplanaire', 'Extraplanaire(Z)', '<p>Cette entité provient d\'un autre plan d\'existence noté Z. Si elle meurt, est détruite ou bannie, elle retourne dans son plan d\'origine.</p>\r\n'),
('grimpeur', 'Grimpeur(X)', '<p>Cette entité peut escalader n\'importe quel paroi qu\'importe son inclinaison à une vitesse de X mètres par tour.</p>\r\n'),
('immortel', 'Immortel', '<p>Cette entité ne subit pas les effets du vieillissement et peut vivre éternellement en bonne santé.</p>\r\n'),
('immunite', 'Immunité(X)', '<p>Cette entité est immunisé à un type de dégâts X, tous les dégâts subis par cet élément sont nullifiés. L\'entité réussit automatiquement tous les jets visant à résister à un effet provoqué par cet élément.</p>\r\n'),
('inflexible', 'Inflexible(X)', '<p>Cette entité est naturellement résistante à la magie, sa résistance magique augmente de X.</p>\r\n'),
('lien', 'Lien(Source)', '<p>Cette entité est liée par magie à son monde ou à quelqu\'un.</p>\r\n<p>Elle doit obéir aux ordres de son maître sauf s\'il s\'agit de sa défense personnelle. Elles ne pèsent pratiquement rien et l\'on considère leur encombrement comme nul (ENC0).</p>\r\n'),
('photosensibilité', 'Photosensibilité(X)', '<p>Cette entité ne supporte pas la lumière, que ce soit celle du Soleil ou de Safi. En plus de posséder une Vulnérabilité(lumière, X), cette entité doit passer un test de Vigueur DC X par heure d\'exposition à la lumière du soleil, chaque heure consécutive augmente le DC de 1. Les nuages et autres évènements météorologiques du même genre divise par deux le DC.</p>\r\n'),
('rampant', 'Rampant', '<p>Cette créature se déplace en rampant plutôt qu\'en marchant. Elle n\'est pas ralentie pas les terrains difficiles tels que les hautes herbes et les terrains mous (boue, sable humide).</p>\r\n'),
('regeneration', 'Régénération(X)', '<p>Cette entité cicatrise à une vitesse incroyable, à chaque début de round, elle lance un d10, si le résultat est inférieur ou égal à X, la créature récupère d\'une blessure.</p>\r\n'),
('resistance', 'Résistance(Z, X)', '<p>Cette entité est résistante à un type de dégâts, ce qui signifie qu\'elle subira des dommages réduits face à ce genre de dégâts. On note ainsi la résistance d\'une créature : Résistance(Z, X) où Z est l\'élément infligeant X points de dégâts en moins si la créature est touchée par cet élément.</p>\r\n<p>Ce trait accorde Z avantages aux tests réalisés pour résister à un effet de l\'élément X.</p>\r\n<p>Le trait Résistance s\'applique après toutes les autres sources de réductions de dégâts.</p>\r\n'),
('robuste', 'Robuste(X)', '<p>Cette entité est naturellement résistante aux coups, sa résistance physique augmente de X.</p>\r\n'),
('telekinesiste', 'Télékinésiste(X)', '<p>Cette entité peut manipuler des objets situés à moins de 50 mètres par la pensée. Le gabarit des objets déplaçables de cette manière dépendent de la magnitude X : 1 pour des objets Minuscules et ainsi de suite jusqu\'à 8 pour des objets Colossaux</p>\r\n<p>Cette entité peut utiliser des objets pour attaquer ses adversaires. Cette action compte comme une attaque à distance utilisant la compétence Domination(Volonté) pour le test d\'attaque. Les objets utilisés de cette manière comptent comme des <a href=\'Armes.php#armes_improvisees\'>armes improvisées</a>.</p>\r\n<p>Il est possible de déplacer des créatures sentientes via la télékinésie. Si la cible souhaite résister, elle doit passer un test de Force ou de Volonté avec un DC équivalent à la magnitude X.</p>\r\n'),
('telepathe', 'Télépathe', '<p>Cette entité peut communiquer des mots, des images ou même des sentiments par la pensée. Les entités recevant un message télépathique peuvent passer un test de Perception opposé à un test d\'Intelligence pour localiser le télépathe à l\'origine du message.</p>\r\n'),
('vision_dans_le_noir', 'Vision dans le noir', '<p>La vision dans le noir permet de voir en l’absence de source de lumière. Certaines créatures possèdent cette vision à cause de leurs sens développés spécialement pour une vie sans lumière, d\'autre la possède par magie.</p>\r\n<p>La vision dans le noir se fait uniquement en noir et blanc (elle ne permet pas de distinguer les couleurs)</p>\r\n<p>La présence de lumière n’entrave pas la vision dans le noir.</p>\r\n'),
('vision_nocturne', 'Vision nocturne', '<p>Les personnages dotés de vision nocturne ont une rétine tellement sensible que leur acuité visuelle exacerbée leur permet de voir plus distinctement que la normale dans des conditions de faible éclairage (clarté de la lune ou des étoiles, torche, etc.).</p>\r\n<p>La vision nocturne permet de voir en couleur.</p>\r\n<p>Une lumière vive et soudaine <a href=\'Glossaire.xhtml#aveugle\'>aveugle</a> les créatures ayant recours à la vision nocturne pendant 2 rounds. </p>\r\n<p>En extérieur, les personnages pourvus de vision nocturne voient aussi bien à la clarté de la lune qu’en plein jour.</p>\r\n'),
('vision_thermique', 'Vision thermique', '<p>La vision thermique permet de voir la chaleur qui émane des êtres vivants et des corps chauds. De ce fait, il est possible de voir dans le noir le plus complet les entités dégageant de la chaleur.</p>\r\n<p>La vision thermique fait apparaître les zones chaudes en rouge vif, déclinant en orange, jaune, vert puis bleu à mesure que la température diminue. L\'absence de chaleur ne produit aucune couleur.</p>\r\n'),
('vision_veritable', 'Vision véritable', '<p>La vision véritable permet de voir des choses invisibles à l\'œil nu. Ce type de vision n\'est accessible que par magie et permet de voir la psy émaner des entités d\'Ogma.</p>\r\n<p>La vision véritable fait percevoir le monde dans une teinte bleutée voire violacée et permet de voir dans le noir.</p>\r\n'),
('volant', 'Volant(X)', '<p>Cette entité peut se déplacer en volant. Elle possède une vitesse en vol de X mètres.</p>\r\n'),
('vulnerabilite', 'Vulnérabilité(Z, X)', '<p>Cette entité est vulnérable à un type de dégâts, ce qui signifie qu\'elle subira des dommages accrus face à ce genre de dégâts. On note ainsi la vulnérabilité d\'une créature : Vulnérabilité(Z, X) où Z est l\'élément infligeant X points de dégâts supplémentaires si la créature est touché par cet élément.</p>\r\n<p>Ce trait inflige Z désavantages aux tests réalisés pour résister à un effet de l\'élément X.</p>\r\n<p>Le trait Vulnérabilité s\'applique après toutes les autres sources de réduction de dégâts.</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `objets`
--

CREATE TABLE `objets` (
  `Id` int(11) NOT NULL,
  `Objet` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Prix` varchar(12) NOT NULL,
  `ENC` tinyint(4) NOT NULL,
  `Cat` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `sorts` (
  `Id` int(11) NOT NULL,
  `Effet` varchar(75) NOT NULL,
  `Propriete` longtext NOT NULL,
  `DC` varchar(50) NOT NULL,
  `Magnitude` varchar(50) NOT NULL,
  `Description` longtext NOT NULL,
  `Sup` longtext DEFAULT NULL,
  `Inkarnai` longtext NOT NULL,
  `Ecole` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(13, 'Affaiblissement [Caractéristique]', '[Force, Dextérité, Agilité, Vigueur, Intelligence, Volonté, Perception, Éloquence]', '4+3X', 'Formula 1+1X', 'La [Caractéristique] de la cible diminue de [Mag] crans pendant une minute.\r\n\r\nPour se libérer, la cible peut effectuer chaque round un test de Vigueur dans le cas d\'une caractéristique physique ou de Volonté pour une caractéristique mentale avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort. ', 'La caractéristique diminue d\'un cran supplémentaire mais le DC augmente de 2.\nEx : DC 7 -> 2 crans ; DC 9 -> 3 crans...\n', 'Agones(FOR, AGI, VIG), Eftis(DEX), Orizo(INT, VOL), Kynigi(PER), Psema(ÉLO)', 'Altération'),
(14, 'Résistance [Élément]', '[Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]', '3+2X', 'Formula 1+1X', 'Procure à la cible le trait <a href=\'Glossaire.php#resistance\'>Résistance([Mag],[élément])</a>.', 'La magnitude de la résistance procurée augmente de 1 mais le DC augmente de 1.\nEx : DC 4 -> Résistance(2) ; DC 5 -> Résistance(3)...', 'Aïgida, Anathos, Horoï, Kuga, Nero, Safi', 'Altération'),
(15, 'Vulnérabilité [Élément]', 'Concentration, [Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]', '3+2X', 'Formula 1+1X', 'La cible subit le trait <a href=\'Glossaire.php#vulnerabilite\'>Vulnérabilité([Mag],[élément])</a>.\r\nPour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort. ', 'La magnitude de la vulnérabilité infligée augmente de 1 mais le DC augmente de 1.\nEx : DC 4 -> Vulnérabilité(2) ; DC 5 -> Vulnérabilité(3)...', 'Aïgida, Anathos, Horoï, Kuga, Nero, Safi', 'Altération'),
(16, 'Guérison', '-', '4', '-', 'WIP\r\nLa cible passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR du lanceur. Sur une réussite, la cible guérie d\'une blessure. Chaque palier de 3 DR de la cible soigne une blessure supplémentaire.', NULL, 'Agapi', 'Altération'),
(17, 'Stabilisation', '-', '4', '-', 'WIP\r\nLa cible passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR du lanceur. Sur une réussite, la cible n\'est plus <a href=\'Glossaire.php#mourant\'>mourante</a> et devient <a href=\'Glossaire.php#stable\'>stable</a>.', NULL, 'Agapi', 'Altération'),
(18, 'Récupération', '-', '2', '-', 'WIP\r\nLa cible passe un test de Vigueur pour les traumas Physiques ou de Volonté pour les traumas Mentaux avec un DC équivalent au triple de ses traumas physiques/mentuax et un bonus équivalent au DR du lanceur. Sur une réussite, la cible guérie d\'un trauma. Chaque palier de 3 DR de la cible soigne un trauma supplémentaire.', NULL, 'Agapi', 'Altération'),
(19, 'Purge', 'Concentration', '3+2X', 'AD +1', 'La cible obtient [Mag] avantages pour résister et purger les effets négatifs(Vulnérabilité, Saignement, Poison, etc..) tant que le lanceur se concentre sur le sort.', NULL, 'Agapi', 'Altération'),
(20, 'Invisibilité', 'Concentration', '8', '-', 'La cible devient invisible et le reste tant que le lanceur se concentre sur le sort.', 'Le sort perd la propriété Concentration et sa durée passe à une minute mais le DC est de 10.\nLa durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 12 : 1 heure ; DC 14 : 1 journée...\n', 'Safi', 'Altération'),
(21, 'Armure', '[Physique,Magique]', '4+3X', 'Formula 1+1X', 'La résistance [type] de la cible augmente de [Mag].', 'La magnitude de la résistance procurée augmente de 1 mais le DC augmente de 1.\nEx : DC 4 -> Résistance +2 ; DC 5 -> Résistance +3...', 'Pravoï', 'Conjuration'),
(27, 'Protection', 'Réaction', '3+3X', 'Double 2', 'Réduis les dégâts subis par la cible de [Mag] pour une instance de dégâts dans la minute qui suit l\'incantation du sort.', 'La réduction de dégâts augmente de 1 mais le DC augmente de 1.', 'Pravoï', 'Conjuration'),
(30, 'Entrave', 'Concentration', '4+2X', 'AD -0', 'WIP\r\nLa cible est <a href=\'Glossaire.php#immobilise\'>immobilisée</a>.\r\nPour se libérer, la cible peut effectuer chaque round un test de Force, de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort. \r\n', 'La cible subit un désavantage pour se libérer mais le DC augmente de 2.', 'Pravoï', 'Conjuration'),
(33, 'Toile d\'araignée', '-', '3+3X', 'Double 2', 'L\'endroit ciblé par le lanceur diminue la vitesse des entité le traversant de [Mag].', 'La réduction de vitesse est doublée mais le DC augmente de 3.\nEx : DC 6 -> vitesse -4 ; DC 9 -> vitesse -8 ; DC 12 -> vitesse -16...', 'Kynigi', 'Conjuration'),
(39, 'Invocation de Karnarim élémentaire', '[Acide, Eau, Feu, Foudre, Glace, Lumière, Métal, Nécrotique, Pierre, Poison, Sable, Terre]', '6', '-', 'WIP\r\n\r\nInvoque un Karnarim de l\'[élément] pendant une minute. Voir <a href=\'../World/Bestiaire.php#elementaire_mineur\'>Élémentaire mineur</a> dans le Bestiaire.', 'Le Karnarim n\'est plus mineur mais le DC passe à 12. Voir <a href=\'../World/Bestiaire.php#elementaire\'>Élémentaire</a> dans le Bestiaire.\nLe Karnarim devient majeur mais le DC passe à 18. Voir <a href=\'../World/Bestiaire.php#elementaire_majeur\'>Élémentaire majeur</a> dans le Bestiaire.', 'Aïgida, Anathos, Horoï, Kormo, Kuga, Nero, Ourgal, Safi', 'Conjuration'),
(45, 'Invocation d\'Arme', '-', '6+2X', 'Dice_scale 1d4', 'Invoque une arme infligeant [Mag] dégâts magiques à l\'endroit ciblé, cette arme peut utiliser la caractéristique de Volonté du lanceur pour les jets de Style de Combat.', 'Le dé de dégâts de l\'arme invoquée augmente d\'un <a href=\'Systeme.php#cran_des\'>cran</a> mais le DC augmente de 2.\nEx : DC 7 -> 1d6 ; DC 9 1d8...', 'Agones', 'Conjuration'),
(48, 'Projection psychique', 'Concentration', '10', '-', 'WIP\r\nL\'esprit de cible est envoyé dans un domaine de Karnaï.\r\nSans esprit pour le contrôler, le corps de la cible est inanimé pendant cette période. Une minute dans le monde matériel équivaut à une heure dans le monde de Karnaï. \r\nL\'esprit de la cible doit consentir à ce voyage ou au moins ne pas y être opposée sinon le lanceur risque de perdre son propre esprit lors de l\'incantation.', NULL, 'Selon le domaine visité', 'Conjuration'),
(51, 'Bannissement', '-', '0', '-', 'WIP\r\nLa cible est renvoyé dans sa dimension d\'Origine.\r\nElle doit passer un test de Vigueur ou Volonté opposé à l\'incantation du lanceur si elle souhaite résister.\r\nSi l\'invocateur de la cible est conscient de la tentative de bannissement, il peut effectuer le test à la place de la cible en utilisant sa compétence de Conjuration.', NULL, 'Pravoï', 'Conjuration'),
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
(94, 'Mot de pouvoir : Mort', '-', '15', '-', 'La cible meurt instantanément. \nPour résister, la cible peut lancer son dé de Vigueur et son dé de Volonté, en faire la somme et la comparer au résultat du lanceur.', NULL, 'Anathos', 'Domination'),
(95, 'Télékinésie', 'Concentration', '2+2X', 'Formula 1+1X', 'La cible obtient le trait <a href=\'Glossaire.php#telekinesiste\'>Télékinésiste([Mag])</a>.', 'La magnitude de la télékinésie augmente de 1 mais le DC augmente de 2.\nEx : DC 4 : magnitude 2 ; DC 6 : magnitude 3...', 'Agones', 'Domination'),
(96, 'Peur', '-', '5', '1 minute', 'WIP\r\nLa cible est <a href=\'Glossaire.php#effraye\'>Effrayé(lanceur)</a>.\r\nPour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort. ', 'La cible subit un désavantage pour se libérer et la durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 7 : 1 heure ; DC 9 : 1 journée...', 'Agapi(mort-vivant), Psema', 'Domination'),
(97, 'Calme', '-', '5', '1 minute', 'WIP\r\nLa cible est <a href=\'Glossaire.php#fascine\'>fasciné</a>.\r\nPour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.', 'La durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 12 : 1 heure ; DC 14 : 1 journée...', 'Psema', 'Domination'),
(98, 'Rage', '-', '5', '1 minute', 'WIP\r\nLa cible considère tout le monde comme un adversaire.\r\nPour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.', 'La durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 12 : 1 heure ; DC 14 : 1 journée...', 'Agones', 'Domination'),
(99, 'Silence', '-', '5', '1 minute', 'WIP\r\nLa cible est incapable de parler.\r\nPour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu\'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.', 'La durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 12 : 1 heure ; DC 14 : 1 journée...', 'Psema', 'Domination'),
(100, 'Apparence trompeuse', 'Concentration', '6', '-', 'WIP\r\nLa cible est perçue comme quelqu\'un d\'autre.\r\nSe rendre compte du sort nécessite de passer un test d\'Observation(Per) ou d\'Arcanes(Int ou Per) avec un DC équivalent au résultat du lanceur de sort.', 'Le sort perd la propriété Concentration, dure désormais une heure mais le DC est de 8.\nLa durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 10 : 1 journée ; DC 12 : 1 semaine...', 'Psema', 'Domination'),
(102, 'Archives d\'Orizo', '-', '2+2X', 'AD +1', 'Le prochain test de compétence de la cible pouvant être facilité avec des connaissances spécifiques se fera avec [Mag] avantage(s).', 'La cible obtient un avantage supplémentaire mais le DC augmente de 2.', 'Orizo', 'Mysticisme'),
(103, 'Détection de la vie / des morts / de la magie', '-', '3+1X', 'Double 10', 'Détecte les être vivants / les morts / la magie dans un rayon de [Mag] mètres du point d\'impact du sort.', 'Aux cercles supérieurs, la portée de détection double pour chaque cercle au dela du premier', 'Kynigi(vie), Anathos(morts), Orizo(magie)', 'Mysticisme'),
(104, 'Vision véritable', 'Concentration', '6', '-', 'WIP\r\nLa cible voit tout, même les entités invisibles, peut voir dans le noir le plus complet et même dans une obscurité magique.\r\nLa cible peut voir grâce à ce sort même si elle est aveugle.', 'Le sort perd la propriété Concentration, dure désormais une heure mais le DC est de 8.\nLa durée augmente d\'un <a Magie.php#cran_duree> cran</a> mais le DC augmente de 2.\nEx : DC 10 : 1 journée ; DC 12 : 1 semaine...', 'Orizo', 'Mysticisme'),
(105, 'Destinée', '-', '6+2X', 'Dice_nb 2d6', 'Le lanceur peut ajouter/enlever le résultat d\'un des dés lancés par ce sort pour modifier le résultat de n\'importe quel test. (Le lanceur doit annoncer l\'utilisation d\'un dé pré-tiré avant que le dé ne soit lancé).', NULL, 'Tychi', 'Mysticisme'),
(106, 'Augure', '-', '5', '-', 'La cible est avertie de son futur proche. (fortune, péril, les deux ou rien).', NULL, 'Tychi', 'Mysticisme'),
(107, 'Prophétie', '-', '10', '-', 'La cible obtient une réponse fiable sur un évènement à venir dans les 7 jours. (avoir recours à cet effet sans 7 jours d\'intervalles augmente de 25% les chances de réponse aléatoires).', NULL, 'Tychi', 'Mysticisme'),
(108, 'Communion avec la nature', '-', '6', '-', 'La cible obtient trois informations sur son environnement.', NULL, 'Kormo et Kynigi', 'Mysticisme'),
(109, 'Localisation d\'entité', 'Concentration', '4+2X', 'Distance 100 mètres', 'La cible connait la position de l\'entité de son choix dans un rayon de [Mag].', 'La portée de localisation est multiplié par 10 mais le DC augmente de 2.\nEx : DC 6 -> 1 km; DC 8-> 10km...', 'Kynigi', 'Mysticisme'),
(110, 'Langue enchantée', 'Concentration', '4', '-', 'La cible sait parler dans toute les langues tant que le lanceur se concentre sur le sort.', NULL, 'Orizo', 'Mysticisme'),
(111, 'Lien sensoriel', 'Concentration', '6+2X', 'Distance 100 mètres', 'La cible peut voir/entendre/sentir à travers les sens d\'une créature consentante dans un rayon de [Mag].', 'La portée du lien est multiplié par 10 mais le DC augmente de 2.\nEx : DC 8 -> 1 km; DC 10-> 10km...', 'Kynigi', 'Mysticisme');

-- --------------------------------------------------------

--
-- Structure de la table `type_degats`
--

CREATE TABLE `type_degats` (
  `id` varchar(250) NOT NULL,
  `Type` varchar(250) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_degats`
--

INSERT INTO `type_degats` (`id`, `Type`, `Description`) VALUES
('acide', 'Acide', ''),
('contondants', 'Contondants', ''),
('fendant', 'Fendant', ''),
('feu', 'Feu', ''),
('foudre', 'Foudre', ''),
('froid', 'Froid', ''),
('necrotiqe', 'Nécrotique', ''),
('non_letal', 'Non-létal', ''),
('perforant', 'Perforant', ''),
('poison', 'Poison', ''),
('radiant', 'Radiant', ''),
('tranchant', 'Tranchant', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `armes`
--
ALTER TABLE `armes`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `armes_categories`
--
ALTER TABLE `armes_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `armes_proprietes`
--
ALTER TABLE `armes_proprietes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `armures`
--
ALTER TABLE `armures`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `arts_combat`
--
ALTER TABLE `arts_combat`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `bestiaire`
--
ALTER TABLE `bestiaire`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `boucliers`
--
ALTER TABLE `boucliers`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `glossaire_etats`
--
ALTER TABLE `glossaire_etats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `glossaire_traits`
--
ALTER TABLE `glossaire_traits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `objets`
--
ALTER TABLE `objets`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `sorts`
--
ALTER TABLE `sorts`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `type_degats`
--
ALTER TABLE `type_degats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `arts_combat`
--
ALTER TABLE `arts_combat`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `boucliers`
--
ALTER TABLE `boucliers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `objets`
--
ALTER TABLE `objets`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `sorts`
--
ALTER TABLE `sorts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
