<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260724010000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Populate item_category (13 rows), remap item.category_id, populate armor (15 rows)';
    }

    public function up(Schema $schema): void
    {
        // --- item_category ---
        $this->addSql("INSERT INTO item_category (id, category, description) VALUES
            (1, 'Campement', NULL),
            (2, 'Contenants', NULL),
            (3, 'Cordes et chaînes', NULL),
            (4, 'Déplacement', NULL),
            (5, 'Éclairage', NULL),
            (6, 'Écrits', NULL),
            (7, 'Explosifs', NULL),
            (8, 'Liquides', NULL),
            (9, 'Outils', NULL),
            (10, 'Optique', NULL),
            (11, 'Outils de marchand', NULL),
            (12, 'Pièges', NULL),
            (13, 'Autres', NULL)");

        // --- Remap item.category_id from 1 to correct category ---
        // Category 2: Contenants
        $this->addSql("UPDATE item SET category_id = 2 WHERE item IN ('Baril (D)', 'Poire à poudre (D)', 'Fiole vide (D)', 'Flasque vide (D)', 'Carquois (D)')");
        // Category 3: Cordes et chaînes
        $this->addSql("UPDATE item SET category_id = 3 WHERE item IN ('Chaîne (3 m)', 'Corde (15 m)')");
        // Category 4: Déplacement
        $this->addSql("UPDATE item SET category_id = 4 WHERE item IN ('Échelle de corde (5 m)', 'Équipement d''escalade', 'Grappin', 'Palan')");
        // Category 5: Éclairage
        $this->addSql("UPDATE item SET category_id = 5 WHERE item IN ('Bougie (D)', 'Lampe', 'Lanterne', 'Torche (D)')");
        // Category 6: Écrits
        $this->addSql("UPDATE item SET category_id = 6 WHERE item IN ('Craie (D)', 'Grimoire', 'Livre', 'Papier (D)', 'Parchemin (D)', 'Plume d''écriture', 'Encre')");
        // Category 7: Explosifs
        $this->addSql("UPDATE item SET category_id = 7 WHERE item IN ('Poudre à canon (baril)', 'Poudre à canon (poire)')");
        // Category 8: Liquides
        $this->addSql("UPDATE item SET category_id = 8 WHERE item IN ('Parfum', 'Huile')");
        // Category 9: Outils
        $this->addSql("UPDATE item SET category_id = 9 WHERE item IN ('Bélier portatif', 'Crochets (D)', 'Marteau', 'Pelle', 'Pied-de-biche', 'Pioche')");
        // Category 10: Optique
        $this->addSql("UPDATE item SET category_id = 10 WHERE item IN ('Longue-vue', 'Loupe')");
        // Category 11: Outils de marchand
        $this->addSql("UPDATE item SET category_id = 11 WHERE item IN ('Balance de marchand', 'Boulier')");
        // Category 12: Pièges
        $this->addSql("UPDATE item SET category_id = 12 WHERE item IN ('Billes (D)', 'Chausse-trappes (D)', 'Piège à mâchoires', 'Pointes en fer (D)')");
        // Category 13: Autres
        $this->addSql("UPDATE item SET category_id = 13 WHERE item IN ('Cadenas', 'Chevalière', 'Cire à cacheter (D)', 'Cloche', 'Matériel de pêche', 'Menottes', 'Miroir en acier', 'Perche (3 m)', 'Pierre à aiguiser', 'Sablier / Clepsydre', 'Savon (D)', 'Sifflet / Appeau', 'Trousse de soins (D)')");
        // Category 1: Campement stays at 1 (default)

        // --- armor (15 rows: 5 per weight class) ---
        $this->addSql("INSERT INTO armor (id, category, description, protection, protection_magical, price, enc, speed_penalty, movement_check_disadvantage) VALUES
            (1, 'Légère', NULL, 1, 0, '75 pa', 1, NULL, NULL),
            (2, 'Légère', NULL, 2, 0, '150 pa', 1, NULL, NULL),
            (3, 'Légère', NULL, 3, 1, '375 pa', 1, NULL, NULL),
            (4, 'Légère', NULL, 4, 2, '1000 pa', 1, NULL, NULL),
            (5, 'Légère', NULL, 5, 3, '1800 pa', 1, NULL, NULL),
            (6, 'Intermédiaire', NULL, 2, 0, '100 pa', 2, NULL, NULL),
            (7, 'Intermédiaire', NULL, 3, 1, '200 pa', 2, NULL, NULL),
            (8, 'Intermédiaire', NULL, 4, 2, '500 pa', 2, NULL, NULL),
            (9, 'Intermédiaire', NULL, 5, 3, '1200 pa', 2, NULL, NULL),
            (10, 'Intermédiaire', NULL, 6, 4, '2500 pa', 2, NULL, NULL),
            (11, 'Lourde', NULL, 3, 1, '125 pa', 3, NULL, NULL),
            (12, 'Lourde', NULL, 4, 2, '300 pa', 3, NULL, NULL),
            (13, 'Lourde', NULL, 5, 3, '750 pa', 3, NULL, NULL),
            (14, 'Lourde', NULL, 6, 4, '1500 pa', 3, NULL, NULL),
            (15, 'Lourde', NULL, 7, 5, '3000 pa', 3, NULL, NULL)");

        // --- Drop unique constraint on armor.category (removed from entity) ---
        $this->addSql('DROP INDEX IF EXISTS uniq_bf27fefc64c19c1');
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DELETE FROM armor WHERE id BETWEEN 1 AND 15");
        $this->addSql("UPDATE item SET category_id = 1");
        $this->addSql("DELETE FROM item_category WHERE id BETWEEN 1 AND 13");
    }
}
