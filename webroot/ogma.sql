-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 27 juin 2024 à 15:46
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
-- Structure de la table `armor`
--

CREATE TABLE `armor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `protection` smallint(6) NOT NULL,
  `protection_magical` smallint(6) NOT NULL,
  `price` varchar(255) NOT NULL,
  `enc` smallint(6) NOT NULL,
  `speed_penalty` varchar(255) DEFAULT NULL,
  `movement_check_disadvantage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_5DE1B12564C15B1` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `armor_material`
--

CREATE TABLE `armor_material` (
  `armor_material` int(11) NOT NULL,
  `armor_category` int(11) NOT NULL,
  PRIMARY KEY (`armor_material`,`armor_category`),
  KEY `IDX_29DBA0B129DBA0B1` (`armor_material`),
  KEY `IDX_29DBA0B15329CCE5` (`armor_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `changelog`
--

CREATE TABLE `changelog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D17AC211AA115D5` (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `combat_art`
--

CREATE TABLE `combat_art` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `conditions` longtext DEFAULT NULL,
  `effect` longtext NOT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `assaillant_test` longtext NOT NULL,
  `defender_test` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4DF6F1595E237E06` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `combat_art`
--

INSERT INTO `combat_art` (`name`, `description`, `conditions`, `effect`, `cost`, `assaillant_test`, `defender_test`) VALUES
('Balayette', 'Le héros tente de faire tomber son adversaire au sol', NULL, 'La cible est au sol et passe son prochain tour, elle subit 2 dégâts', NULL, 'Action bonus : DEX', 'AGI'),
('Charge d\'épaule', 'Le héros bouscule son adversaire pour le faire tomber au sol', NULL, 'La cible est au sol et passe son prochain tour, elle subit 4 dégâts', NULL, 'Action bonus : FOR', 'VIG'),
('Coup dans les yeux', 'Avec un rapide coup de dague au visage, le héros aveugle momentanément son adversaire', 'Dague<br/>Cible sans casque', 'cible aveuglée partiellement : Atq et Prd -20 (3 tours)', NULL, 'Action simple :<br/>Jet d\'Atq à -20', 'Parade/Esquive à +10'),
('Coup étourdissant', 'Le moine frappe son adversaire au visage pour l\'étourdir', NULL, 'La cible est étourdie', NULL, 'Action complexe :<br/>Jet d\'Atq à -10', 'VIG pour résister'),
('Coup mortel', 'L\'assassin élimine une cible incapable de se défendre', 'Cible vulnérable(aveuglée, immobilisée, inconscient, etc...)', 'Mort instantanée de la cible', NULL, 'Acton complexe :<br/>Jet d\'Atq à -20', 'Jet de Vigueur'),
('Déplacement forcé', 'À l\'aide de son arme, le faucheur force sa cible à se déplacer sous peine de subir une autre blessure', 'Après une attaque réussie', 'La cible est déplacée de 1m + 1m par 10 points de marge de réussite', NULL, 'Action de mouvement :<br/>DEX pour coincer l\'adversaire puis FOR pour le tirer', 'AGI pour passer sous la lame puis VIG pour résister au déplacement'),
('Désarmement', 'Le héros lutte habilement pour ôter son arme à son adversaire', 'Après une attaque réussie', 'La cible est désarmée', NULL, 'Action bonus : DEX ou FOR', 'DEX'),
('Destruction', 'Le barbare tente de briser l\'équipement de son adversaire avec son arme', 'Rupture du barbare supérieure à l\'adversaire', 'L\'équipement ciblé est endommagé (arme: Atq et Prd -15, Dgt -2; armure : PR -2)', NULL, 'Action simple :<br/>FOR', 'AGI pour l\'armure ou DEX pour l\'arme suivi d\'un test de rupture'),
('Double attaque', 'Le héros frappe deux fois avec son arme dans un mouvement fluide', NULL, 'Autant de jets que d\'attaques réussies', NULL, 'Action complexe :<br/>1er coup : Attaque classique<br/>2ème coup : Jet d\'Atq à -10', 'Parade/Esquive classique pour chaque frappe'),
('Double estoc', 'Le lancier frappe deux fois de la pointe de sa lance', NULL, 'Autant de jets que d\'attaques réussies', NULL, 'Action complexe :<br/>1er coup : Attaque classique<br/>2ème coup : Jet d\'Atq à -10', 'Parade/Esquive classique pour chaque frappe'),
('Enchaînement', 'Le moine enchaîne les coups et frappe deux fois avec son bâton', NULL, 'Autant de jets que d\'attaques réussies', NULL, 'Action complexe :<br/>1er coup : Attaque classique<br/>2ème coup : Jet d\'Atq à -10', 'Parade/Esquive classique pour chaque frappe'),
('Enchaînement supérieur', 'Le moine délivre un déluge de coups sur son adversaires et frappe trois fois avec son bâton', NULL, 'Autant de jets que d\'attaques réussies', NULL, 'Action complexe :<br/>1er coup : Attaque classique, malus de -10 par attaque supplémentaire', 'Parade/Esquive classique pour chaque frappe'),
('Feinte', 'Le héros distrait son adversaire avant de frapper. La forme de la feinte est à préciser par le joueur', 'Arme de corps-à-corps pouvant infliger des dégâts perforants', 'R: dégâts + 4<br/>E: Le héros baisse sa garde et subit une attaque d\'opportunité', NULL, 'Action bonus :<br/>Le joueur lance un d100 avant de faire son jet d\'attaque (avec bonus éventuels selon le personnage et au choix du MJ), son adversaire lance aussi un d100 (encore bonus et malus au choix du MJ). Le plus haut score l\'emporte.', 'La cible ne peut pas se défendre'),
('Fente', 'Le héros s\'appuie sur sa jambe avant pour frapper de loin', 'Arme de corps-à-corps pouvant infliger des dégâts perforants', 'La portée augmente d\'un mètre', NULL, 'Action simple :<br/>Moyenne Atq/AGI', 'Parade/Esquive classique'),
('Frappe assassine', 'L\'assassin frappe un point faible de l\'adversaire', 'Attaque avec avantage', 'Degâts x1,5', NULL, 'Action simple :<br/>Atq classique', 'Parade/Esquive classique'),
('Frappe dans le dos', 'Le faucheur utilise son arme pour frapper sa cible dans le dos, où l\'armure est plus fine', NULL, 'Ignore 2 points de PR de l\'armure', NULL, 'Action simple :<br/>Jet d\'Atq à -10', 'Parade/Esquive classique'),
('Frappe de la faucheuse', 'Le faucheur frappe deux fois en un seul et large mouvement', NULL, 'Autant de jets que d\'attaques réussies', NULL, 'Action complexe :<br/>1er coup : Attaque classique<br/>2ème coup : Jet d\'Atq à -10', 'Parade/Esquive classique pour chaque frappe'),
('Frappe de la hampe', 'Le hallebardier enchaîne après une attaque par un coup de la hampe', 'Après une attaque', '1d4 de dégâts contondants', NULL, 'Action bonus :<br/>Atq', 'Parade/Esquive classique'),
('Frappe lourde', 'Le barbare envoie son adversaire au sol en le frappant avec un force surhumaine', 'FOR du barbare supérieure à celle de sa cible', 'Dégâts x1,5, cible mise au sol et envoyée à 1m + 1m par 10 points de marge de réussite.', NULL, 'Action complexe<br/>Atq à -10', 'jet d\'AGI pour esquiver puis VIG pour résister à la mise au sol'),
('Harcelement', 'Le tirailleur harcèle ses adversaires avec trois tirs consécutifs', NULL, 'Dégâts normaux', NULL, 'Action complexe :<br/>Tir classique pour le premier, les tirs suivants subissent un malus de -10 par tir consécutif', ''),
('Lacération', 'Le héros frappe pour ouvrir les veines de son adversaire', 'Cible sans armure à l\'endroit ciblé', 'la cible saigne (1d6/tour) pendant 3 tours', NULL, 'Action simple :<br/>Jet d\'Atq à -10, les dégâts sont divisés par deux', 'Parade/Esquive classique, si le coup touche, épreuve de VIG pour contrer le saignement'),
('Lutte', 'Le héros agrippe son adversaire pour entraver ses options de combat', 'Une main libre (si deux mains libres bonus de +20)', 'Le héros doit réussir un jet par tour pour maintenir sa prise (FOR ou DEX du héros - FOR ou DEX de cible + 5 par tour). Durant la lutte, le héros peut déplacer la cible de la moitié de sa vitesse de déplacement, l\'attaquer (ignore l\'armure à 30 ou moins), l\'immobiliser ou l\'attacher (avec cordes ou autre) via une épreuve de DEX à -30.', NULL, 'Action simple : DEX ou FOR', 'DEX ou FOR pour contrer la prise'),
('Mise au sol', 'Le hallebardier profite d\'une attaque réussie pour agripper son adversaire avec le croc de son fer et l\'amener au sol', 'Après une attaque réussie', 'La cible est à terre', NULL, 'Action bonus :<br/>FOR', 'VIG pour ne pas tomber'),
('Provocation', 'Le héros provoque son/ses adversaire(s) et le(s) pousse(nt) à l\'attaquer en priorité', NULL, 'La cible se concentre sur le héros et attaque désormais avec deux désavantages les autres cibles pendant 3 rounds', NULL, 'Action bonus : ELO', 'Un jet de VOL pour chaque adversaire provoqué'),
('Ralliement', 'Le héros motive ses alliés à continuer le combat', NULL, 'Les alliés récupèrent 1d6+(marge de réussite/10) points d\'endurance', NULL, 'Action bonus : ELO', ''),
('Réception de charge', 'Le hallebardier se prépare à infliger une attaque d\'opportunité à quiconque pénètre sa zone de contrôle', NULL, 'Le hallebardier peut porter une attaque d\'opportunité (avec un bonus de 10 à l\'Atq) supplémentaire sur un adversaire pénétrant sa zone de contrôle.', NULL, 'Action de mouvement :<br/>Aucune épreuve pour se préparer', ''),
('Repositionnement', 'Le héros lutte pour déplacer son adversaire', NULL, 'La cible est déplacée de 1m + 1m par 10 points de marge de réussite.', NULL, 'Action de mouvement : DEX ou FOR', 'AGI ou VIG'),
('Tir déstabilisant', 'L\'arbalétrier prépare un tir particulièrement puissant pour faire chuter sa cible', 'Jet rupture pour l\'arme à +1', 'La cible est à terre', NULL, 'Action complexe :<br/>Tir classique', 'VIG pour ne pas tomber'),
('Tir pénétrant', 'L\'arbalétrier tire sur deux cibles alignées et transperce la première pour atteindre la seconde', '2 cibles alignées', 'Dégâts normaux pour la première cible, -3 pour la deuxième', NULL, 'Action complexe :<br/>Tir classique', ''),
('Tir précis', 'L\'arbalétrier prend son temps pour viser sa cible', NULL, 'Dégâts normaux', NULL, 'Action complexe :<br/>Tir à +15', ''),
('Tir rapide', 'L\'arbalétrier effectue un tir rapide à la hanche', NULL, 'Dégâts normaux', NULL, 'Action bonus :<br/>Tir à -15', ''),
('Tranche', 'Le héros saisit son arme à deux mains pour un violent coup horizontal', 'Arme polyvalente ou à deux mains', 'Touche toutes les cibles en face et à portée', NULL, 'Action complexe :<br/>Un seul jet d\'Atq à -15', 'Chaque cible peut parer ou esquiver'),
('Tranche-tendons', 'Le héros frappe la cible dans les articulations des jambes pour l\'empêcher de bouger.', NULL, 'Déplacement de la cible limité à un mètre par round', NULL, 'Action simple :<br/>Jet d\'attaque d\'Atq à -25', 'Parade/Esquive à -10'),
('Triple attaque', 'Le héros délivre un déluge de coup sur son adversaires et frappe trois fois', NULL, 'Autant de jets que d\'attaques réussies', NULL, 'Action complexe :<br/>1er coup : Attaque classique, malus de -10 par attaque supplémentaire', 'Parade/Esquive classique pour chaque frappe'),
('Triple estoc', 'Le lancier délivre un déluge d\'estoc sur son adversaires et frappe trois fois', NULL, 'Autant de jets que d\'attaques réussies', NULL, 'Action complexe :<br/>1er coup : Attaque classique, malus de -10 par attaque supplémentaire', 'Parade/Esquive classique pour chaque frappe'),
('Volée de flèches', 'L\'archer tire une flèche sur chacun des opposants qu\'il a en ligne de mire (max 5)', NULL, 'Autant de jets que d\'attaques réussies', NULL, 'Action complexe :<br/>Tir classique pour le premier, les tirs suivants subissent un malus de -10 par tir consécutif', '');

-- --------------------------------------------------------

--
-- Structure de la table `combat_art_weapon_category`
--

CREATE TABLE `combat_art_weapon_category` (
  `combat_art_id` int(11) NOT NULL,
  `weapon_category_id` int(11) NOT NULL,
  PRIMARY KEY (`combat_art_id`,`weapon_category_id`),
  KEY `IDX_B04BE02052A7FB94` (`combat_art_id`),
  KEY `IDX_B04BE0207758AB08` (`weapon_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `damage_type`
--

CREATE TABLE `damage_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `effect` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6CE4B5E68C8E3ACE` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `glossary_condition`
--

CREATE TABLE `glossary_condition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `condition` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `effect` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A0BC61B44B1A2F2F` (`condition`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `glossary_condition`
--

INSERT INTO `glossary_condition` (`condition`, `description`, `effect`) VALUES
('À Terre', '<p>Le personnage se trouve étendu sur le sol. Sa vitesse est divisée par 2. Certaines actions comme tirer à l\'arc sont impossibles ou se font avec une grande difficulté lorsque l\'on est allongé sur le sol.</p>\r\n<p>Se coucher au sol ne coûte rien mais se relever coûte la moitié de la vitesse du personnage et provoque une attaque d''opportunité.</p>\r\n<p>Cibler une créature à terre se fait avec 2 désavantages.</p>\r\n', ''),
('Assourdi', '<p>L\'entité perd l\'usage de l\'ouïe et subit les malus suivants :</p>\r\n<ul>\r\n<li>L\'entité n\'entend plus rien</li>\r\n<li>3 désavantages aux épreuves bénéficiant de l\'ouïe</li>\r\n<li>Rate automatiquement toutes les épreuves se basant uniquement sur l\'ouïe</li>\r\n</ul>\r\n', ''),
('Aveuglé', '<p>L\'entité perd l\'usage de la vision et subit les malus suivants :</p>\r\n<ul>\r\n<li>L\'entité ne voit plus rien</li>\r\n<li>3 désavantages aux épreuves bénéficiant de la vision</li>\r\n<li>Rate automatiquement toutes les épreuves se basant uniquement sur la vision</li>\r\n</ul>\r\n', ''),
('Brûlure(X)', '<p>L\'entité est en feu, l\'intensité des flammes est déterminé par un nombre X. Une entité souffrant de l\'état brûlure :</p>\r\n<ul>\r\n<li>subit X points de dégâts de feu sur la partie de son corps en train de brûler. Cette quantité de dégâts augmente de 1 par round. Si le personnage subit deux sources de brûlure en même temps, les deux X se cumulent. </li>\r\n<li>doit passer un test de Volonté DCX pour entreprendre une action autre que tenter d\'éteindre le feu.</li>\r\n<li>peut tenter d\'éteindre les flammes en se roulant au sol. Cela consomme votre mouvement pour ce tour et nécessite de passer un test d\'Agilité DCX. L\'entité passe <a href=\'Glossaire.xhtml#a_terre\'>à terre</a> et perds l\'état brûlure si le test est une réussite.</li>\r\n</ul>\r\n', ''),
('Caché', '<p>Le personnage est dissimulé dans son environnement et échappe à la vue de ses ennemis. Le personnage doit dépenser le double de mouvement pour se déplacer en restant caché. Les cibles qui subissent une attaque d\'une entité cachée ne peuvent se défendre mais l\'entité perd alors son état caché.</p>\r\n<p>Si le personnage entre dans la ligne de vue d\'une entité, il doit passer un test de Furtivité(Agilité) opposé à un test d\'Observation(Perception) de l\'entité. S\'il réussit, il reste caché sinon il perd cet état.</p>\r\n', ''),
('Confus', '<p>Le personnage a du mal à coordonner ses mouvements et ne peut faire qu\'une action ou un déplacement lors de son tour.</p>\r\n', ''),
('Effrayé(Source)', '<p>Une créature effrayée fait tout pour s\'éloigner de la source de sa peur. Si la créature voit la source de sa peur et que son action n\'est pas de s\'en éloigner, elle effectue cette action avec 3 désavantages.</p>\r\n', ''),
('Empoisonnement(X)', '<p>La créature est affectée par une toxine nocive et doit passer un test de Vigueur DC X au début de chacun de ses tours, si elle échoue, elle subit une blessure. La magnitude de l\'Empoisonnement diminue de 1 à la fin du tour de l\'entité.</p>\r\n<p>Une créature empoisonnée effectue tous ses tests avec un nombre de désavantages équivalent à la moitié de l\'amplitude de l\'empoisonnement.</p>\r\n<p>Il est possible de réduire la magnitude de l\'Empoisonnement en passant un test de Medicine DC X, en cas de réussite, la magnitude de l\'Empoisonnement est réduite du DR de ce jet. Lorsque deux sources infligent un empoisonnement, appliquez seulement celui ayant la plus grande magnitude.</p>\r\n', ''),
('Entravé', '<p>Une entité entravée est limitée dans ses mouvements par des liens. Elle se déplace à la moitié de sa vitesse et effectue toute épreuve physique avec deux désavantages.</p>\r\n', ''),
('Étourdi', '<p>Un personnage étourdi laisse tomber ce qu''il avait en main, ne peut intenter aucune action et se défend avec 2 désavantages durant toute cette période.</p>\r\n', ''),
('Fasciné', '<p>Une créature est fascinée par un sort ou un effet surnaturel. Tant que l''effet persiste, une créature fascinée reste assise ou debout, dans l''incapacité d''effectuer d''autre action que se concentrer sur l''effet en question. Elle subit 2 désavantages sur tous les jets. L''arrivée d''une menace potentielle (comme une créature hostile) donne droit à un nouveau jet pour contrer l''effet de fascination. Toute menace évidente, comme dégainer une arme, lancer un sort ou tirer sur la créature, rompt immédiatement l''effet de fascination. En dépensant sa réaction, il est possible de secouer une créature fascinée pour lui faire reprendre ses esprits.</p>\r\n', ''),
('Immobilisé', '<p>Une créature immobilisée ne peut plus se déplacer. Elle peut effectuer toute action n\'incluant pas de déplacement.</p>\r\n', ''),
('Inconscient', '<p>Un personnage inconscient est incapable de faire quoi que ce soit et s\'effondre à terre sauf s\'il est maintenu dans une autre position.</p>\r\n', ''),
('Invisible', '<p>Les créatures invisibles ne peuvent être vues. Les personnages ratent automatiquement les jets pour les détecter basés sur la vision. Attaquer une entité invisible se fait avec 3 désavantages, et ce, même si on sait à peu près ou elle se trouve.</p>\r\n', ''),
('Maîtrisé / Paralysé', '<p>Un personnage maîtrisé est retenu par une créature, un piège ou un effet. Il ne peut ni bouger ni attaquer ni se défendre.</p>\r\n', ''),
('Mort', '<p>Le personnage était mourant et n\'est pas parvenu à se stabiliser. La psyché du personnage quitte son enveloppe corporelle. On ne peut plus soigner un personnage mort que ce soit par des moyens ordinaires ou magiques, mais il peut être ramené à la vie par magie. Un corps sans vie se décompose normalement si on ne le préserve pas.</p>\r\n', ''),
('Mourant', '<p>Le personnage est inconscient et en train de mourir. Une entité mourante ne peut pas entreprendre la moindre action et doit passer un test de Vigueur DC 1 par minute ou à chaque fois qu\'elle subit des dégâts, après 3 échecs l\'entité meurt. Après 3 réussites l\'intervalle entre chaque jet passe à une heure, après 3 autres réussites, l\'entité devient stable et n\'est plus mourante.</p>\r\n<p>Un personnage mourant peut être stabilisé par l\'intervention d\'une personne extérieure.</p>\r\n', ''),
('Ralenti', '<p>Une créature ralentie se déplace à la moitié de sa vitesse.</p>\r\n', ''),
('Saignement(X)', '<p>La créature saigne abondamment et doit passer un test de Vigueur DC X au début de chacun de ses tours, si elle échoue, elle subit une blessure. La magnitude du Saignement diminue de 1 à la fin du tour de l\'entité.</p>\r\n<p>Une créature qui saigne effectue tous ses tests avec un nombre de désavantages équivalent à la moitié de l\'amplitude du saignement.</p>\r\n<p>Il est possible de réduire la magnitude du Saignement en passant un test de Medicine DC X, en cas de réussite, la magnitude du Saignement est réduite du DR de ce jet. Lorsque deux sources infligent un saignement, appliquez seulement celui ayant la plus grande magnitude.</p>\r\n', ''),
('Stable', '<p>Le personnage a été stabilisé, il n''est plus mourant mais reste inconscient. Un personnage stable redevient conscient après 2d6 - la moitié du dé de Vigueur/Volonté du personnage.</p>\r\n', ''),
('Surpris', '<p>Prise de court, cette entité ne peut effectuer qu\'un mouvement ou une action et ne peut pas entreprendre de <a href=\'Combat.php#reactions\'>réactions</a>.</p>\r\n', '');

-- --------------------------------------------------------

--
-- Structure de la table `glossary_trait`
--

CREATE TABLE `glossary_trait` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trait` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `effect` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_3E55C83F7E2F15F4` (`trait`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `glossary_trait`
--

INSERT INTO `glossary_trait` (`trait`, `description`, `effect`) VALUES
('Absorption magique(X)', '<p>Cette entité peut absorber la psy d\'un sort dont elle est la cible. Si cette entité vient à être touchée par un sort lancez un d10, si le résultat est inférieur ou égale à X le sort n\'aucun effet sur la créature et elle récupère d\'un trauma.</p>\r\n', ''),
('Amphibien', '<p>Cette entité se déplace à vitesse normale dans l\'eau, n\'est pas limité par sa compétence d\'Athlétisme et inflige des dégâts normaux lorsqu\'elle se bat dans l\'eau.</p>\r\n', ''),
('Arme naturelle(Z, X)', '<p>Une partie du corps Z de cette entité peut être utilisé comme une arme infligeant X dégâts. L\'entité ne perd l\'usage de cette arme que si elle perd cette partie de son corps.</p>\r\n', ''),
('Artificiel', '<p>Cette entité n\'est pas vivante mais animé par d\'autres moyens. Elle n\'a besoin ni de respirer, ni d\'organes fonctionnels. Elle est immunisée aux effets tels que les maladies, les poisons, les blessures, le vieillissement, le sommeil et la fatigue.</p>\r\n', ''),
('Débilitant(X)', '<p>Cette entité peut empoisonnée sa cible si elle inflige une perte de vitalité avec ses armes naturelles. L\'entité touchée doit passer un test de Résistance(Vig) DCX, si elle échoue, elle contracte un <a href=\'Glossaire.xhtml#empoisonnement\'>Empoisonnement</a> d\'une amplitude équivalente à son DR négatif.</p>\r\n', ''),
('Endommagé(X)', '<p>Cet objet est abîmé et tous les tests dans lesquels il est utilisé se font avec un malus de X désavantages. Si cet objet est une arme, elle inflige 1 point de dégâts en moins, si c\'est une armure, sa PR diminue de 1.</p>\r\n<p>Un objet endommagé peut être réparé pour un coût équivalent à X*10% du prix de base de l\'objet. Si la magnitude de l\'endommagement dépasse 3, cet objet est détruit.</p>\r\n', ''),
('Estomac solide', '<p>Cette entité possède un estomac particulièrement tolérant vis-à-vis des aliments ingérés. Cette entité peut consommer de la viande crue et de l\'eau non purifiée sans craindre les maladies.</p>\r\n', ''),
('Éthérée', '<p>Cette entité est immatérielle, capable de passer au travers des objets et d\'apparence translucide. Elle obtient le trait Volant(Vitesse) et peuvent se déplacer librement dans l\'espace même à travers des objets solides. Elles peuvent être ciblées par des attaques mais ne subissent des dommages que de la part d\'armes en virgonium, de sorts, de pouvoirs magiques et d\'effets surnaturels.</p>\r\n<p>Les entités éthérées ne peuvent normalement pas interagir avec le monde matériel mais peuvent utiliser la magie et des attaques capables d\'infliger des dégâts aux êtres vivants. Ces attaques ignorent la PR des armures ne possédant pas un revêtement en virgonium et ne peuvent être bloqués ou parés par des boucliers et des armes sans ce même revêtement.</p>\r\n', ''),
('Extraplanaire(Z)', '<p>Cette entité provient d\'un autre plan d\'existence noté Z. Si elle meurt, est détruite ou bannie, elle retourne dans son plan d\'origine.</p>\r\n', ''),
('Grimpeur(X)', '<p>Cette entité peut escalader n\'importe quel paroi qu\'importe son inclinaison à une vitesse de X mètres par tour.</p>\r\n', ''),
('Immortel', '<p>Cette entité ne subit pas les effets du vieillissement et peut vivre éternellement en bonne santé.</p>\r\n', ''),
('Immunité(X)', '<p>Cette entité est immunisé à un type de dégâts X, tous les dégâts subis par cet élément sont nullifiés. L\'entité réussit automatiquement tous les jets visant à résister à un effet provoqué par cet élément.</p>\r\n', ''),
('Inflexible(X)', '<p>Cette entité est naturellement résistante à la magie, sa résistance magique augmente de X.</p>\r\n', ''),
('Lien(Source)', '<p>Cette entité est liée par magie à son monde ou à quelqu\'un.</p>\r\n<p>Elle doit obéir aux ordres de son maître sauf s\'il s\'agit de sa défense personnelle. Elles ne pèsent pratiquement rien et l\'on considère leur encombrement comme nul (ENC0).</p>\r\n', ''),
('Photosensibilité(X)', '<p>Cette entité ne supporte pas la lumière, que ce soit celle du Soleil ou de Safi. En plus de posséder une Vulnérabilité(lumière, X), cette entité doit passer un test de Vigueur DC X par heure d\'exposition à la lumière du soleil, chaque heure consécutive augmente le DC de 1. Les nuages et autres évènements météorologiques du même genre divise par deux le DC.</p>\r\n', ''),
('Rampant', '<p>Cette créature se déplace en rampant plutôt qu\'en marchant. Elle n\'est pas ralentie pas les terrains difficiles tels que les hautes herbes et les terrains mous (boue, sable humide).</p>\r\n', ''),
('Régénération(X)', '<p>Cette entité cicatrise à une vitesse incroyable, à chaque début de round, elle lance un d10, si le résultat est inférieur ou égal à X, la créature récupère d\'une blessure.</p>\r\n', ''),
('Résistance(Z, X)', '<p>Cette entité est résistante à un type de dégâts, ce qui signifie qu\'elle subira des dommages réduits face à ce genre de dégâts. On note ainsi la résistance d\'une créature : Résistance(Z, X) où Z est l\'élément infligeant X points de dégâts en moins si la créature est touchée par cet élément.</p>\r\n<p>Ce trait accorde Z avantages aux tests réalisés pour résister à un effet de l\'élément X.</p>\r\n<p>Le trait Résistance s\'applique après toutes les autres sources de réductions de dégâts.</p>\r\n', ''),
('Robuste(X)', '<p>Cette entité est naturellement résistante aux coups, sa résistance physique augmente de X.</p>\r\n', ''),
('Télékinésiste(X)', '<p>Cette entité peut manipuler des objets situés à moins de 50 mètres par la pensée. Le gabarit des objets déplaçables de cette manière dépendent de la magnitude X : 1 pour des objets Minuscules et ainsi de suite jusqu\'à 8 pour des objets Colossaux</p>\r\n<p>Cette entité peut utiliser des objets pour attaquer ses adversaires. Cette action compte comme une attaque à distance utilisant la compétence Domination(Volonté) pour le test d\'attaque. Les objets utilisés de cette manière comptent comme des <a href=\'Armes.php#armes_improvisees\'>armes improvisées</a>.</p>\r\n<p>Il est possible de déplacer des créatures sentientes via la télékinésie. Si la cible souhaite résister, elle doit passer un test de Force ou de Volonté avec un DC équivalent à la magnitude X.</p>\r\n', ''),
('Télépathe', '<p>Cette entité peut communiquer des mots, des images ou même des sentiments par la pensée. Les entités recevant un message télépathique peuvent passer un test de Perception opposé à un test d\'Intelligence pour localiser le télépathe à l\'origine du message.</p>\r\n', ''),
('Vision dans le noir', '<p>La vision dans le noir permet de voir en l''absence de source de lumière. Certaines créatures possèdent cette vision à cause de leurs sens développés spécialement pour une vie sans lumière, d\'autre la possède par magie.</p>\r\n<p>La vision dans le noir se fait uniquement en noir et blanc (elle ne permet pas de distinguer les couleurs)</p>\r\n<p>La présence de lumière n''entrave pas la vision dans le noir.</p>\r\n', ''),
('Vision nocturne', '<p>Les personnages dotés de vision nocturne ont une rétine tellement sensible que leur acuité visuelle exacerbée leur permet de voir plus distinctement que la normale dans des conditions de faible éclairage (clarté de la lune ou des étoiles, torche, etc.).</p>\r\n<p>La vision nocturne permet de voir en couleur.</p>\r\n<p>Une lumière vive et soudaine <a href=\'Glossaire.xhtml#aveugle\'>aveugle</a> les créatures ayant recours à la vision nocturne pendant 2 rounds. </p>\r\n<p>En extérieur, les personnages pourvus de vision nocturne voient aussi bien à la clarté de la lune qu''en plein jour.</p>\r\n', ''),
('Vision thermique', '<p>La vision thermique permet de voir la chaleur qui émane des êtres vivants et des corps chauds. De ce fait, il est possible de voir dans le noir le plus complet les entités dégageant de la chaleur.</p>\r\n<p>La vision thermique fait apparaître les zones chaudes en rouge vif, déclinant en orange, jaune, vert puis bleu à mesure que la température diminue. L\'absence de chaleur ne produit aucune couleur.</p>\r\n', ''),
('Vision véritable', '<p>La vision véritable permet de voir des choses invisibles à l''œil nu. Ce type de vision n''est accessible que par magie et permet de voir la psy émaner des entités d\'Ogma.</p>\r\n<p>La vision véritable fait percevoir le monde dans une teinte bleutée voire violacée et permet de voir dans le noir.</p>\r\n', ''),
('Volant(X)', '<p>Cette entité peut se déplacer en volant. Elle possède une vitesse en vol de X mètres.</p>\r\n', ''),
('Vulnérabilité(Z, X)', '<p>Cette entité est vulnérable à un type de dégâts, ce qui signifie qu\'elle subira des dommages accrus face à ce genre de dégâts. On note ainsi la vulnérabilité d\'une créature : Vulnérabilité(Z, X) où Z est l\'élément infligeant X points de dégâts supplémentaires si la créature est touché par cet élément.</p>\r\n<p>Ce trait inflige Z désavantages aux tests réalisés pour résister à un effet de l\'élément X.</p>\r\n<p>Le trait Vulnérabilité s\'applique après toutes les autres sources de réduction de dégâts.</p>\r\n', '');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` longtext DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `enc` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1F1B251E82C1D479` (`item`),
  KEY `IDX_1F1B251E12469DE2` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`item`, `category_id`, `description`, `price`, `enc`) VALUES
('Balance de marchand', 1, 'Plateaux et arrangements de poids, permet de déterminer le poids exact d\'objets inférieur à 1 kg', '25 pa', 1),
('Baril (D)', 1, 'Petit tonneau pouvant stocker tout et n\'importe quoi.', '3 pa', 2),
('Bélier portatif', 1, 'Morceau de bois renforcé de métal, permet d\'enfoncer les portes avec 5 avantages', '15 pa', 2),
('Billes (D)', 1, 'Petites billes recouvrant une zone de 5m x 5m une fois déversées sur le sol, les entités traversant cette zone doivent passer un test d\'Agilité ou tomber <a href=\'Glossaire.php#a_terre\'>à terre</a>', '10 pa', 1),
('Boite d\'allume-feu (D)', 1, 'Silex, amorces et amadou, tout ce qu\'il faut pour allumer un feu', '5 pc', 1),
('Bougie (D)', 1, 'Faite de cire, cette bougie éclaire une petite zone pendant 2 heures', '1 pc', 1),
('Boulier', 1, 'Cadre de bois remplis de tiges serties de boules servant à compter rapidement de grand nombre.', '2 pa', 1),
('Cadenas', 1, 'Solide cadenas métallique, nécessite au moins 10 DR sur un test étendu de crochetage', '35 pa', 0),
('Carquois (D)', 1, 'Étui en cuir protégeant les munitions à l\'intérieur', '3 pa', 1),
('Chaîne (3 m)', 1, 'Lourde chaîne de métal devant subir 25 dégâts avant de se briser', '35 pa', 2),
('Chausse-trappes (D)', 1, 'Petits picots métalliques présentant toujours une pointe vers le haut recouvrant une zone de 2m x 2m une fois déversées sur le sol, les entités traversant cette zone doivent passer un test d\'Agilité DC 8 (DC 5 si on se déplace à la moitié de sa vitesse), sur un échec on subit une blessure. Tant qu\'elles n\'ont pas récupéré de cette blessure elles conservent cette pénalité de vitesse.', '5 pa', 1),
('Chevalière', 1, 'Bague possédant un relief, permet d\'apposer un sceau à la cire', '20 pa', 0),
('Cire à cacheter (D)', 1, 'Petit bâton de cire à faire fondre pour cacheter des documents importants', '5 pc', 0),
('Cloche', 1, 'Cloche à main résonnant bruyamment quand secouée', '1 pa', 1),
('Corde (15 m)', 1, 'Longue corde en chanvre devant subir 5 dégâts avant de se briser', '1 pa', 1),
('Couverture', 1, 'Peut également servir de tapis de sol, elle tient moins chaud qu\'un sac de couchage mais reste indispensable pour un sommeil de qualité', '5 pc', 1),
('Craie (D)', 1, 'Permet d\'écrire sur presque toutes les surfaces mais s\'efface avec l\'eau', '1 pc', 0),
('Crochets (D)', 1, 'Permet de crocheter des serrures verrouillées, se casse en cas d\'échec du test', '1 po', 0),
('Échelle de corde (5 m)', 1, 'Pliable, elle s\'attache facilement sur un sac et permet de créer un passage facile sur un mur', '5 pc', 2),
('Encre', 1, 'À stockée dans une fiole, à combiner avec une plume d\'écriture', '10 pa', 0),
('Équipement d''escalade', 1, 'Crampons et piolets, accorde 3 avantages pour les épreuves d\'escalade', '25 pa', 2),
('Fiole vide (D)', 1, 'Petit récipient en verre d\'une contenance de 100mL', '1 pa', 0),
('Flasque vide (D)', 1, 'Récipient en verre d\'une contenance d\'un litre', '2 pa', 1),
('Gamelle', 1, 'Assiette creuse accompagnée de couverts, peut également servir de casserole', '2 pc', 1),
('Grappin', 1, 'Permet de sécuriser une corde sans avoir à faire de noeuds, utile lorsque l\'on souhaite escalader une falaise', '5 pa', 1),
('Grimoire', 1, 'Imposant ouvrage relié de cuir', '20 pa', 1),
('Huile', 1, 'Stockée dans une flasque, très inflammable, sert de combustible à lanterne', '5 pc', 0),
('Lampe', 1, 'Faite de métal, cette lampe éclaire une zone modeste et consomme une flasque d\'huile toute les 8 heure', '5 pa', 1),
('Lanterne', 1, 'Faite de métal, cette lanterne éclaire une grande zone, un système de miroir peut être utilisé pour créer un grand cone de lumière, elle consomme une flasque d\'huile toute les 4 heure', '10 pa', 1),
('Livre', 1, 'Petit ouvrage relié de cuir', '15 pa', 1),
('Longue-vue', 1, 'Permet de voir 5 fois plus loin qu\'à l\'oeil nu', '5 po', 1),
('Loupe', 1, 'Permet de grossir 5 fois un objet proche ou d\'allumer un feu s\'il y a du soleil', '2 po', 0),
('Marteau', 1, 'Possède un côté plat pour marteler et un arrache-clou de l\'autre côté, utile dans toute sorte de situation', '2 pa', 1),
('Matériel de pêche', 1, 'Canne, lignes, hameçons et leurres, permet de pêcher n\'importe où. Sur un test étendu de Survie(Dex) DC 5, vous lancez un dé par heure, à la fin du test, diviser le DR total par 2, c\'est le nombre de rations de poisson que vous obtenez.', '1 pa', 2),
('Menottes', 1, 'Solides attaches métalliques devant subir 10 dégâts avant de se briser, pouvant <a href=\'Glossaire.php#entrave\'>entraver</a> une créature de Gabarit Moyen ou Petit.', '25 pa', 1),
('Miroir en acier', 1, 'Petit miroir fort utile pour se recoiffer ou voir sans être vu depuis un mur en angle', '15 pa', 1),
('Palan', 1, 'Système de poulies permettant de monter/descendre de lourdes charges', '3 pa', 1),
('Papier (D)', 1, 'Permet de noter des informations quelconques', '1 pc', 0),
('Parchemin (D)', 1, 'Permet de créer des cartes ou des parchemins magiques', '2 pc', 0),
('Parfum', 1, 'Stocké dans une fiole, peut cacher certaines odeurs, très apprécié dans les évènements mondains', '5 pa', 0),
('Pelle', 1, 'Très utile dès qu\'on veut creuser la terre', '5 pa', 2),
('Perche (3 m)', 1, 'Longue perche de bois possédant de nombreuses applications', '5 pc', 2),
('Pied-de-biche', 1, 'Permet d\'ouvrir par la force les contenants scellés, accorde 2 avantages aux épreuves de Force où il est possible de faire levier', '10 pa', 2),
('Piège à mâchoires', 1, 'Anneau d\'acier en dents de scie s\'activant via une plaque de pression et possédant une chaîne d\'un mètre, une entité activant le piège subit 2d8 dégâts perforants et écrasants et voit sa vitesse divisée par 4 si elle subit une blessure. Tant qu\'elle n\'a pas récupéré de cette blessure elle conserve cette pénalité de vitesse. Elle peut se libérer en passant un test d\'Athlétisme(Force) DC10 avec 2 désavantages.', '25 pa', 2),
('Pierre à aiguiser', 1, 'Petite pierre faite pour affiner le fil d\'une lame', '3 pc', 0),
('Pioche', 1, 'Très utile dès qu\'on veut creuser la pierre', '5 pa', 3),
('Plume d''écriture', 1, 'Permet d\'écrire sur du papier ou du parchemin', '2 pc', 0),
('Pointes en fer (D)', 1, 'Bâtons métalliques de 20cm possédant une tête plate et une pointe, utile dans toute sorte de situations', '1 pa', 1),
('Poire à poudre (D)', 1, 'Conteneur métallique préservant la poudre à canon de l\'humidité', '5 pa', 1),
('Poudre à canon (baril)', 1, 'Stocké dans un baril, cette poudre est parfois utilisée pour creuser rapidement des galeries', '10 pa', 0),
('Poudre à canon (poire)', 1, 'Stockée dans une poire, permet de recharger une arme à feu', '3 pa', 0),
('Rations (D)', 1, 'Aliments appropriés pour un long voyage : viande séchée, fruits secs, biscuit,...', '5 pc', 1),
('Sablier / Clepsydre', 1, 'Petit contenant en verre contenant du sable / de l\'eau mettant un temps déterminé à s\'écouler', '25 pa', 0),
('Sac de couchage', 1, 'Bien enroulé et très chaud, il s\'attache facilement sur un sac à dos et permet de passer sa nuit sans grelotter', '1 pa', 1),
('Savon (D)', 1, 'Petit cube de savon possédant de nombreuses applications', '5 pc', 0),
('Sifflet / Appeau', 1, 'Petit sifflet émettant du bruit dans une zone donnée. Certains imitent le cri d\'un animal.', '5 pc', 0),
('Tente', 1, 'Légère et pliable, elle permet à deux personnes de gabarit Moyen de dormir à l\'abri des intempéries', '10 pa', 2),
('Torche (D)', 1, 'Morceau de bois imbibé d\'huile, elle éclaire une zone moyenne pendant 1 heure', '1 pc', 1),
('Trousse de soins (D)', 1, 'Bandages, aiguille et fil de suture, tout le nécessaire pour panser des plaies. Permet de stabiliser une créature mourante sur un test de Médecine(Int ou Dex) DC 4. La créature mourante passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR de l\'utilisateur de la trousse médicale. Sur une réussite, la créature n\'est plus <a href=\'Glossaire.php#mourant\'>mourante</a> et devient <a href=\'Glossaire.php#stable\'>stable</a>.', '25 pa', 1);

-- --------------------------------------------------------

--
-- Structure de la table `item_category`
--

CREATE TABLE `item_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_50A6F08864C15B1` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `weapon_bonus_dmg` varchar(255) DEFAULT NULL,
  `weapon_passive_effect` longtext DEFAULT NULL,
  `weapon_active_effect` longtext DEFAULT NULL,
  `armor_bonus_protection` varchar(255) DEFAULT NULL,
  `armor_bonus_proctection_magical` varchar(255) DEFAULT NULL,
  `armor_passive_effect` longtext DEFAULT NULL,
  `armor_active_effect` longtext DEFAULT NULL,
  `weapon_price_multiplier` varchar(255) DEFAULT NULL,
  `armor_price_multiplier` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_545A22F5F1D1E281` (`material`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `main_carac` varchar(255) DEFAULT NULL,
  `specialisation_example` longtext DEFAULT NULL,
  `test_example` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4B605775E70B7050` (`skill`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stance`
--

CREATE TABLE `stance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stance` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `effect` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A835F95663C2B574` (`stance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `weapon`
--

CREATE TABLE `weapon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `damage_type` varchar(255) NOT NULL,
  `damage` varchar(255) NOT NULL,
  `handling` varchar(255) NOT NULL,
  `reach` varchar(25) NOT NULL,
  `enc` smallint(6) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6933A7E68C8E3ACE` (`type`),
  KEY `IDX_6933A7E612469DE2` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `weapon`
--

INSERT INTO `weapon` (`type`, `category_id`, `damage_type`, `damage`, `handling`, `reach`, `enc`, `price`) VALUES
('Arbalète', 1, 'Perforants', '1d10', '2M', '150m', 3, '50'),
('Arbalète à main', 1, 'Perforants', '1d6', '1M', '50m', 1, '75'),
('Arbalète lourde', 1, 'Perforants', '1d12', '2M', '200m', 3, '100'),
('Arc Court', 2, 'Perforants', '1d6', '2M', '100m', 2, '50'),
('Arc Long', 2, 'Perforants', '1d8', '2M', '150m', 2, '75'),
('Bâton', 3, 'Écrasants', '1d4', '1M', 'Longue', 2, '1'),
('Ceste', 4, 'Écrasants', '1d4', '1M', 'Courte', 1, '5'),
('Dague', 5, 'Perforants ou Tranchants', '1d4', '1M', 'Courte', 1, '20'),
('Dague de parade', 5, 'Perforants', '1d4', '1M', 'Courte', 1, '25'),
('Épée Courbe', 6, 'Tranchants', '1d6', '1M', 'Moyenne', 1, '50'),
('Épée Courte', 6, 'Tranchants ou Perforants', '1d6', '1M', 'Moyenne', 1, '50'),
('Épée Longue', 6, 'Tranchants ou Perforants', '1d8', '1M', 'Moyenne', 2, '75'),
('Étoiles de lancer', 13, 'Tranchants', '1d4', '1M', '15m', 0, '5'),
('Fléchettes de lancer', 13, 'Perforants', '1d4', '1M', '15m', 0, '5'),
('Fouet', 9, 'Tranchants', '1d4', '1M', 'Très Longue', 1, '10'),
('Fronde', 10, 'Écrasants', '1d4', '1M', '100m', 1, '5'),
('Grand marteau', 12, 'Écrasants', '1d12', '2M', 'Longue', 3, '75'),
('Grande épée', 6, 'Tranchants ou Perforants', '1d12', '2M', 'Longue', 3, '100'),
('Grande hache', 10, 'Tranchant', '1d12', '2M', 'Longue', 3, '75'),
('Hache de guerre', 10, 'Tranchant', '1d8', '1M', 'Moyenne', 2, '60'),
('Hachette', 10, 'Tranchant', '1d4', '1M', 'Courte', 1, '15'),
('Hallebarde', 13, 'Tranchants ou Perforants', '1d10', '2M', 'Très Longue', 3, '100'),
('Javelot', 13, 'Perforants', '1d4', '1M', 'Longue', 2, '20'),
('Lance', 11, 'Perforants', '1d6', '1M', 'Très Longue', 2, '25'),
('Lance d\'arçon', 11, '-', '1d10', '1M', 'Extrême', 3, '50'),
('Maillet', 12, 'Écrasants', '1d4', '1M', 'Courte', 1, '15'),
('Masse', 12, 'Écrasants', '1d8', '1M', 'Moyenne', 1, '50'),
('Mousquet', 13, 'Perforants et écrasants', '1d12', '2M', '200m', 3, '150'),
('Mousquet à double canon', 13, 'Perforants et écrasants', '1d12', '2M', '200m', 3, '175'),
('Pétoire', 13, 'Perforants et écrasants', '1d6', '1M', '15m', 1, '100'),
('Pique', 11, 'Perforants', '1d10', '2M', 'Extrême', 3, '25'),
('Pistolet à double canon', 13, 'Perforants et écrasants', '1d8', '1M', '100m', 1, '150'),
('Pistolet à silex', 13, 'Perforants et écrasants', '1d8', '1M', '100m', 1, '100'),
('Pistolet de poche', 13, 'Perforants et écrasants', '1d6', '1M', '50m', 1, '100'),
('Poivrière', 13, 'Perforants et écrasants', '1d8', '1M', '100m', 1, '300'),
('Rapière', 13, 'Perforants', '1d6', '1M', 'Moyenne', 1, '50'),
('Sarbacane', 13, 'Perforants', '1d4', '1M', '30m', 1, '1'),
('Tromblon', 13, 'Perforants et écrasants', '1d8', '2M', '15m', 3, '150');

-- --------------------------------------------------------

--
-- Structure de la table `weapon_category`
--

CREATE TABLE `weapon_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `effect` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1981899964C15B1` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `weapon_category`
--

INSERT INTO `weapon_category` (`category`, `description`, `effect`) VALUES
('Arbalète', '', 'Si la cible est adjacente à une surface, le projectile l\'immobilise sur place, la cible peut dépenser une action interagir pour se libérer avec un test d\'Athlétisme avec un DC équivalent à la moitié des dégâts'),
('Arc', '', 'Si la cible est adjacente à une surface, le projectile l\'immobilise sur place, la cible peut dépenser une action interagir pour se libérer avec un test d\'Athlétisme avec un DC équivalent à la moitié des dégâts'),
('Bâton', '', 'La cible doit passer un test de Vigueur avec un DC équivalent à la moitié des dégâts ou être étourdie(1)'),
('Ceste', '', 'La cible est entravée, une lutte est instancié'),
('Dague', '', 'Ignore la PR de la cible'),
('Épée', '', 'La cible ne peut pas prendre de réaction tant qu\'elle est engagée avec l\'assaillant jusqu\'au début du prochain tour de l\'assaillant'),
('Fléau', '', 'La cible est entravée, une lutte est instancié'),
('Fouet', '', 'La cible est entravée, une lutte est instancié'),
('Fronde', '', 'La cible doit passer un test de Vigueur avec un DC équivalent à la moitié des dégâts ou être étourdie(1)'),
('Hache', '', 'L\'attaque se poursuit sur une cible à portée, c\'est un nouvelle passe d\'armes qui subit un désavantage supplémentaire par rapport à la précédente'),
('Lance', '', 'La cible est repoussé d\'un mètre par tranche de 3 dégâts\r\n'),
('Masse', '', 'La cible doit passer un test de Vigueur avec un DC équivalent à la moitié des dégâts ou être étourdie(1)');

-- --------------------------------------------------------

--
-- Structure de la table `weapon_properties`
--

CREATE TABLE `weapon_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weapon_property_id` int(11) NOT NULL,
  `x` varchar(20) DEFAULT NULL,
  `y` varchar(20) DEFAULT NULL,
  `z` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B894FE746C5A615` (`weapon_property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `weapon_properties`
--

INSERT INTO `weapon_properties` (`id`, `weapon_property_id`, `x`, `y`, `z`) VALUES
(1, 19, NULL, NULL, NULL),
(2, 22, '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `weapon_property_weapon`
--

CREATE TABLE `weapon_property_weapon` (
  `weapon_id` int(11) NOT NULL,
  `weapon_property_details_id` int(11) NOT NULL,
  PRIMARY KEY (`weapon_id`,`weapon_property_details_id`),
  KEY `IDX_D3E0E4CF92D4808` (`weapon_id`),
  KEY `IDX_D3E0E4CF5811790` (`weapon_property_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `weapon_property_weapon`
--

INSERT INTO `weapon_property_weapon` (`weapon_id`, `weapon_property_details_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `weapon_property`
--

CREATE TABLE `weapon_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `effect` longtext DEFAULT NULL,
  `example` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_3E7CAD45426B0C57` (`property`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `weapon_property`
--

INSERT INTO `weapon_property` (`property`, `description`, `effect`, `example`) VALUES
('Anti-Large', 'Cette arme est faite pour affronter des ennemis plus larges que soi.', 'Les jets d\'attaques pour toucher les cibles d\'un gabarit supérieur à celui de l\'utilisateur se font avec 1 avantage.', ''),
('Brise-bouclier', 'Cette arme est très efficace contre les boucliers.', 'Les boucliers bloquant une attaque d\'une arme possédant cette propriété voient leur RB divisée par 2 lors du blocage.', ''),
('Capacité(X)', 'Disposant de plusieurs canons ou d\'un autre mécanisme similaire, cette arme peut tirer avec chacun d\'entre eux avant de devoir recharger.', 'L\'arme peut tirer X fois sans être rechargé, chaque mécanisme doit être rechargé individuellement selon la valeur de Rechargement de l\'arme.', ''),
('Chargeur(X, Y)', 'Disposant d\'un mécanisme avancé de chargement des munitions, cette arme peut tirer plusieurs fois sans être rechargée et il suffit de remplacer le chargeur pour que l\'arme soit de nouveau complétement opérationnelle', 'L\'arme peut tirer X fois sans être rechargée.<br/>Remplacer le chargeur coute Y action(s) Interagir, il n\'est pas nécessaire qu\'elles soient consécutives.<br>Si l\'arme possède le trait Rechargement(Z), il est nécessaire d\'effectuer Z action(s) Interagir après un tir avant de pouvoir tirer à nouveau.', ''),
('Dard', 'Cette arme est capable de trouver des failles dans l\'armure de sa cible.', 'Les jets d\'attaque avec un DR supérieur ou égal à 4 ignore l\'armure de la cible.', ''),
('Défensive', 'Étudiée pour protéger son manieur, cette arme facilite les manœuvres défensives', 'Lors d\'une passe d\'arme défensive, l\'arme procure un avantage aux jets de Style de Combat.', ''),
('Dentelée(X)', 'Une lame terrifiante en dent de scie, capable d\'infliger de terribles saignements à sa cible.', 'L\'arme inflige un état Saignement(X) lorsqu\'elle inflige une blessure', ''),
('Déséquilibrée', 'De part son poids ou sa forme, cette arme rend les manœuvres défensives plus complexes', 'Lors d\'une passe d\'armes défensive, l\'arme impose un désavantage aux jets de Style de Combat.', ''),
('Destructrice(X)', 'Particulièrement efficace pour endommager du matériel, cette arme peut rapidement transformer une armure en une boite de conserver, une arme en un joujou inoffensif ou une porte en un tas de brindilles.', 'L\'arme inflige X dégâts supplémentaires aux objets.', 'Une hache d\'incendie Destructrice(3) frappe une porte de Solidité(15), le DC est à 5.\nL\'utilisateur de la hache obtient 9 à son test et obtient donc un DR de +4\nLe jet de dégât de la hache est un 10, le total des dégâts est 10+4+3 = 17.\nLa porte subit donc 17 dégâts, cela excède sa solidité, elle est détruite.'),
('Dispersion', 'Les projectiles tiré par cette arme se dispersent rapidement et perdent en efficacité à longue distance, ils sont dévastateurs à bout portant', 'L\'arme gagne un bonus de +2 pour toucher dans son premier cran de portée, la pénalité subit après le premier cran et doublée (-2 au lieu de -1)', 'Une arme à dispersion avec un cran de portée de 5m dispose d\'un bonus de +2 pour atteindre les cibles à moins de 5m.\r\nEn contrepartie, elle subit un malus de -2 pour une cible située entre 5 et 10m, un malus de -4 pour une cible entre 10 et 15m et ainsi de suite'),
('Duel', 'Cette arme est faite pour le duel.', ' Les jets de Style de Combat se font avec un avantage en combat singulier, mais un désavantage en infériorité numérique.', ''),
('Excellence', 'Cette arme est d\'une qualité supérieure', 'Les jets de dégâts lancent deux fois les dés et ne gardent que le meilleur de deux résultats.\nDans le cas d\'une arme avec plusieurs dés de dégâts, on lance deux fois le groupe de dés et on conserve le meilleur groupe', 'Une arme d\'excellence (Dgt 1d8) lance deux fois son dé de dégâts et obtient 3 et 5. Son utilisateur peut choisir le résultat qu\'il préfère.\r\nUne arme d\'excellence (Dgt 2d4) lance deux fois la paire de dés et obtient deux résultats 1+3 ou 2+4. Son utilisateur choisit d\'infliger 4 ou 6 dégâts selon sa préférence. '),
('Force', 'Maniée par un puissant mage, ces armes sont dévastatrices', 'L\'arme gagne un bonus aux dégâts équivalent à la compétence magique (Altération, Domination, Invocation) la plus élevé du manieur', ''),
('Impact', 'Les coups délivrés par cette arme peuvent envoyer valser leur cible', 'La cible est déplacée d\'un mètre par tranche de 3 dégâts, déplacement forcé, directions possibles : gauche droite, arrière', ''),
('Lancer(X)', 'Cette arme est suffisamment équilibrée pour être lancée.', ' L\'arme possède un cran de portée équivalent à X. Un lancer d\'arme est traité comme une attaque à distance normale (mais la Force peut être utilisée pour le test de Style de Combat). Le dé de dégâts de l\'arme augmente d\'un <a href=\'Systeme.php#cran_des\'>cran</a> si elle est lancée', ''),
('Lunette(X)', 'Un système complexe de lentilles est monté sur l\'arme, permettant des tirs à très longue distance', 'La pénalité de portée ne s\'applique pas sur les X premiers crans de portée au delà du premier et s\'applique normalement ensuite.\nCet effet n\'est pas applicable sur une arme effectuant une attaque à Dispersion.', 'Une arme à Lunette(1) avec un cran de portée de 20m ne subit aucun malus pour atteindre des cibles situées à moins de 40m. Elle subit un malus de -1 pour les cibles entre 40 et 60m.\r\nSi elle possède une Lunette(3), elle ne subirait pas de malus pour les cibles à moins de 80m et un malus de -1 pour les cibles entre 80 et 100m.'),
('Montée', 'Sur le dos d\'une monture, cette arme s\'avère remarquable', 'Cette arme n\'est utilisable que depuis une monture pour des raisons de poids et de maniabilité.\nL\'attaque se fait lors d\'une charge.', ''),
('Perce-Armure(X)', 'Les frappes de cette arme sont d\'une telle puissance qu\'elle ne fait pas grand cas de l\'armure de ses victimes', 'L\'arme ignore X PR de la cible qu\'importe les conditions.', ''),
('Petite', 'Relativement petite, facilement dissimulable, une arme de choix pour un roublard digne de ce nom', 'L\'arme ne peut être utilisée pour parer les coups des armes maniées à deux mains. \nL\'utilisateur peut passer un test de Roublardise opposé à l\'Observation de l\'adversaire pour dissimuler l\'arme. \nCette arme n\'est pas affectée par les malus dans les espaces clos. \nAttaquer avec une arme dissimulée procure 3 avantages lors d\'une passe d\'arme.', ''),
('Pointes', 'L\'arme est recouverte de pointes', 'La résistance la plus faible entre le type de dégâts de base et les dégâts Perforants de la cible sont prise en compte lors du calcul des dégâts.', 'Une cible avec résistance(5, contondant) et (3, Perforant) subissant 4 dégâts d\'une arme contondante à pointes subira 4+3=7 dégâts'),
('Primitive', 'Cette arme est d\'une qualité inférieure', 'Les jets de dégâts lancent deux fois les dés et ne gardent que le pire de deux résultats.\nDans le cas d\'une arme avec plusieurs dés de dégâts, on lance deux fois le groupe de dés et on conserve le pire groupe.', 'Une arme primitive (Dgt 1d10) lance deux fois son dé de dégâts et obtient 4 et 9, son utilisateur n\'a pas le choix et doit choisir le 4.\nUne arme primitive (Dgt 2d6) lance deux fois la paire de dés et obtient deux résultats 2+3 ou 5+4. l\'arme inflige 5 dégâts. '),
('Rechargement(X)', 'Cette arme doit être rechargée avant d\'être utilisée', 'L\'arme nécessite X action Interagir avant de pouvoir tirer à nouveau.', ''),
('Sentinelle', 'L\'arme est doté d\'un pouvoir d\'arrêt impressionnant', 'La cible d\'une frappe voit sa vitese réduite d\'un montant équivalent à la moitié des dégâts jusqu\'au début du prochain tour de l\'assaillant.', ''),
('Zone(Y, X)', 'Au lieu d\'une cible unique, cette arme est capable d\'en atteindre plusieurs d\'une seule frappe', 'La frappe touche toutes les cibles présentent dans une zone de type Y avec une magnitude X.\nL\'assaillant effectue une passe d\'arme contre chacune des cibles et conserve le même jet d\'attaque et jet de dégâts pour toutes les cibles.', '');

-- --------------------------------------------------------

--
-- Structure de la table `web_content`
--

CREATE TABLE `web_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_96187B2B84800E54` (`page`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- AUTO_INCREMENT pour les tables déchargées
--

ALTER TABLE `armor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `changelog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `combat_art`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `damage_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `glossary_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `glossary_trait`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `item_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `stance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `weapon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `weapon_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `weapon_properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `weapon_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `web_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `armor_material`
--
ALTER TABLE `armor_material`
  ADD CONSTRAINT `FK_29DBA0B129DBA0B1` FOREIGN KEY (`armor_material`) REFERENCES `material` (`id`),
  ADD CONSTRAINT `FK_29DBA0B15329CCE5` FOREIGN KEY (`armor_category`) REFERENCES `armor` (`id`);

--
-- Contraintes pour la table `combat_art_weapon_category`
--
ALTER TABLE `combat_art_weapon_category`
  ADD CONSTRAINT `FK_B04BE02052A7FB94` FOREIGN KEY (`combat_art_id`) REFERENCES `combat_art` (`id`),
  ADD CONSTRAINT `FK_B04BE0207758AB08` FOREIGN KEY (`weapon_category_id`) REFERENCES `weapon_category` (`id`);

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_1F1B251E12469DE2` FOREIGN KEY (`category_id`) REFERENCES `item_category` (`id`);

--
-- Contraintes pour la table `weapon`
--
ALTER TABLE `weapon`
  ADD CONSTRAINT `FK_6933A7E612469DE2` FOREIGN KEY (`category_id`) REFERENCES `weapon_category` (`id`);

--
-- Contraintes pour la table `weapon_properties`
--
ALTER TABLE `weapon_properties`
  ADD CONSTRAINT `FK_B894FE746C5A615` FOREIGN KEY (`weapon_property_id`) REFERENCES `weapon_property` (`id`);

--
-- Contraintes pour la table `weapon_property_weapon`
--
ALTER TABLE `weapon_property_weapon`
  ADD CONSTRAINT `FK_D3E0E4CF92D4808` FOREIGN KEY (`weapon_id`) REFERENCES `weapon` (`id`),
  ADD CONSTRAINT `FK_D3E0E4CF5811790` FOREIGN KEY (`weapon_property_details_id`) REFERENCES `weapon_properties` (`id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
