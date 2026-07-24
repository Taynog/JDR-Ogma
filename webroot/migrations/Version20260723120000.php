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
        $this->addSql('ALTER TABLE combat_art ADD critique TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE combat_art ADD order_index INT NOT NULL DEFAULT 0');
        $this->addSql('ALTER TABLE combat_art ADD section INT NOT NULL DEFAULT 1');
        $this->addSql('DROP INDEX IF EXISTS UNIQ_7B2D5E495E237E06');
        $this->addSql('DROP INDEX IF EXISTS uniq_52a7fb945e237e06');
        $this->addSql('CREATE INDEX idx_combat_art_category_tier ON combat_art (category, tier, order_index)');
        $this->addSql("CREATE SEQUENCE IF NOT EXISTS combat_art_id_seq");
        $this->addSql("SELECT setval('combat_art_id_seq', (SELECT COALESCE(MAX(id), 0) FROM combat_art))");
        $this->addSql("ALTER TABLE combat_art ALTER COLUMN id SET DEFAULT nextval('combat_art_id_seq')");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX IF EXISTS idx_combat_art_category_tier');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7B2D5E495E237E06 ON combat_art (name)');
        $this->addSql('ALTER TABLE combat_art DROP section');
        $this->addSql('ALTER TABLE combat_art DROP order_index');
        $this->addSql('ALTER TABLE combat_art DROP critique');
        $this->addSql('ALTER TABLE combat_art DROP tier');
        $this->addSql('ALTER TABLE combat_art DROP category');
    }
}
