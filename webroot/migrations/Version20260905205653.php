<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260905205653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "user" ADD avatar_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN "user".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE web_content ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE web_content_section ALTER id DROP DEFAULT');
        $this->addSql('UPDATE "user" SET created_at = NOW() WHERE created_at IS NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE web_content_section_id_seq');
        $this->addSql('SELECT setval(\'web_content_section_id_seq\', (SELECT MAX(id) FROM web_content_section))');
        $this->addSql('ALTER TABLE web_content_section ALTER id SET DEFAULT nextval(\'web_content_section_id_seq\')');
        $this->addSql('ALTER TABLE "user" DROP avatar_name');
        $this->addSql('ALTER TABLE "user" DROP created_at');
        $this->addSql('CREATE SEQUENCE web_content_id_seq');
        $this->addSql('SELECT setval(\'web_content_id_seq\', (SELECT MAX(id) FROM web_content))');
        $this->addSql('ALTER TABLE web_content ALTER id SET DEFAULT nextval(\'web_content_id_seq\')');
    }
}
