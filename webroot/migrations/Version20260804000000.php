<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260804000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create missing sequence for sort table id column';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE IF NOT EXISTS sort_id_seq');
        $this->addSql("SELECT setval('sort_id_seq', COALESCE((SELECT MAX(id) FROM \"sort\"), 1), (SELECT COUNT(*) FROM \"sort\") > 0)");
        $this->addSql("ALTER TABLE \"sort\" ALTER COLUMN id SET DEFAULT nextval('sort_id_seq')");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("ALTER TABLE \"sort\" ALTER COLUMN id DROP DEFAULT");
        $this->addSql('DROP SEQUENCE IF EXISTS sort_id_seq');
    }
}
