<?php

namespace App\DataFixtures;

use App\Entity\Weapon;
use App\Entity\WeaponCategory;
use App\Entity\WeaponProperty;
use App\Entity\WeaponPropertyDetails;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WeaponFixtures extends Fixture
{
    private array $categories = [];
    private array $propertyDetailsCache = [];

    public function load(ObjectManager $manager): void
    {
        $this->createCategories($manager);
        $this->createProperties($manager);
        $this->createWeapons($manager);

        $manager->flush();
    }

    private function createCategories(ObjectManager $manager): void
    {
        $categoryNames = [
            'Lames',
            'Haches',
            'Masses et marteaux',
            "Armes d'hast",
            'Diverses',
            'Armes de jet',
            'Arcs et arbalètes',
            'Armes à distance diverses',
            'Armes de poing',
            "Armes d'épaule",
        ];

        foreach ($categoryNames as $name) {
            $category = new WeaponCategory();
            $category->setCategory($name);
            $manager->persist($category);
            $this->categories[$name] = $category;
        }
    }

    private function createProperties(ObjectManager $manager): void
    {
        $propertiesData = [
            ['Dard', "Cette arme est capable de trouver des failles dans l'armure de sa cible.", "Les jets d'attaque avec un DR supérieur ou égal à 4 ignore l'armure de la cible.", ''],
            ['Lancer', 'Cette arme est suffisamment équilibrée pour être lancée.', " L'arme possède un cran de portée équivalent à X. Un lancer d'arme est traité comme une attaque à distance normale (mais la Force peut être utilisée pour le test de Style de Combat). Le dé de dégâts de l'arme augmente d'un <a href='Systeme.php#cran_des'>cran</a> si elle est lancée", ''],
            ['Petite', 'Relativement petite, facilement dissimulable, une arme de choix pour un roublard digne de ce nom', "L'arme ne peut être utilisée pour parer les coups des armes maniées à deux mains. \nL'utilisateur peut passer un test de Roublardise opposé à l'Observation de l'adversaire pour dissimuler l'arme. \nCette arme n'est pas affectée par les malus dans les espaces clos. \nAttaquer avec une arme dissimulée procure 3 avantages lors d'une passe d'arme.", ''],
            ['Défensive', "Étudiée pour protéger son manieur, cette arme facilite les manœuvres défensives", "Lors d'une passe d'arme défensive, l'arme procure un avantage aux jets de Style de Combat.", ''],
            ['Duel', 'Cette arme est faite pour le duel.', ' Les jets de Style de Combat se font avec un avantage en combat singulier, mais un désavantage en infériorité numérique.', ''],
            ['Impact', 'Les coups délivrés par cette arme peuvent envoyer valser leur cible', "La cible est déplacée d'un mètre par tranche de 3 dégâts, déplacement forcé, directions possibles : gauche droite, arrière", ''],
            ['Peu maniable', null, null, null],
            ['Brise-bouclier', 'Cette arme est très efficace contre les boucliers.', "Les boucliers bloquant une attaque d'une arme possédant cette propriété voient leur RB divisée par 2 lors du blocage.", ''],
            ['Anti-Large', 'Cette arme est faite pour affronter des ennemis plus larges que soi.', "Les jets d'attaques pour toucher les cibles d'un gabarit supérieur à celui de l'utilisateur se font avec 1 avantage.", ''],
            ['Sentinelle', "L'arme est doté d'un pouvoir d'arrêt impressionnant", "La cible d'une frappe voit sa vitese réduite d'un montant équivalent à la moitié des dégâts jusqu'au début du prochain tour de l'assaillant.", ''],
            ['Montée', "Sur le dos d'une monture, cette arme s'avère remarquable", "Cette arme n'est utilisable que depuis une monture pour des raisons de poids et de maniabilité.\nL'attaque se fait lors d'une charge.", ''],
            ['Perce-armure', null, null, null],
            ['Rechargement', "Cette arme doit être rechargée avant d'être utilisée", "L'arme nécessite X action Interagir avant de pouvoir tirer à nouveau.", ''],
            ['Chargeur', "Disposant d'un mécanisme avancé de chargement des munitions, cette arme peut tirer plusieurs fois sans être rechargée et il suffit de remplacer le chargeur pour que l'arme soit de nouveau complétement opérationnelle", "L'arme peut tirer X fois sans être rechargée.<br/>Remplacer le chargeur coute Y action(s) Interagir, il n'est pas nécessaire qu'elles soient consécutives.<br>Si l'arme possède le trait Rechargement(Z), il est nécessaire d'effectuer Z action(s) Interagir après un tir avant de pouvoir tirer à nouveau.", ''],
            ['Zone', null, null, null],
        ];

        foreach ($propertiesData as [$name, $description, $effect, $example]) {
            $property = new WeaponProperty();
            $property->setProperty($name);
            $property->setDescription($description);
            $property->setEffect($effect);
            $property->setExample($example);
            $manager->persist($property);
            $this->properties[$name] = $property;
        }
    }

    private function getPropertyDetails(string $propertyName, ?string $param, ObjectManager $manager): WeaponPropertyDetails
    {
        $key = $propertyName . '|' . ($param ?? '');

        if (!isset($this->propertyDetailsCache[$key])) {
            $details = new WeaponPropertyDetails();
            $details->setWeaponProperty($this->properties[$propertyName]);
            if ($param !== null) {
                $details->setX($param);
            }
            $manager->persist($details);
            $this->propertyDetailsCache[$key] = $details;
        }

        return $this->propertyDetailsCache[$key];
    }

    private function parsePropertyString(string $propertyString, ObjectManager $manager): array
    {
        if ($propertyString === '-' || $propertyString === '') {
            return [];
        }

        $properties = [];
        $parts = array_map('trim', explode(',', $propertyString));

        foreach ($parts as $part) {
            if (preg_match('/^(.+)\((.+)\)$/', $part, $matches)) {
                $name = $matches[1];
                $param = $matches[2];
                $properties[] = $this->getPropertyDetails($name, $param, $manager);
            } else {
                $properties[] = $this->getPropertyDetails($part, null, $manager);
            }
        }

        return $properties;
    }

    private function createWeapons(ObjectManager $manager): void
    {
        $weaponsData = [
            // Lames
            ['type' => 'Dague', 'damageType' => 'Perforants ou Tranchants', 'damage' => '1d4', 'handling' => '1M', 'reach' => 'Courte', 'properties' => 'Dard, Lancer(10), Petite', 'category' => 'Lames', 'enc' => 1, 'price' => '20 pa'],
            ['type' => 'Dague de parade', 'damageType' => 'Perforants', 'damage' => '1d4', 'handling' => '1M', 'reach' => 'Courte', 'properties' => 'Dard, Défensive, Petite', 'category' => 'Lames', 'enc' => 1, 'price' => '25 pa'],
            ['type' => 'Épée Courte', 'damageType' => 'Tranchants ou Perforants', 'damage' => '1d6', 'handling' => '1M', 'reach' => 'Moyenne', 'properties' => 'Dard', 'category' => 'Lames', 'enc' => 1, 'price' => '50 pa'],
            ['type' => 'Épée Courbe', 'damageType' => 'Tranchants', 'damage' => '1d6', 'handling' => '1M', 'reach' => 'Moyenne', 'properties' => 'Duel', 'category' => 'Lames', 'enc' => 1, 'price' => '50 pa'],
            ['type' => 'Rapière', 'damageType' => 'Perforants', 'damage' => '1d6', 'handling' => '1M', 'reach' => 'Moyenne', 'properties' => 'Duel', 'category' => 'Lames', 'enc' => 1, 'price' => '50 pa'],
            ['type' => 'Épée Longue', 'damageType' => 'Tranchants ou Perforants', 'damage' => '1d8', 'handling' => '1M', 'reach' => 'Moyenne', 'properties' => '-', 'category' => 'Lames', 'enc' => 2, 'price' => '75 pa'],
            ['type' => 'Grande épée', 'damageType' => 'Tranchants ou Perforants', 'damage' => '1d12', 'handling' => '2M', 'reach' => 'Longue', 'properties' => 'Impact, Peu maniable', 'category' => 'Lames', 'enc' => 3, 'price' => '100 pa'],

            // Haches
            ['type' => 'Hachette', 'damageType' => 'Tranchant', 'damage' => '1d4', 'handling' => '1M', 'reach' => 'Courte', 'properties' => 'Lancer(10), Petite', 'category' => 'Haches', 'enc' => 1, 'price' => '15 pa'],
            ['type' => 'Hache de guerre', 'damageType' => 'Tranchant', 'damage' => '1d8', 'handling' => '1M', 'reach' => 'Moyenne', 'properties' => 'Brise-bouclier, Peu maniable', 'category' => 'Haches', 'enc' => 2, 'price' => '60 pa'],
            ['type' => 'Grande hache', 'damageType' => 'Tranchant', 'damage' => '1d12', 'handling' => '2M', 'reach' => 'Longue', 'properties' => 'Brise-bouclier, Impact, Peu maniable', 'category' => 'Haches', 'enc' => 3, 'price' => '75 pa'],

            // Masses et marteaux
            ['type' => 'Maillet', 'damageType' => 'Écrasants', 'damage' => '1d4', 'handling' => '1M', 'reach' => 'Courte', 'properties' => 'Lancer(10), Petite', 'category' => 'Masses et marteaux', 'enc' => 1, 'price' => '15 pa'],
            ['type' => 'Masse', 'damageType' => 'Écrasants', 'damage' => '1d8', 'handling' => '1M', 'reach' => 'Moyenne', 'properties' => 'Peu maniable', 'category' => 'Masses et marteaux', 'enc' => 1, 'price' => '50 pa'],
            ['type' => 'Grand marteau', 'damageType' => 'Écrasants', 'damage' => '1d12', 'handling' => '2M', 'reach' => 'Longue', 'properties' => 'Brise-bouclier, Peu maniable, Impact', 'category' => 'Masses et marteaux', 'enc' => 3, 'price' => '75 pa'],

            // Armes d'hast
            ['type' => 'Javelot', 'damageType' => 'Perforants', 'damage' => '1d4', 'handling' => '1M', 'reach' => 'Longue', 'properties' => 'Lancer(20)', 'category' => "Armes d'hast", 'enc' => 2, 'price' => '20 pa'],
            ['type' => 'Lance', 'damageType' => 'Perforants', 'damage' => '1d6', 'handling' => '1M', 'reach' => 'Très Longue', 'properties' => 'Anti-Large, Sentinelle', 'category' => "Armes d'hast", 'enc' => 2, 'price' => '25 pa'],
            ['type' => 'Pique', 'damageType' => 'Perforants', 'damage' => '1d10', 'handling' => '2M', 'reach' => 'Extrême', 'properties' => 'Anti-Large, Sentinelle, Peu maniable', 'category' => "Armes d'hast", 'enc' => 3, 'price' => '25 pa'],
            ['type' => 'Hallebarde', 'damageType' => 'Tranchants ou Perforants', 'damage' => '1d10', 'handling' => '2M', 'reach' => 'Très Longue', 'properties' => 'Anti-Large, Sentinelle', 'category' => "Armes d'hast", 'enc' => 3, 'price' => '100 pa'],
            ['type' => "Lance d'arçon", 'damageType' => '-', 'damage' => '1d10', 'handling' => '1M', 'reach' => 'Extrême', 'properties' => 'Montée, Peu maniable, Perce-armure(3)', 'category' => "Armes d'hast", 'enc' => 3, 'price' => '50 pa'],

            // Diverses
            ['type' => 'Fouet', 'damageType' => 'Tranchants', 'damage' => '1d4', 'handling' => '1M', 'reach' => 'Très Longue', 'properties' => 'Petite', 'category' => 'Diverses', 'enc' => 1, 'price' => '10 pa'],
            ['type' => 'Bâton', 'damageType' => 'Écrasants', 'damage' => '1d4', 'handling' => '1M', 'reach' => 'Longue', 'properties' => '-', 'category' => 'Diverses', 'enc' => 2, 'price' => '1 pa'],
            ['type' => 'Ceste', 'damageType' => 'Écrasants', 'damage' => '1d4', 'handling' => '1M', 'reach' => 'Courte', 'properties' => 'Petite', 'category' => 'Diverses', 'enc' => 1, 'price' => '5 pa'],

            // Armes de jet
            ['type' => 'Fléchettes de lancer', 'damageType' => 'Perforants', 'damage' => '1d4', 'handling' => '1M', 'reach' => '15m', 'properties' => 'Lancer(15), Petite', 'category' => 'Armes de jet', 'enc' => 0, 'price' => '5 pa'],
            ['type' => 'Étoiles de lancer', 'damageType' => 'Tranchants', 'damage' => '1d4', 'handling' => '1M', 'reach' => '15m', 'properties' => 'Lancer(15), Petite', 'category' => 'Armes de jet', 'enc' => 0, 'price' => '5 pa'],

            // Arcs et arbalètes
            ['type' => 'Arbalète lourde', 'damageType' => 'Perforants', 'damage' => '1d12', 'handling' => '2M', 'reach' => '200m', 'properties' => 'Rechargement(3 min 1), Peu maniable, Perce-armure(4)', 'category' => 'Arcs et arbalètes', 'enc' => 3, 'price' => '100 pa'],
            ['type' => 'Arbalète à main', 'damageType' => 'Perforants', 'damage' => '1d6', 'handling' => '1M', 'reach' => '50m', 'properties' => 'Rechargement(1 min 1)', 'category' => 'Arcs et arbalètes', 'enc' => 1, 'price' => '75 pa'],
            ['type' => 'Arbalète', 'damageType' => 'Perforants', 'damage' => '1d10', 'handling' => '2M', 'reach' => '150m', 'properties' => 'Rechargement(2 min 1), Peu maniable, Perce-armure(2)', 'category' => 'Arcs et arbalètes', 'enc' => 3, 'price' => '50 pa'],
            ['type' => 'Arc Long', 'damageType' => 'Perforants', 'damage' => '1d8', 'handling' => '2M', 'reach' => '150m', 'properties' => 'Rechargement(1), Peu maniable', 'category' => 'Arcs et arbalètes', 'enc' => 2, 'price' => '75 pa'],
            ['type' => 'Arc Court', 'damageType' => 'Perforants', 'damage' => '1d6', 'handling' => '2M', 'reach' => '100m', 'properties' => '-', 'category' => 'Arcs et arbalètes', 'enc' => 2, 'price' => '50 pa'],

            // Armes à distance diverses
            ['type' => 'Sarbacane', 'damageType' => 'Perforants', 'damage' => '1d4', 'handling' => '1M', 'reach' => '30m', 'properties' => '-', 'category' => 'Armes à distance diverses', 'enc' => 1, 'price' => '1 pa'],
            ['type' => 'Fronde', 'damageType' => 'Écrasants', 'damage' => '1d4', 'handling' => '1M', 'reach' => '100m', 'properties' => '-', 'category' => 'Armes à distance diverses', 'enc' => 1, 'price' => '5 pa'],

            // Armes de poing
            ['type' => 'Pistolet de poche', 'damageType' => 'Perforants et écrasants', 'damage' => '1d6', 'handling' => '1M', 'reach' => '50m', 'properties' => 'Rechargement(2 min 1), Peu maniable, Perce-armure(1), Petite', 'category' => 'Armes de poing', 'enc' => 1, 'price' => '100 pa'],
            ['type' => 'Pistolet à silex', 'damageType' => 'Perforants et écrasants', 'damage' => '1d8', 'handling' => '1M', 'reach' => '100m', 'properties' => 'Rechargement(2 min 1), Peu maniable, Perce-armure(2)', 'category' => 'Armes de poing', 'enc' => 1, 'price' => '100 pa'],
            ['type' => 'Pistolet à double canon', 'damageType' => 'Perforants et écrasants', 'damage' => '1d8', 'handling' => '1M', 'reach' => '100m', 'properties' => 'Chargeur(2), Rechargement(2 min 1), Peu maniable, Perce-armure(2)', 'category' => 'Armes de poing', 'enc' => 1, 'price' => '150 pa'],
            ['type' => 'Poivrière', 'damageType' => 'Perforants et écrasants', 'damage' => '1d8', 'handling' => '1M', 'reach' => '100m', 'properties' => 'Chargeur(6), Rechargement(2 min 1), Peu maniable, Perce-armure(2)', 'category' => 'Armes de poing', 'enc' => 1, 'price' => '300 pa'],
            ['type' => 'Pétoire', 'damageType' => 'Perforants et écrasants', 'damage' => '1d6', 'handling' => '1M', 'reach' => '15m', 'properties' => 'Rechargement(3 min 1), Peu maniable, Perce-armure(1), Zone(2)', 'category' => 'Armes de poing', 'enc' => 1, 'price' => '100 pa'],

            // Armes d'épaule
            ['type' => 'Mousquet', 'damageType' => 'Perforants et écrasants', 'damage' => '1d12', 'handling' => '2M', 'reach' => '200m', 'properties' => 'Rechargement(3 min 1), Peu maniable, Perce-armure(4)', 'category' => "Armes d'épaule", 'enc' => 3, 'price' => '150 pa'],
            ['type' => 'Mousquet à double canon', 'damageType' => 'Perforants et écrasants', 'damage' => '1d12', 'handling' => '2M', 'reach' => '200m', 'properties' => 'Chargeur(2), Rechargement(3 min 1), Peu maniable, Perce-armure(4)', 'category' => "Armes d'épaule", 'enc' => 3, 'price' => '175 pa'],
            ['type' => 'Tromblon', 'damageType' => 'Perforants et écrasants', 'damage' => '1d8', 'handling' => '2M', 'reach' => '15m', 'properties' => 'Rechargement(3 min 1), Peu maniable, Perce-armure(2), Zone(3)', 'category' => "Armes d'épaule", 'enc' => 3, 'price' => '150 pa'],
        ];

        foreach ($weaponsData as $data) {
            $weapon = new Weapon();
            $weapon->setType($data['type']);
            $weapon->setDamageType($data['damageType']);
            $weapon->setDamage($data['damage']);
            $weapon->setHandling($data['handling']);
            $weapon->setReach($data['reach']);
            $weapon->setEnc($data['enc']);
            $weapon->setPrice($data['price']);
            $weapon->setCategory($this->categories[$data['category']]);

            $properties = $this->parsePropertyString($data['properties'], $manager);
            foreach ($properties as $propertyDetail) {
                $weapon->addWeaponProperty($propertyDetail);
            }

            $manager->persist($weapon);
        }
    }
}
