<?php

namespace App\DataFixtures;

use App\Entity\Sort;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SortFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $sortsData = [
            ['effet' => 'Aspect animal', 'propriete' => NULL, 'ecole' => 'Altération', 'dc' => '4+2X', 'magnitude' => 'Formula 1+1X', 'description' => 'La cible se métamorphose en un animal (catégorie bête ou vermine) Menace [Mag]', 'inkarnai' => 'Kynigi'],
            ['effet' => 'Aisance aquatique', 'propriete' => NULL, 'ecole' => 'Altération', 'dc' => '3+2X', 'magnitude' => 'Time une heure', 'description' => 'La cible obtient le trait Amphibien et peut respirer sous l\'eau pendant [Mag].', 'inkarnai' => 'Nero'],
            ['effet' => 'Marche aquatique', 'propriete' => NULL, 'ecole' => 'Altération', 'dc' => '2+2X', 'magnitude' => 'Time une heure', 'description' => 'La cible peut marcher sur l\'eau comme si elle marchait sur la terre ferme pendant [Mag].', 'inkarnai' => 'Nero'],
            ['effet' => 'Chute ralentie', 'propriete' => 'Réaction', 'ecole' => 'Altération', 'dc' => '3+2X', 'magnitude' => 'Double 5', 'description' => 'La cible ignore les [Mag] premiers mètres de sa prochaine chute lors du calcul des dégâts.', 'inkarnai' => 'Aïgida'],
            ['effet' => 'Lévitation', 'propriete' => 'Concentration, Réaction', 'ecole' => 'Altération', 'dc' => '6+2X', 'magnitude' => 'Double 3', 'description' => 'La cible obtient une vitesse de déplacement en vol de [Mag] mètres par round.', 'inkarnai' => 'Aïgida'],
            ['effet' => 'Saut', 'propriete' => NULL, 'ecole' => 'Altération', 'dc' => '2+2X', 'magnitude' => 'Double 1', 'description' => 'La cible pourra parcourir [Mag] mètre(s)s supplémentaire(s) en hauteur et le double en longueur lors de son prochain saut dans la minute qui suit l\'incantation du sort.', 'inkarnai' => 'Aïgida'],
            ['effet' => 'Verrouillage', 'propriete' => NULL, 'ecole' => 'Altération', 'dc' => '3+3X', 'magnitude' => 'Double 5', 'description' => 'La serrure ciblé devient verrouillée. Ouvrir cette serrure nécessite un test étendu de crochetage avec un DR total de [Mag].', 'inkarnai' => 'Ourgal'],
            ['effet' => 'Déverrouillage', 'propriete' => NULL, 'ecole' => 'Altération', 'dc' => '3+3X', 'magnitude' => 'Double 5', 'description' => 'La serrure ciblé ajoute [Mag] DR au total nécessaire à la déverrouiller.', 'inkarnai' => 'Ourgal'],
            ['effet' => 'Transmutation', 'propriete' => NULL, 'ecole' => 'Altération', 'dc' => '10+1X', 'magnitude' => 'Dice_nb 2d4', 'description' => 'Le lanceur lance [Mag] et en fait le total, si le résultat dépasse la résistance magique de la cible, elle devient métallique ou minérale.', 'inkarnai' => 'Ourgal'],
            ['effet' => 'Renforcement [Caractéristique]', 'propriete' => '[Force, Dextérité, Agilité, Vigueur, Intelligence, Volonté, Perception, Éloquence]', 'ecole' => 'Altération', 'dc' => '4+3X', 'magnitude' => 'Formula 1+1X', 'description' => 'La cible voit sa [Caractéristique] augmenter de [Mag] cran(s) pendant une minute.', 'inkarnai' => 'Agones, Eftis, Orizo, Kynigi, Psema'],
            ['effet' => 'Affaiblissement [Caractéristique]', 'propriete' => '[Force, Dextérité, Agilité, Vigueur, Intelligence, Volonté, Perception, Éloquence]', 'ecole' => 'Altération', 'dc' => '4+3X', 'magnitude' => 'Formula 1+1X', 'description' => 'La [Caractéristique] de la cible diminue de [Mag] crans pendant une minute.', 'inkarnai' => 'Agones, Eftis, Orizo, Kynigi, Psema'],
            ['effet' => 'Résistance [Élément]', 'propriete' => '[Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]', 'ecole' => 'Altération', 'dc' => '3+2X', 'magnitude' => 'Formula 1+1X', 'description' => 'Procure à la cible le trait Résistance([Mag],[élément]).', 'inkarnai' => 'Aïgida, Anathos, Horoï, Kuga, Nero, Safi'],
            ['effet' => 'Vulnérabilité [Élément]', 'propriete' => 'Concentration, [Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]', 'ecole' => 'Altération', 'dc' => '3+2X', 'magnitude' => 'Formula 1+1X', 'description' => 'La cible subit le trait Vulnérabilité([Mag],[élément]).', 'inkarnai' => 'Aïgida, Anathos, Horoï, Kuga, Nero, Safi'],
            ['effet' => 'Guérison', 'propriete' => NULL, 'ecole' => 'Altération', 'dc' => '4', 'magnitude' => '-', 'description' => 'La cible passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR du lanceur. Sur une réussite, la cible guérie d\'une blessure.', 'inkarnai' => 'Agapi'],
            ['effet' => 'Stabilisation', 'propriete' => NULL, 'ecole' => 'Altération', 'dc' => '4', 'magnitude' => '-', 'description' => 'La cible passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR du lanceur. Sur une réussite, la cible n\'est plus mourante et devient stable.', 'inkarnai' => 'Agapi'],
            ['effet' => 'Récupération', 'propriete' => NULL, 'ecole' => 'Altération', 'dc' => '2', 'magnitude' => '-', 'description' => 'La cible passe un test de Vigueur pour les traumas Physiques ou de Volonté pour les traumas Mentaux avec un DC équivalent au triple de ses traumas. Sur une réussite, la cible guérie d\'un trauma.', 'inkarnai' => 'Agapi'],
            ['effet' => 'Purge', 'propriete' => 'Concentration', 'ecole' => 'Altération', 'dc' => '3+2X', 'magnitude' => 'AD +1', 'description' => 'La cible obtient [Mag] avantages pour résister et purger les effets négatifs(Vulnérabilité, Saignement, Poison, etc..) tant que le lanceur se concentre sur le sort.', 'inkarnai' => 'Agapi'],
            ['effet' => 'Invisibilité', 'propriete' => 'Concentration', 'ecole' => 'Altération', 'dc' => '8', 'magnitude' => '-', 'description' => 'La cible devient invisible et le reste tant que le lanceur se concentre sur le sort.', 'inkarnai' => 'Safi'],
            ['effet' => 'Armure', 'propriete' => '[Physique, Magique]', 'ecole' => 'Conjuration', 'dc' => '4+3X', 'magnitude' => 'Formula 1+1X', 'description' => 'La résistance [type] de la cible augmente de [Mag].', 'inkarnai' => 'Pravoï'],
            ['effet' => 'Protection', 'propriete' => 'Réaction', 'ecole' => 'Conjuration', 'dc' => '3+3X', 'magnitude' => 'Double 2', 'description' => 'Réduis les dégâts subis par la cible de [Mag] pour une instance de dégâts dans la minute qui suit l\'incantation du sort.', 'inkarnai' => 'Pravoï'],
            ['effet' => 'Entrave', 'propriete' => 'Concentration', 'ecole' => 'Conjuration', 'dc' => '4+2X', 'magnitude' => 'AD -0', 'description' => 'La cible est immobilisée. Pour se libérer, la cible peut effectuer chaque round un test de Force, de Vigueur ou de Volonté avec un DC équivalent au cercle du sort.', 'inkarnai' => 'Pravoï'],
            ['effet' => 'Toile d\'araignée', 'propriete' => NULL, 'ecole' => 'Conjuration', 'dc' => '3+3X', 'magnitude' => 'Double 2', 'description' => 'L\'endroit ciblé par le lanceur diminue la vitesse des entité le traversant de [Mag].', 'inkarnai' => 'Kynigi'],
            ['effet' => 'Invocation de Karnarim élémentaire', 'propriete' => '[Acide, Eau, Feu, Foudre, Glace, Lumière, Métal, Nécrotique, Pierre, Poison, Sable, Terre]', 'ecole' => 'Conjuration', 'dc' => '6', 'magnitude' => '-', 'description' => 'Invoque un Karnarim de l\'[élément] pendant une minute.', 'inkarnai' => 'Aïgida, Anathos, Horoï, Kormo, Kuga, Nero, Ourgal, Safi'],
            ['effet' => 'Invocation d\'Arme', 'propriete' => NULL, 'ecole' => 'Conjuration', 'dc' => '6+2X', 'magnitude' => 'Dice_scale 1d4', 'description' => 'Invoque une arme infligeant [Mag] dégâts magiques à l\'endroit ciblé.', 'inkarnai' => 'Agones'],
            ['effet' => 'Projection psychique', 'propriete' => 'Concentration', 'ecole' => 'Conjuration', 'dc' => '10', 'magnitude' => '-', 'description' => 'L\'esprit de cible est envoyé dans un domaine de Karnaï.', 'inkarnai' => 'Selon le domaine visité'],
            ['effet' => 'Bannissement', 'propriete' => NULL, 'ecole' => 'Conjuration', 'dc' => '0', 'magnitude' => '-', 'description' => 'La cible est renvoyé dans sa dimension d\'Origine.', 'inkarnai' => 'Pravoï'],
            ['effet' => 'Pas de l\'ombre', 'propriete' => NULL, 'ecole' => 'Conjuration', 'dc' => '6+2X', 'magnitude' => 'Distance 10 mètres', 'description' => 'La cible doit se tenir dans une ombre. Elle se téléporte dans une autre ombre située à moins de [Mag] de sa position.', 'inkarnai' => 'Eftis'],
            ['effet' => 'Téléportation', 'propriete' => NULL, 'ecole' => 'Conjuration', 'dc' => '8', 'magnitude' => 'Distance 10 mètres', 'description' => 'La cible se téléporte sur une distance de [Mag] ou moins dans un éclair de lumière.', 'inkarnai' => 'Safi'],
            ['effet' => 'Racines du monde', 'propriete' => NULL, 'ecole' => 'Conjuration', 'dc' => '6', 'magnitude' => 'Distance 10 mètres', 'description' => 'La cible se téléporte via les racines d\'un arbre sur une distance de [Mag] ou moins.', 'inkarnai' => 'Kormo'],
            ['effet' => 'Assaut minéral', 'propriete' => '[Métal, Pierre, Terre, Sable]', 'ecole' => 'Conjuration', 'dc' => '2+2X', 'magnitude' => 'Dice_scale d2', 'description' => 'La cible subit [Mag] dégâts physiques.', 'inkarnai' => 'Kormo, Ourgal'],
            ['effet' => 'Assaut élémentaire', 'propriete' => '[Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]', 'ecole' => 'Conjuration', 'dc' => '2+2X', 'magnitude' => 'Dice_scale d2', 'description' => 'La cible subit [Mag] dégâts d\'[Élément].', 'inkarnai' => 'Aïgida, Anathos, Horoï, Kuga, Nero, Safi'],
            ['effet' => 'Réanimation', 'propriete' => NULL, 'ecole' => 'Domination', 'dc' => '6+2X', 'magnitude' => 'Gabarit P && Time une heure', 'description' => 'La cible doit être une créature inanimé de gabarit [Mag] ou moins pendant [Mag]. La créature réanimé agit comme bon lui semble.', 'inkarnai' => 'Anathos'],
            ['effet' => 'Contrôle mental', 'propriete' => 'Concentration', 'ecole' => 'Domination', 'dc' => '6', 'magnitude' => '-', 'description' => 'La cible passe sous le contrôle du lanceur.', 'inkarnai' => 'Kynigi, Kormo, Psema'],
            ['effet' => 'Réécriture mémorielle', 'propriete' => NULL, 'ecole' => 'Domination', 'dc' => '8', 'magnitude' => '-', 'description' => 'La dernière minute de mémoire de la cible est modifiée par le lanceur.', 'inkarnai' => 'Psema'],
            ['effet' => 'Mot de pouvoir : Douleur', 'propriete' => 'Concentration', 'ecole' => 'Domination', 'dc' => '4+2X', 'magnitude' => 'Double 1 && AD -1', 'description' => 'La cible voie sa vitesse diminuée de [Mag] et effectue toute action avec [Mag] désavantage(s).', 'inkarnai' => 'Psema'],
            ['effet' => 'Mot de pouvoir : Mort', 'propriete' => NULL, 'ecole' => 'Domination', 'dc' => '15', 'magnitude' => '-', 'description' => 'La cible meurt instantanément.', 'inkarnai' => 'Anathos'],
            ['effet' => 'Télékinésie', 'propriete' => 'Concentration', 'ecole' => 'Domination', 'dc' => '2+2X', 'magnitude' => 'Formula 1+1X', 'description' => 'La cible obtient le trait Télékinésiste([Mag]).', 'inkarnai' => 'Agones'],
            ['effet' => 'Peur', 'propriete' => NULL, 'ecole' => 'Domination', 'dc' => '5', 'magnitude' => '1 minute', 'description' => 'La cible est Effrayé(lanceur).', 'inkarnai' => 'Agapi, Psema'],
            ['effet' => 'Calme', 'propriete' => NULL, 'ecole' => 'Domination', 'dc' => '5', 'magnitude' => '1 minute', 'description' => 'La cible est fasciné.', 'inkarnai' => 'Psema'],
            ['effet' => 'Rage', 'propriete' => NULL, 'ecole' => 'Domination', 'dc' => '5', 'magnitude' => '1 minute', 'description' => 'La cible considère tout le monde comme un adversaire.', 'inkarnai' => 'Agones'],
            ['effet' => 'Silence', 'propriete' => NULL, 'ecole' => 'Domination', 'dc' => '5', 'magnitude' => '1 minute', 'description' => 'La cible est incapable de parler.', 'inkarnai' => 'Psema'],
            ['effet' => 'Apparence trompeuse', 'propriete' => 'Concentration', 'ecole' => 'Domination', 'dc' => '6', 'magnitude' => '-', 'description' => 'La cible est perçue comme quelqu\'un d\'autre.', 'inkarnai' => 'Psema'],
            ['effet' => 'Télépathie', 'propriete' => 'Concentration', 'ecole' => 'Mysticisme', 'dc' => '2', 'magnitude' => '-', 'description' => 'La cible obtient le trait Télépathe.', 'inkarnai' => 'Orizo'],
            ['effet' => 'Archives d\'Orizo', 'propriete' => NULL, 'ecole' => 'Mysticisme', 'dc' => '2+2X', 'magnitude' => 'AD +1', 'description' => 'Le prochain test de compétence de la cible pouvant être facilité avec des connaissances spécifiques se fera avec [Mag] avantage(s).', 'inkarnai' => 'Orizo'],
            ['effet' => 'Détection de la vie / des morts / de la magie', 'propriete' => NULL, 'ecole' => 'Mysticisme', 'dc' => '3+1X', 'magnitude' => 'Double 10', 'description' => 'Détecte les être vivants / les morts / la magie dans un rayon de [Mag] mètres du point d\'impact du sort.', 'inkarnai' => 'Kynigi, Anathos, Orizo'],
            ['effet' => 'Vision véritable', 'propriete' => 'Concentration', 'ecole' => 'Mysticisme', 'dc' => '6', 'magnitude' => '-', 'description' => 'La cible voit tout, même les entités invisibles, peut voir dans le noir le plus complet et même dans une obscurité magique.', 'inkarnai' => 'Orizo'],
            ['effet' => 'Destinée', 'propriete' => NULL, 'ecole' => 'Mysticisme', 'dc' => '6+2X', 'magnitude' => 'Dice_nb 2d6', 'description' => 'Le lanceur peut ajouter/enlever le résultat d\'un des dés lancés par ce sort pour modifier le résultat de n\'importe quel test.', 'inkarnai' => 'Tychi'],
            ['effet' => 'Augure', 'propriete' => NULL, 'ecole' => 'Mysticisme', 'dc' => '5', 'magnitude' => '-', 'description' => 'La cible est avertie de son futur proche. (fortune, péril, les deux ou rien).', 'inkarnai' => 'Tychi'],
            ['effet' => 'Prophétie', 'propriete' => NULL, 'ecole' => 'Mysticisme', 'dc' => '10', 'magnitude' => '-', 'description' => 'La cible obtient une réponse fiable sur un évènement à venir dans les 7 jours.', 'inkarnai' => 'Tychi'],
            ['effet' => 'Communion avec la nature', 'propriete' => NULL, 'ecole' => 'Mysticisme', 'dc' => '6', 'magnitude' => '-', 'description' => 'La cible obtient trois informations sur son environnement.', 'inkarnai' => 'Kormo et Kynigi'],
            ['effet' => 'Localisation d\'entité', 'propriete' => 'Concentration', 'ecole' => 'Mysticisme', 'dc' => '4+2X', 'magnitude' => 'Distance 100 mètres', 'description' => 'La cible connait la position de l\'entité de son choix dans un rayon de [Mag].', 'inkarnai' => 'Kynigi'],
            ['effet' => 'Langue enchantée', 'propriete' => 'Concentration', 'ecole' => 'Mysticisme', 'dc' => '4', 'magnitude' => '-', 'description' => 'La cible sait parler dans toute les langues tant que le lanceur se concentre sur le sort.', 'inkarnai' => 'Orizo'],
            ['effet' => 'Lien sensoriel', 'propriete' => 'Concentration', 'ecole' => 'Mysticisme', 'dc' => '6+2X', 'magnitude' => 'Distance 100 mètres', 'description' => 'La cible peut voir/entendre/sentir à travers les sens d\'une créature consentante dans un rayon de [Mag].', 'inkarnai' => 'Kynigi'],
            ['effet' => 'Création élémentaire', 'propriete' => '[Glace, Métal, Pierre, Sable, Terre]', 'ecole' => 'Conjuration', 'dc' => '2+2X', 'magnitude' => 'Double 10 && Time une minute', 'description' => 'L\'[élément] apparaît à l\'endroit ciblé pendant [Mag]. La création doit subir [Mag] dégâts avant de se briser.', 'inkarnai' => 'Kormo, Nero, Ourgal'],
            ['effet' => 'Bourrasque', 'propriete' => 'Concentration', 'ecole' => 'Conjuration', 'dc' => '2+2X', 'magnitude' => 'Double 10', 'description' => 'Invoque du vent se déplaçant à [Mag] km/h à l\'endroit ciblé.', 'inkarnai' => 'Aïgida'],
            ['effet' => 'Spores [type]', 'propriete' => '[Paralysie, Sommeil, Fascination, Confusion,...]', 'ecole' => 'Conjuration', 'dc' => '5', 'magnitude' => '-', 'description' => 'Invoque des spores infligeant l\'effet [type].', 'inkarnai' => 'Kormo'],
            ['effet' => 'Contrôle de la température', 'propriete' => 'Concentration', 'ecole' => 'Conjuration', 'dc' => '2+3X', 'magnitude' => 'Double 5', 'description' => 'Augmente ou diminue la température ambiante de la cible de [Mag] C°.', 'inkarnai' => 'Horoï'],
            ['effet' => 'Lumière', 'propriete' => NULL, 'ecole' => 'Conjuration', 'dc' => '2+2X', 'magnitude' => 'Double 5 && Time une heure', 'description' => 'Génère de la lumière vive sur [Mag] mètres et de la lumière faible sur [Mag]*2 mètres de façon circulaire pendant [Mag].', 'inkarnai' => 'Safi'],
            ['effet' => 'Création illusoire', 'propriete' => NULL, 'ecole' => 'Conjuration', 'dc' => '3+2', 'magnitude' => 'Gabarit TP && Time une minute', 'description' => 'Façonne une création intangible de la forme souhaitée avec sons et odeurs de gabarit [Mag] ou moins pendant [Mag] minute.', 'inkarnai' => 'Psema'],
        ];

        foreach ($sortsData as $data) {
            $sort = new Sort();
            $sort->setEffet($data['effet']);
            $sort->setPropriete($data['propriete']);
            $sort->setEcole($data['ecole']);
            $sort->setDc($data['dc']);
            $sort->setMagnitude($data['magnitude']);
            $sort->setDescription($data['description']);
            $sort->setInkarnai($data['inkarnai']);
            $manager->persist($sort);
        }

        $manager->flush();
    }
}