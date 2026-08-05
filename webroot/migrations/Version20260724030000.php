<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260724030000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Insert 31 spells from original MySQL sorts table';
    }

    public function up(Schema $schema): void
    {
        // Altération (18 sorts)
        $this->addSql("INSERT INTO \"sort\" (id, effet, propriete, ecole, dc, magnitude, description, inkarnai) VALUES
            (3, 'Aspect animal', NULL, 'Altération', '4+2X', 'Formula 1+1X', 'La cible se métamorphose en un animal (catégorie bête ou vermine) Menace [Mag]', 'Kynigi'),
            (4, 'Aisance aquatique', NULL, 'Altération', '3+2X', 'Time une heure', 'La cible obtient le trait Amphibien et peut respirer sous l''eau pendant [Mag].', 'Nero'),
            (5, 'Marche aquatique', NULL, 'Altération', '2+2X', 'Time une heure', 'La cible peut marcher sur l''eau comme si elle marchait sur la terre ferme pendant [Mag].', 'Nero'),
            (6, 'Chute ralentie', 'Réaction', 'Altération', '3+2X', 'Double 5', 'La cible ignore les [Mag] premiers mètres de sa prochaine chute lors du calcul des dégâts.', 'Aïgida'),
            (7, 'Lévitation', 'Concentration, Réaction', 'Altération', '6+2X', 'Double 3', 'La cible obtient une vitesse de déplacement en vol de [Mag] mètres par round.', 'Aïgida'),
            (8, 'Saut', NULL, 'Altération', '2+2X', 'Double 1', 'La cible pourra parcourir [Mag] mètre(s)s supplémentaire(s) en hauteur et le double en longueur lors de son prochain saut dans la minute qui suit l''incantation du sort.', 'Aïgida'),
            (9, 'Verrouillage', NULL, 'Altération', '3+3X', 'Double 5', 'La serrure ciblé devient verrouillée. Ouvrir cette serrure nécessite un test étendu de crochetage avec un DR total de [Mag].', 'Ourgal'),
            (10, 'Déverrouillage', NULL, 'Altération', '3+3X', 'Double 5', 'La serrure ciblé ajoute [Mag] DR au total nécessaire à la déverrouiller.', 'Ourgal'),
            (11, 'Transmutation', NULL, 'Altération', '10+1X', 'Dice_nb 2d4', 'Le lanceur lance [Mag] et en fait le total, si le résultat dépasse la résistance magique de la cible, elle devient métallique ou minérale. Une cible métamorphosée en pierre ou en métal est invulnérable aux dégâts du temps et son poids est multiplié par 5. L''effet dure indéfiniment tant que la cible ne brise pas le sort.<br/>Pour se libérer, la cible peut effectuer chaque jour un jet d''Altération(Volonté ou Vigueur) avec un DC équivalent au résultat du lanceur. Le Nombre de DR (NDR) qu''il doit rassembler pour se libérer équivaut à la somme des d4 lancés initialement par le lanceur.', 'Ourgal'),
            (12, 'Renforcement [Caractéristique]', '[Force, Dextérité, Agilité, Vigueur, Intelligence, Volonté, Perception, Éloquence]', 'Altération', '4+3X', 'Formula 1+1X', 'La cible voit sa [Caractéristique] augmenter de [Mag] cran(s) pendant une minute.', 'Agones, Eftis, Orizo, Kynigi, Psema'),
            (13, 'Affaiblissement [Caractéristique]', '[Force, Dextérité, Agilité, Vigueur, Intelligence, Volonté, Perception, Éloquence]', 'Altération', '4+3X', 'Formula 1+1X', 'La [Caractéristique] de la cible diminue de [Mag] crans pendant une minute.<br/>Pour se libérer, la cible peut effectuer chaque round un test de Vigueur dans le cas d''une caractéristique physique ou de Volonté pour une caractéristique mentale avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu''il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.', 'Agones, Eftis, Orizo, Kynigi, Psema'),
            (14, 'Résistance [Élément]', '[Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]', 'Altération', '3+2X', 'Formula 1+1X', 'Procure à la cible le trait Résistance([Mag],[élément]).', 'Aïgida, Anathos, Horoï, Kuga, Nero, Safi'),
            (15, 'Vulnérabilité [Élément]', 'Concentration, [Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]', 'Altération', '3+2X', 'Formula 1+1X', 'La cible subit le trait Vulnérabilité([Mag],[élément]).<br/>Pour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu''il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.', 'Aïgida, Anathos, Horoï, Kuga, Nero, Safi'),
            (16, 'Guérison', NULL, 'Altération', '4', '-', 'La cible passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR du lanceur. Sur une réussite, la cible guérie d''une blessure. Chaque palier de 3 DR de la cible soigne une blessure supplémentaire.', 'Agapi'),
            (17, 'Stabilisation', NULL, 'Altération', '4', '-', 'La cible passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR du lanceur. Sur une réussite, la cible n''est plus mourante et devient stable.', 'Agapi'),
            (18, 'Récupération', NULL, 'Altération', '2', '-', 'La cible passe un test de Vigueur pour les traumas Physiques ou de Volonté pour les traumas Mentaux avec un DC équivalent au triple de ses traumas physiques/mentuax et un bonus équivalent au DR du lanceur. Sur une réussite, la cible guérie d''un trauma. Chaque palier de 3 DR de la cible soigne un trauma supplémentaire.', 'Agapi'),
            (19, 'Purge', 'Concentration', 'Altération', '3+2X', 'AD +1', 'La cible obtient [Mag] avantages pour résister et purger les effets négatifs(Vulnérabilité, Saignement, Poison, etc..) tant que le lanceur se concentre sur le sort.', 'Agapi'),
            (20, 'Invisibilité', 'Concentration', 'Altération', '8', '-', 'La cible devient invisible et le reste tant que le lanceur se concentre sur le sort.', 'Safi')");

        // Conjuration (13 sorts)
        $this->addSql("INSERT INTO \"sort\" (id, effet, propriete, ecole, dc, magnitude, description, inkarnai) VALUES
            (21, 'Armure', '[Physique, Magique]', 'Conjuration', '4+3X', 'Formula 1+1X', 'La résistance [type] de la cible augmente de [Mag].', 'Pravoï'),
            (27, 'Protection', 'Réaction', 'Conjuration', '3+3X', 'Double 2', 'Réduis les dégâts subis par la cible de [Mag] pour une instance de dégâts dans la minute qui suit l''incantation du sort.', 'Pravoï'),
            (30, 'Entrave', 'Concentration', 'Conjuration', '4+2X', 'AD -0', 'La cible est immobilisée.<br/>Pour se libérer, la cible peut effectuer chaque round un test de Force, de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu''il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.', 'Pravoï'),
            (33, 'Toile d''araignée', NULL, 'Conjuration', '3+3X', 'Double 2', 'L''endroit ciblé par le lanceur diminue la vitesse des entité le traversant de [Mag].', 'Kynigi'),
            (39, 'Invocation de Karnarim élémentaire', '[Acide, Eau, Feu, Foudre, Glace, Lumière, Métal, Nécrotique, Pierre, Poison, Sable, Terre]', 'Conjuration', '6', '-', 'Invoque un Karnarim de l''[élément] pendant une minute. Voir Élémentaire mineur dans le Bestiaire.', 'Aïgida, Anathos, Horoï, Kormo, Kuga, Nero, Ourgal, Safi'),
            (45, 'Invocation d''Arme', NULL, 'Conjuration', '6+2X', 'Dice_scale 1d4', 'Invoque une arme infligeant [Mag] dégâts magiques à l''endroit ciblé, cette arme peut utiliser la caractéristique de Volonté du lanceur pour les jets de Style de Combat.', 'Agones'),
            (48, 'Projection psychique', 'Concentration', 'Conjuration', '10', '-', 'L''esprit de cible est envoyé dans un domaine de Karnaï.<br/>Sans esprit pour le contrôler, le corps de la cible est inanimé pendant cette période. Une minute dans le monde matériel équivaut à une heure dans le monde de Karnaï.<br/>L''esprit de la cible doit consentir à ce voyage ou au moins ne pas y être opposée sinon le lanceur risque de perdre son propre esprit lors de l''incantation.', 'Selon le domaine visité'),
            (51, 'Bannissement', NULL, 'Conjuration', '0', '-', 'La cible est renvoyé dans sa dimension d''Origine.<br/>Elle doit passer un test de Vigueur ou Volonté opposé à l''incantation du lanceur si elle souhaite résister.<br/>Si l''invocateur de la cible est conscient de la tentative de bannissement, il peut effectuer le test à la place de la cible en utilisant sa compétence de Conjuration.', 'Pravoï'),
            (54, 'Pas de l''ombre', NULL, 'Conjuration', '6+2X', 'Distance 10 mètres', 'La cible doit se tenir dans une ombre. Elle se téléporte dans une autre ombre située à moins de [Mag] de sa position. Si elle souhaite résister, elle doit passer un test de Volonté avec un DC équivalent au résultat du lanceur.', 'Eftis'),
            (57, 'Téléportation', NULL, 'Conjuration', '8', 'Distance 10 mètres', 'La cible se téléporte sur une distance de [Mag] ou moins dans un éclair de lumière. Si elle souhaite résister, elle doit passer un test de Volonté avec un DC équivalent au résultat du lanceur.', 'Safi'),
            (60, 'Racines du monde', NULL, 'Conjuration', '6', 'Distance 10 mètres', 'La cible se téléporte via les racines d''un arbre sur une distance de [Mag] ou moins, elle doit être en contact avec un arbre en vie et réapparaître sur un autre arbre en vie. Si elle souhaite résister, elle doit passer un test de Volonté avec un DC équivalent au résultat du lanceur.', 'Kormo'),
            (63, 'Assaut minéral', '[Métal, Pierre, Terre, Sable]', 'Conjuration', '2+2X', 'Dice_scale d2', 'La cible subit [Mag] dégâts physiques.', 'Kormo, Ourgal'),
            (66, 'Assaut élémentaire', '[Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]', 'Conjuration', '2+2X', 'Dice_scale d2', 'La cible subit [Mag] dégâts d''[Élément].', 'Aïgida, Anathos, Horoï, Kuga, Nero, Safi')");

        // Domination (9 sorts)
        $this->addSql("INSERT INTO \"sort\" (id, effet, propriete, ecole, dc, magnitude, description, inkarnai) VALUES
            (90, 'Réanimation', NULL, 'Domination', '6+2X', 'Gabarit P && Time une heure', 'La cible doit être une créature inanimé de gabarit [Mag] ou moins pendant [Mag]. La créature réanimé agit comme bon lui semble.', 'Anathos'),
            (91, 'Contrôle mental', 'Concentration', 'Domination', '6', '-', 'La cible passe sous le contrôle du lanceur.<br/>Pour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu''il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.', 'Kynigi, Kormo, Psema'),
            (92, 'Réécriture mémorielle', NULL, 'Domination', '8', '-', 'La dernière minute de mémoire de la cible est modifiée par le lanceur.<br/>Pour résister, la cible peut passer un test de Vigueur ou de Volonté avec un DC équivalent au résultat du lanceur.<br/>Si la modification porte sur une période minoritaire de la vie de la cible et qu''elle est incohérente ou trop contradictoire avec le comportement habituel de la cible, elle considérera les effets du sort comme une hallucination/mauvais rêve. Dans le cas d''une modification de grande ampleur (au moins la moitié de la vie de la cible), seules les pensés incohérentes sont perçues comme des mauvais rêves.', 'Psema'),
            (93, 'Mot de pouvoir : Douleur', 'Concentration', 'Domination', '4+2X', 'Double 1 && AD -1', 'La cible voie sa vitesse diminuée de [Mag] et effectue toute action (sauf se libérer) avec [Mag] désavantage(s).<br/>Pour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu''il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.', 'Psema'),
            (94, 'Mot de pouvoir : Mort', NULL, 'Domination', '15', '-', 'La cible meurt instantanément.<br/>Pour résister, la cible peut lancer son dé de Vigueur et son dé de Volonté, en faire la somme et la comparer au résultat du lanceur.', 'Anathos'),
            (95, 'Télékinésie', 'Concentration', 'Domination', '2+2X', 'Formula 1+1X', 'La cible obtient le trait Télékinésiste([Mag]).', 'Agones'),
            (96, 'Peur', NULL, 'Domination', '5', '1 minute', 'La cible est Effrayé(lanceur).<br/>Pour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu''il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.', 'Agapi, Psema'),
            (97, 'Calme', NULL, 'Domination', '5', '1 minute', 'La cible est fasciné.<br/>Pour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu''il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.', 'Psema'),
            (98, 'Rage', NULL, 'Domination', '5', '1 minute', 'La cible considère tout le monde comme un adversaire.<br/>Pour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu''il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.', 'Agones')");

        // Domination suite
        $this->addSql("INSERT INTO \"sort\" (id, effet, propriete, ecole, dc, magnitude, description, inkarnai) VALUES
            (99, 'Silence', NULL, 'Domination', '5', '1 minute', 'La cible est incapable de parler.<br/>Pour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu''il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.', 'Psema'),
            (100, 'Apparence trompeuse', 'Concentration', 'Domination', '6', '-', 'La cible est perçue comme quelqu''un d''autre.<br/>Se rendre compte du sort nécessite de passer un test d''Observation(Per) ou d''Arcanes(Int ou Per) avec un DC équivalent au résultat du lanceur de sort.', 'Psema')");

        // Mysticisme (11 sorts)
        $this->addSql("INSERT INTO \"sort\" (id, effet, propriete, ecole, dc, magnitude, description, inkarnai) VALUES
            (101, 'Télépathie', 'Concentration', 'Mysticisme', '2', '-', 'La cible obtient le trait Télépathe.', 'Orizo'),
            (102, 'Archives d''Orizo', NULL, 'Mysticisme', '2+2X', 'AD +1', 'Le prochain test de compétence de la cible pouvant être facilité avec des connaissances spécifiques se fera avec [Mag] avantage(s).', 'Orizo'),
            (103, 'Détection de la vie / des morts / de la magie', NULL, 'Mysticisme', '3+1X', 'Double 10', 'Détecte les être vivants / les morts / la magie dans un rayon de [Mag] mètres du point d''impact du sort.', 'Kynigi, Anathos, Orizo'),
            (104, 'Vision véritable', 'Concentration', 'Mysticisme', '6', '-', 'La cible voit tout, même les entités invisibles, peut voir dans le noir le plus complet et même dans une obscurité magique.<br/>La cible peut voir grâce à ce sort même si elle est aveugle.', 'Orizo'),
            (105, 'Destinée', NULL, 'Mysticisme', '6+2X', 'Dice_nb 2d6', 'Le lanceur peut ajouter/enlever le résultat d''un des dés lancés par ce sort pour modifier le résultat de n''importe quel test. (Le lanceur doit annoncer l''utilisation d''un dé pré-tiré avant que le dé ne soit lancé).', 'Tychi'),
            (106, 'Augure', NULL, 'Mysticisme', '5', '-', 'La cible est avertie de son futur proche. (fortune, péril, les deux ou rien).', 'Tychi'),
            (107, 'Prophétie', NULL, 'Mysticisme', '10', '-', 'La cible obtient une réponse fiable sur un évènement à venir dans les 7 jours. (avoir recours à cet effet sans 7 jours d''intervalles augmente de 25% les chances de réponse aléatoires).', 'Tychi'),
            (108, 'Communion avec la nature', NULL, 'Mysticisme', '6', '-', 'La cible obtient trois informations sur son environnement.', 'Kormo et Kynigi'),
            (109, 'Localisation d''entité', 'Concentration', 'Mysticisme', '4+2X', 'Distance 100 mètres', 'La cible connait la position de l''entité de son choix dans un rayon de [Mag].', 'Kynigi'),
            (110, 'Langue enchantée', 'Concentration', 'Mysticisme', '4', '-', 'La cible sait parler dans toute les langues tant que le lanceur se concentre sur le sort.', 'Orizo'),
            (111, 'Lien sensoriel', 'Concentration', 'Mysticisme', '6+2X', 'Distance 100 mètres', 'La cible peut voir/entendre/sentir à travers les sens d''une créature consentante dans un rayon de [Mag].', 'Kynigi')");

        // Conjuration suite (6 sorts)
        $this->addSql("INSERT INTO \"sort\" (id, effet, propriete, ecole, dc, magnitude, description, inkarnai) VALUES
            (69, 'Création élémentaire', '[Glace, Métal, Pierre, Sable, Terre]', 'Conjuration', '2+2X', 'Double 10 && Time une minute', 'L''[élément] apparaît à l''endroit ciblé pendant [Mag]. La création doit subir [Mag] dégâts avant de se briser.', 'Kormo, Nero, Ourgal'),
            (72, 'Bourrasque', 'Concentration', 'Conjuration', '2+2X', 'Double 10', 'Invoque du vent se déplaçant à [Mag] km/h à l''endroit ciblé, la direction du vent est au choix du lanceur.', 'Aïgida'),
            (75, 'Spores [type]', '[Paralysie, Sommeil, Fascination, Confusion,...]', 'Conjuration', '5', '-', 'Invoque des spores infligeant l''effet [type].<br/>Pour se libérer, la cible peut effectuer un test de Force, de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu''il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.<br/>La fréquence du test dépend du [type] :Paralysie/Fascination/Confusion -> chaque round ; sommeil chaque minute', 'Kormo'),
            (78, 'Contrôle de la température', 'Concentration', 'Conjuration', '2+3X', 'Double 5', 'Augmente ou diminue la température ambiante de la cible de [Mag] C°.', 'Horoï'),
            (84, 'Lumière', NULL, 'Conjuration', '2+2X', 'Double 5 && Time une heure', 'Génère de la lumière vive sur [Mag] mètres et de la lumière faible sur [Mag]*2 mètres de façon circulaire pendant [Mag].', 'Safi'),
            (87, 'Création illusoire', NULL, 'Conjuration', '3+2', 'Gabarit TP && Time une minute', 'Façonne une création intangible de la forme souhaitée avec sons et odeurs de gabarit [Mag] ou moins pendant [Mag] minute. Un test d''Observation ou d''Investigation avec un DC équivalent au résultat du lanceur est nécessaire pour se rendre compte de l''illusion sans la toucher.', 'Psema')");

        // Création index
        $this->addSql('CREATE INDEX idx_sort_ecole ON "sort" (ecole)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX IF EXISTS idx_sort_ecole');
        $this->addSql('DELETE FROM "sort"');
    }
}
