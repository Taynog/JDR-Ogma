<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260724040000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Populate material (15 rows) and armor_material pivot (15 links)';
    }

    public function up(Schema $schema): void
    {
        // --- material (15 rows, one per armor material) ---
        $this->addSql("INSERT INTO material (id, material, description, weapon_bonus_dmg, weapon_passive_effect, weapon_active_effect, armor_bonus_protection, armor_bonus_proctection_magical, armor_passive_effect, armor_active_effect, weapon_price_multiplier, armor_price_multiplier) VALUES
            (1, 'Peau', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
            (2, 'Cuir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
            (3, 'Alkite', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
            (4, 'Kusni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
            (5, 'Gnistar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
            (6, 'Chitine', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
            (7, 'Os', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
            (8, 'Nilaroy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
            (9, 'Adamantine', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
            (10, 'Lakma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
            (11, 'Fer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
            (12, 'Acier', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
            (13, 'Shoren', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
            (14, 'Orichalque', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
            (15, 'Skymma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

        // --- armor_material pivot (15 links) ---
        // armor_id maps to material_id (1:1 positional from the armor migration)
        $this->addSql("INSERT INTO armor_material (armor_material, armor_category) VALUES
            (1, 1),
            (2, 2),
            (3, 3),
            (4, 4),
            (5, 5),
            (6, 6),
            (7, 7),
            (8, 8),
            (9, 9),
            (10, 10),
            (11, 11),
            (12, 12),
            (13, 13),
            (14, 14),
            (15, 15)");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DELETE FROM armor_material');
        $this->addSql('DELETE FROM material WHERE id BETWEEN 1 AND 15');
    }
}
