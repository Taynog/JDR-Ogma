<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260723120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add category, tier, order_index, section fields to combat_art; remove unique constraint on name';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE combat_art ADD category VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE combat_art ADD tier VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE combat_art ADD critique LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE combat_art ADD order_index INT NOT NULL DEFAULT 0');
        $this->addSql('ALTER TABLE combat_art ADD section INT NOT NULL DEFAULT 1');
        $this->addSql('ALTER TABLE combat_art DROP INDEX UNIQ_7B2D5E495E237E06');
        $this->addSql('ALTER TABLE combat_art ADD INDEX idx_combat_art_category_tier (category, tier, order_index)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE combat_art DROP INDEX idx_combat_art_category_tier');
        $this->addSql('ALTER TABLE combat_art ADD UNIQUE INDEX UNIQ_7B2D5E495E237E06 (name)');
        $this->addSql('ALTER TABLE combat_art DROP section');
        $this->addSql('ALTER TABLE combat_art DROP order_index');
        $this->addSql('ALTER TABLE combat_art DROP critique');
        $this->addSql('ALTER TABLE combat_art DROP tier');
        $this->addSql('ALTER TABLE combat_art DROP category');
    }
}
