<?php

namespace App\DataFixtures;

use App\Entity\Item;
use App\Entity\ItemCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ItemFixtures extends Fixture
{
    private array $categories = [];

    public function load(ObjectManager $manager): void
    {
        $this->createCategories($manager);

        $itemsData = [
            // Campement
            ['item' => "Boite d'allume-feu (D)", 'category' => 'Campement', 'description' => "Silex, amorces et amadou, tout ce qu'il faut pour allumer un feu", 'price' => '5 pc', 'enc' => 1],
            ['item' => 'Gamelle', 'category' => 'Campement', 'description' => 'Assiette creuse accompagnée de couverts, peut également servir de casserole', 'price' => '2 pc', 'enc' => 1],
            ['item' => 'Rations (D)', 'category' => 'Campement', 'description' => 'Aliments appropriés pour un long voyage : viande séchée, fruits secs, biscuit,...', 'price' => '5 pc', 'enc' => 1],
            ['item' => 'Tente', 'category' => 'Campement', 'description' => "Légère et pliable, elle permet à deux personnes de gabarit Moyen de dormir à l'abri des intempéries", 'price' => '10 pa', 'enc' => 2],
            ['item' => 'Sac de couchage', 'category' => 'Campement', 'description' => "Bien enroulé et très chaud, il s'attache facilement sur un sac à dos et permet de passer sa nuit sans grelotter", 'price' => '1 pa', 'enc' => 1],
            ['item' => 'Couverture', 'category' => 'Campement', 'description' => "Peut également servir de tapis de sol, elle tient moins chaud qu'un sac de couchage mais reste indispensable pour un sommeil de qualité", 'price' => '5 pc', 'enc' => 1],
            // Contenants
            ['item' => 'Baril (D)', 'category' => 'Contenants', 'description' => "Petit tonneau pouvant stocker tout et n'importe quoi.", 'price' => '3 pa', 'enc' => 2],
            ['item' => 'Poire à poudre (D)', 'category' => 'Contenants', 'description' => 'Conteneur métallique préservant la poudre à canon de l\'humidité', 'price' => '5 pa', 'enc' => 1],
            ['item' => 'Fiole vide (D)', 'category' => 'Contenants', 'description' => "Petit récipient en verre d'une contenance de 100mL", 'price' => '1 pa', 'enc' => 0],
            ['item' => 'Flasque vide (D)', 'category' => 'Contenants', 'description' => "Récipient en verre d'une contenance d'un litre", 'price' => '2 pa', 'enc' => 1],
            ['item' => 'Carquois (D)', 'category' => 'Contenants', 'description' => "Étui en cuir protégeant les munitions à l'intérieur", 'price' => '3 pa', 'enc' => 1],
            // Cordes et chaînes
            ['item' => 'Chaîne (3 m)', 'category' => 'Cordes et chaînes', 'description' => 'Lourde chaîne de métal devant subir 25 dégâts avant de se briser', 'price' => '35 pa', 'enc' => 2],
            ['item' => 'Corde (15 m)', 'category' => 'Cordes et chaînes', 'description' => 'Longue corde en chanvre devant subir 5 dégâts avant de se briser', 'price' => '1 pa', 'enc' => 1],
            // Déplacement
            ['item' => 'Échelle de corde (5 m)', 'category' => 'Déplacement', 'description' => "Pliable, elle s'attache facilement sur un sac et permet de créer un passage facile sur un mur", 'price' => '5 pc', 'enc' => 2],
            ['item' => 'Équipement d\'escalade', 'category' => 'Déplacement', 'description' => 'Crampons et piolets, accorde 3 avantages pour les épreuves d\'escalade', 'price' => '25 pa', 'enc' => 2],
            ['item' => 'Grappin', 'category' => 'Déplacement', 'description' => 'Permet de sécuriser une corde sans avoir à faire de noeuds, utile lorsque l\'on souhaite escalader une falaise', 'price' => '5 pa', 'enc' => 1],
            ['item' => 'Palan', 'category' => 'Déplacement', 'description' => 'Système de poulies permettant de monter/descendre de lourdes charges', 'price' => '3 pa', 'enc' => 1],
            // Éclairage
            ['item' => 'Bougie (D)', 'category' => 'Éclairage', 'description' => 'Faite de cire, cette bougie éclaire une petite zone pendant 2 heures', 'price' => '1 pc', 'enc' => 1],
            ['item' => 'Lampe', 'category' => 'Éclairage', 'description' => "Faite de métal, cette lampe éclaire une zone modeste et consomme une flasque d'huile toute les 8 heure", 'price' => '5 pa', 'enc' => 1],
            ['item' => 'Lanterne', 'category' => 'Éclairage', 'description' => 'Faite de métal, cette lanterne éclaire une grande zone, un système de miroir peut être utilisé pour créer un grand cone de lumière, elle consomme une flasque d\'huile toute les 4 heure', 'price' => '10 pa', 'enc' => 1],
            ['item' => 'Torche (D)', 'category' => 'Éclairage', 'description' => "Morceau de bois imbibé d'huile, elle éclaire une zone moyenne pendant 1 heure", 'price' => '1 pc', 'enc' => 1],
            // Écrits
            ['item' => 'Craie (D)', 'category' => 'Écrits', 'description' => "Permet d'écrire sur presque toutes les surfaces mais s'efface avec l'eau", 'price' => '1 pc', 'enc' => 0],
            ['item' => 'Grimoire', 'category' => 'Écrits', 'description' => 'Imposant ouvrage relié de cuir', 'price' => '20 pa', 'enc' => 1],
            ['item' => 'Livre', 'category' => 'Écrits', 'description' => 'Petit ouvrage relié de cuir', 'price' => '15 pa', 'enc' => 1],
            ['item' => 'Papier (D)', 'category' => 'Écrits', 'description' => 'Permet de noter des informations quelconques', 'price' => '1 pc', 'enc' => 0],
            ['item' => 'Parchemin (D)', 'category' => 'Écrits', 'description' => 'Permet de créer des cartes ou des parchemins magiques', 'price' => '2 pc', 'enc' => 0],
            ['item' => "Plume d'écriture", 'category' => 'Écrits', 'description' => "Permet d'écrire sur du papier ou du parchemin", 'price' => '2 pc', 'enc' => 0],
            ['item' => 'Encre', 'category' => 'Écrits', 'description' => "À stockée dans une fiole, à combiner avec une plume d'écriture", 'price' => '10 pa', 'enc' => 0],
            // Explosifs
            ['item' => 'Poudre à canon (baril)', 'category' => 'Explosifs', 'description' => 'Stocké dans un baril, cette poudre est parfois utilisée pour creuser rapidement des galeries', 'price' => '10 pa', 'enc' => 0],
            ['item' => 'Poudre à canon (poire)', 'category' => 'Explosifs', 'description' => 'Stockée dans une poire, permet de recharger une arme à feu', 'price' => '3 pa', 'enc' => 0],
            // Liquides
            ['item' => 'Parfum', 'category' => 'Liquides', 'description' => 'Stocké dans une fiole, peut cacher certaines odeurs, très apprécié dans les évènements mondains', 'price' => '5 pa', 'enc' => 0],
            ['item' => 'Huile', 'category' => 'Liquides', 'description' => 'Stockée dans une flasque, très inflammable, sert de combustible à lanterne', 'price' => '5 pc', 'enc' => 0],
            // Outils
            ['item' => 'Bélier portatif', 'category' => 'Outils', 'description' => "Morceau de bois renforcé de métal, permet d'enfoncer les portes avec 5 avantages", 'price' => '15 pa', 'enc' => 2],
            ['item' => 'Crochets (D)', 'category' => 'Outils', 'description' => 'Permet de crocheter des serrures verrouillées, se casse en cas d\'échec du test', 'price' => '1 po', 'enc' => 0],
            ['item' => 'Marteau', 'category' => 'Outils', 'description' => 'Possède un côté plat pour marteler et un arrache-clou de l\'autre côté, utile dans toute sorte de situation', 'price' => '2 pa', 'enc' => 1],
            ['item' => 'Pelle', 'category' => 'Outils', 'description' => 'Très utile dès qu\'on veut creuser la terre', 'price' => '5 pa', 'enc' => 2],
            ['item' => 'Pied-de-biche', 'category' => 'Outils', 'description' => 'Permet d\'ouvrir par la force les contenants scellés, accorde 2 avantages aux épreuves de Force où il est possible de faire levier', 'price' => '10 pa', 'enc' => 2],
            ['item' => 'Pioche', 'category' => 'Outils', 'description' => 'Très utile dès qu\'on veut creuser la pierre', 'price' => '5 pa', 'enc' => 3],
            // Optique
            ['item' => 'Longue-vue', 'category' => 'Optique', 'description' => 'Permet de voir 5 fois plus loin qu\'à l\'oeil nu', 'price' => '5 po', 'enc' => 1],
            ['item' => 'Loupe', 'category' => 'Optique', 'description' => 'Permet de grossir 5 fois un objet proche ou d\'allumer un feu s\'il y a du soleil', 'price' => '2 po', 'enc' => 0],
            // Outils de marchand
            ['item' => 'Balance de marchand', 'category' => 'Outils de marchand', 'description' => 'Plateaux et arrangements de poids, permet de déterminer le poids exact d\'objets inférieur à 1 kg', 'price' => '25 pa', 'enc' => 1],
            ['item' => 'Boulier', 'category' => 'Outils de marchand', 'description' => 'Cadre de bois remplis de tiges serties de boules servant à compter rapidement de grand nombre.', 'price' => '2 pa', 'enc' => 1],
            // Pièges
            ['item' => 'Billes (D)', 'category' => 'Pièges', 'description' => 'Petites billes recouvrant une zone de 5m x 5m une fois déversées sur le sol, les entités traversant cette zone doivent passer un test d\'Agilité ou tomber à terre', 'price' => '10 pa', 'enc' => 1],
            ['item' => 'Chausse-trappes (D)', 'category' => 'Pièges', 'description' => 'Petits picots métalliques présentant toujours une pointe vers le haut recouvrant une zone de 2m x 2m une fois déversées sur le sol, les entités traversant cette zone doivent passer un test d\'Agilité DC 8 (DC 5 si on se déplace à la moitié de sa vitesse), sur un échec on subit une blessure. Tant qu\'elles n\'ont pas récupéré de cette blessure elles conservent cette pénalité de vitesse.', 'price' => '5 pa', 'enc' => 1],
            ['item' => 'Piège à mâchoires', 'category' => 'Pièges', 'description' => "Anneau d'acier en dents de scie s'activant via une plaque de pression et possédant une chaîne d'un mètre, une entité activant le piège subit 2d8 dégâts perforants et écrasants et voit sa vitesse divisée par 4 si elle subit une blessure. Tant qu'elle n'a pas récupéré de cette blessure elle conserve cette pénalité de vitesse. Elle peut se libérer en passant un test d'Athlétisme(Force) DC10 avec 2 désavantages.", 'price' => '25 pa', 'enc' => 2],
            ['item' => 'Pointes en fer (D)', 'category' => 'Pièges', 'description' => 'Bâtons métalliques de 20cm possédant une tête plate et une pointe, utile dans toute sorte de situations', 'price' => '1 pa', 'enc' => 1],
            // Autres
            ['item' => 'Cadenas', 'category' => 'Autres', 'description' => 'Solide cadenas métallique, nécessite au moins 10 DR sur un test étendu de crochetage', 'price' => '35 pa', 'enc' => 0],
            ['item' => 'Chevalière', 'category' => 'Autres', 'description' => 'Bague possédant un relief, permet d\'apposer un sceau à la cire', 'price' => '20 pa', 'enc' => 0],
            ['item' => 'Cire à cacheter (D)', 'category' => 'Autres', 'description' => 'Petit bâton de cire à faire fondre pour cacheter des documents importants', 'price' => '5 pc', 'enc' => 0],
            ['item' => 'Cloche', 'category' => 'Autres', 'description' => 'Cloche à main résonnant bruyamment quand secouée', 'price' => '1 pa', 'enc' => 1],
            ['item' => 'Matériel de pêche', 'category' => 'Autres', 'description' => "Canne, lignes, hameçons et leurres, permet de pêcher n'importe où. Sur un test étendu de Survie(Dex) DC 5, vous lancez un dé par heure, à la fin du test, diviser le DR total par 2, c'est le nombre de rations de poisson que vous obtenez.", 'price' => '1 pa', 'enc' => 2],
            ['item' => 'Menottes', 'category' => 'Autres', 'description' => 'Solides attaches métalliques devant subir 10 dégâts avant de se briser, pouvant entraver une créature de Gabarit Moyen ou Petit.', 'price' => '25 pa', 'enc' => 1],
            ['item' => 'Miroir en acier', 'category' => 'Autres', 'description' => 'Petit miroir fort utile pour se recoiffer ou voir sans être vu depuis un mur en angle', 'price' => '15 pa', 'enc' => 1],
            ['item' => 'Perche (3 m)', 'category' => 'Autres', 'description' => 'Longue perche de bois possédant de nombreuses applications', 'price' => '5 pc', 'enc' => 2],
            ['item' => 'Pierre à aiguiser', 'category' => 'Autres', 'description' => "Petite pierre faite pour affiner le fil d'une lame", 'price' => '3 pc', 'enc' => 0],
            ['item' => 'Sablier / Clepsydre', 'category' => 'Autres', 'description' => 'Petit contenant en verre contenant du sable / de l\'eau mettant un temps déterminé à s\'écouler', 'price' => '25 pa', 'enc' => 0],
            ['item' => 'Savon (D)', 'category' => 'Autres', 'description' => 'Petit cube de savon possédant de nombreuses applications', 'price' => '5 pc', 'enc' => 0],
            ['item' => 'Sifflet / Appeau', 'category' => 'Autres', 'description' => 'Petit sifflet émettant du bruit dans une zone donnée. Certains imitent le cri d\'un animal.', 'price' => '5 pc', 'enc' => 0],
            ['item' => 'Trousse de soins (D)', 'category' => 'Autres', 'description' => 'Bandages, aiguille et fil de suture, tout le nécessaire pour panser des plaies. Permet de stabiliser une créature mourante sur un test de Médecine(Int ou Dex) DC 4. La créature mourante passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR de l\'utilisateur de la trousse médicale. Sur une réussite, la créature n\'est plus mourante et devient stable.', 'price' => '25 pa', 'enc' => 1],
        ];

        foreach ($itemsData as $data) {
            $item = new Item();
            $item->setItem($data['item']);
            $item->setCategory($this->categories[$data['category']]);
            $item->setDescription($data['description']);
            $item->setPrice($data['price']);
            $item->setENC($data['enc']);
            $manager->persist($item);
        }

        $manager->flush();
    }

    private function createCategories(ObjectManager $manager): void
    {
        $categoryNames = [
            'Campement',
            'Contenants',
            'Cordes et chaînes',
            'Déplacement',
            'Éclairage',
            'Écrits',
            'Explosifs',
            'Liquides',
            'Outils',
            'Optique',
            'Outils de marchand',
            'Pièges',
            'Autres',
        ];

        foreach ($categoryNames as $name) {
            $category = new ItemCategory();
            $category->setCategory($name);
            $manager->persist($category);
            $this->categories[$name] = $category;
        }
    }
}
