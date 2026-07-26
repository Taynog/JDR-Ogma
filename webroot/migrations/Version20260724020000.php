<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260724020000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Insert 59 items from MySQL dump with correct category_id mapping';
    }

    public function up(Schema $schema): void
    {
        // Campement (category 1): 6 items
        $this->addSql("INSERT INTO item (id, item, category_id, description, price, enc) VALUES
            (1, 'Boite d''allume-feu (D)', 1, 'Silex, amorces et amadou, tout ce qu''il faut pour allumer un feu', '5 pc', 1),
            (2, 'Gamelle', 1, 'Assiette creuse accompagnée de couverts, peut également servir de casserole', '2 pc', 1),
            (3, 'Rations (D)', 1, 'Aliments appropriés pour un long voyage : viande séchée, fruits secs, biscuit,...', '5 pc', 1),
            (4, 'Tente', 1, 'Légère et pliable, elle permet à deux personnes de gabarit Moyen de dormir à l''abri des intempéries', '10 pa', 2),
            (5, 'Sac de couchage', 1, 'Bien enroulé et très chaud, il s''attache facilement sur un sac à dos et permet de passer sa nuit sans grelotter', '1 pa', 1),
            (6, 'Couverture', 1, 'Peut également servir de tapis de sol, elle tient moins chaud qu''un sac de couchage mais reste indispensable pour un sommeil de qualité', '5 pc', 1)");

        // Contenants (category 2): 5 items
        $this->addSql("INSERT INTO item (id, item, category_id, description, price, enc) VALUES
            (7, 'Baril (D)', 2, 'Petit tonneau pouvant stocker tout et n''importe quoi.', '3 pa', 2),
            (8, 'Poire à poudre (D)', 2, 'Conteneur métallique préservant la poudre à canon de l''humidité', '5 pa', 1),
            (9, 'Fiole vide (D)', 2, 'Petit récipient en verre d''une contenance de 100mL', '1 pa', 0),
            (10, 'Flasque vide (D)', 2, 'Récipient en verre d''une contenance d''un litre', '2 pa', 1),
            (11, 'Carquois (D)', 2, 'Étui en cuir protégeant les munitions à l''intérieur', '3 pa', 1)");

        // Cordes et chaînes (category 3): 2 items
        $this->addSql("INSERT INTO item (id, item, category_id, description, price, enc) VALUES
            (12, 'Chaîne (3 m)', 3, 'Lourde chaîne de métal devant subir 25 dégâts avant de se briser', '35 pa', 2),
            (13, 'Corde (15 m)', 3, 'Longue corde en chanvre devant subir 5 dégâts avant de se briser', '1 pa', 1)");

        // Déplacement (category 4): 4 items
        $this->addSql("INSERT INTO item (id, item, category_id, description, price, enc) VALUES
            (14, 'Échelle de corde (5 m)', 4, 'Pliable, elle s''attache facilement sur un sac et permet de créer un passage facile sur un mur', '5 pc', 2),
            (15, 'Équipement d''escalade', 4, 'Crampons et piolets, accorde 3 avantages pour les épreuves d''escalade', '25 pa', 2),
            (16, 'Grappin', 4, 'Permet de sécuriser une corde sans avoir à faire de noeuds, utile lorsque l''on souhaite escalader une falaise', '5 pa', 1),
            (17, 'Palan', 4, 'Système de poulies permettant de monter/descendre de lourdes charges', '3 pa', 1)");

        // Éclairage (category 5): 4 items
        $this->addSql("INSERT INTO item (id, item, category_id, description, price, enc) VALUES
            (18, 'Bougie (D)', 5, 'Faite de cire, cette bougie éclaire une petite zone pendant 2 heures', '1 pc', 1),
            (19, 'Lampe', 5, 'Faite de métal, cette lampe éclaire une zone modeste et consomme une flasque d''huile toute les 8 heure', '5 pa', 1),
            (20, 'Lanterne', 5, 'Faite de métal, cette lanterne éclaire une grande zone, un système de miroir peut être utilisé pour créer un grand cone de lumière, elle consomme une flasque d''huile toute les 4 heure', '10 pa', 1),
            (21, 'Torche (D)', 5, 'Morceau de bois imbibé d''huile, elle éclaire une zone moyenne pendant 1 heure', '1 pc', 1)");

        // Écrits (category 6): 7 items
        $this->addSql("INSERT INTO item (id, item, category_id, description, price, enc) VALUES
            (22, 'Craie (D)', 6, 'Permet d''écrire sur presque toutes les surfaces mais s''efface avec l''eau', '1 pc', 0),
            (23, 'Grimoire', 6, 'Imposant ouvrage relié de cuir', '20 pa', 1),
            (24, 'Livre', 6, 'Petit ouvrage relié de cuir', '15 pa', 1),
            (25, 'Papier (D)', 6, 'Permet de noter des informations quelconques', '1 pc', 0),
            (26, 'Parchemin (D)', 6, 'Permet de créer des cartes ou des parchemins magiques', '2 pc', 0),
            (27, 'Plume d''écriture', 6, 'Permet d''écrire sur du papier ou du parchemin', '2 pc', 0),
            (28, 'Encre', 6, 'À stockée dans une fiole, à combiner avec une plume d''écriture', '10 pa', 0)");

        // Explosifs (category 7): 2 items
        $this->addSql("INSERT INTO item (id, item, category_id, description, price, enc) VALUES
            (29, 'Poudre à canon (baril)', 7, 'Stocké dans un baril, cette poudre est parfois utilisée pour creuser rapidement des galeries', '10 pa', 0),
            (30, 'Poudre à canon (poire)', 7, 'Stockée dans une poire, permet de recharger une arme à feu', '3 pa', 0)");

        // Liquides (category 8): 2 items
        $this->addSql("INSERT INTO item (id, item, category_id, description, price, enc) VALUES
            (31, 'Parfum', 8, 'Stocké dans une fiole, peut cacher certaines odeurs, très apprécié dans les évènements mondains', '5 pa', 0),
            (32, 'Huile', 8, 'Stockée dans une flasque, très inflammable, sert de combustible à lanterne', '5 pc', 0)");

        // Outils (category 9): 6 items
        $this->addSql("INSERT INTO item (id, item, category_id, description, price, enc) VALUES
            (33, 'Bélier portatif', 9, 'Morceau de bois renforcé de métal, permet d''enfoncer les portes avec 5 avantages', '15 pa', 2),
            (34, 'Crochets (D)', 9, 'Permet de crocheter des serrures verrouillées, se casse en cas d''échec du test', '1 po', 0),
            (35, 'Marteau', 9, 'Possède un côté plat pour marteler et un arrache-clou de l''autre côté, utile dans toute sorte de situation', '2 pa', 1),
            (36, 'Pelle', 9, 'Très utile dès qu''on veut creuser la terre', '5 pa', 2),
            (37, 'Pied-de-biche', 9, 'Permet d''ouvrir par la force les contenants scellés, accorde 2 avantages aux épreuves de Force où il est possible de faire levier', '10 pa', 2),
            (38, 'Pioche', 9, 'Très utile dès qu''on veut creuser la pierre', '5 pa', 3)");

        // Optique (category 10): 2 items
        $this->addSql("INSERT INTO item (id, item, category_id, description, price, enc) VALUES
            (39, 'Longue-vue', 10, 'Permet de voir 5 fois plus loin qu''à l''oeil nu', '5 po', 1),
            (40, 'Loupe', 10, 'Permet de grossir 5 fois un objet proche ou d''allumer un feu s''il y a du soleil', '2 po', 0)");

        // Outils de marchand (category 11): 2 items
        $this->addSql("INSERT INTO item (id, item, category_id, description, price, enc) VALUES
            (41, 'Balance de marchand', 11, 'Plateaux et arrangements de poids, permet de déterminer le poids exact d''objets inférieur à 1 kg', '25 pa', 1),
            (42, 'Boulier', 11, 'Cadre de bois remplis de tiges serties de boules servant à compter rapidement de grand nombre.', '2 pa', 1)");

        // Pièges (category 12): 4 items
        $this->addSql("INSERT INTO item (id, item, category_id, description, price, enc) VALUES
            (43, 'Billes (D)', 12, 'Petites billes recouvrant une zone de 5m x 5m une fois déversées sur le sol, les entités traversant cette zone doivent passer un test d''Agilité ou tomber à terre', '10 pa', 1),
            (44, 'Chausse-trappes (D)', 12, 'Petits picots métalliques présentant toujours une pointe vers le haut recouvrant une zone de 2m x 2m une fois déversées sur le sol, les entités traversant cette zone doivent passer un test d''Agilité DC 8 (DC 5 si on se déplace à la moitié de sa vitesse), sur un échec on subit une blessure. Tant qu''elles n''ont pas récupéré de cette blessure elles conservent cette pénalité de vitesse.', '5 pa', 1),
            (45, 'Piège à mâchoires', 12, 'Anneau d''acier en dents de scie s''activant via une plaque de pression et possédant une chaîne d''un mètre, une entité activant le piège subit 2d8 dégâts perforants et écrasants et voit sa vitesse divisée par 4 si elle subit une blessure. Tant qu''elle n''a pas récupéré de cette blessure elle conserve cette pénalité de vitesse. Elle peut se libérer en passant un test d''Athlétisme(Force) DC10 avec 2 désavantages.', '25 pa', 2),
            (46, 'Pointes en fer (D)', 12, 'Bâtons métalliques de 20cm possédant une tête plate et une pointe, utile dans toute sorte de situations', '1 pa', 1)");

        // Autres (category 13): 13 items
        $this->addSql("INSERT INTO item (id, item, category_id, description, price, enc) VALUES
            (47, 'Cadenas', 13, 'Solide cadenas métallique, nécessite au moins 10 DR sur un test étendu de crochetage', '35 pa', 0),
            (48, 'Chevalière', 13, 'Bague possédant un relief, permet d''apposer un sceau à la cire', '20 pa', 0),
            (49, 'Cire à cacheter (D)', 13, 'Petit bâton de cire à faire fondre pour cacheter des documents importants', '5 pc', 0),
            (50, 'Cloche', 13, 'Cloche à main résonnant bruyamment quand secouée', '1 pa', 1),
            (51, 'Matériel de pêche', 13, 'Canne, lignes, hameçons et leurres, permet de pêcher n''importe où. Sur un test étendu de Survie(Dex) DC 5, vous lancez un dé par heure, à la fin du test, diviser le DR total par 2, c''est le nombre de rations de poisson que vous obtenez.', '1 pa', 2),
            (52, 'Menottes', 13, 'Solides attaches métalliques devant subir 10 dégâts avant de se briser, pouvant entraver une créature de Gabarit Moyen ou Petit.', '25 pa', 1),
            (53, 'Miroir en acier', 13, 'Petit miroir fort utile pour se recoiffer ou voir sans être vu depuis un mur en angle', '15 pa', 1),
            (54, 'Perche (3 m)', 13, 'Longue perche de bois possédant de nombreuses applications', '5 pc', 2),
            (55, 'Pierre à aiguiser', 13, 'Petite pierre faite pour affiner le fil d''une lame', '3 pc', 0),
            (56, 'Sablier / Clepsydre', 13, 'Petit contenant en verre contenant du sable / de l''eau mettant un temps déterminé à s''écouler', '25 pa', 0),
            (57, 'Savon (D)', 13, 'Petit cube de savon possédant de nombreuses applications', '5 pc', 0),
            (58, 'Sifflet / Appeau', 13, 'Petit sifflet émettant du bruit dans une zone donnée. Certains imitent le cri d''un animal.', '5 pc', 0),
            (59, 'Trousse de soins (D)', 13, 'Bandages, aiguille et fil de suture, tout le nécessaire pour panser des plaies. Permet de stabiliser une créature mourante sur un test de Médecine(Int ou Dex) DC 4. La créature mourante passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR de l''utilisateur de la trousse médicale. Sur une réussite, la créature n''est plus mourante et devient stable.', '25 pa', 1)");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DELETE FROM item WHERE id BETWEEN 1 AND 59");
    }
}
