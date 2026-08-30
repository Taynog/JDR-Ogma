<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260815000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create web_content_section table, drop web_content.content column';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE web_content_section_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE web_content_section (id INT NOT NULL, web_content_id INT NOT NULL, "position" INT NOT NULL DEFAULT 0, title VARCHAR(255) DEFAULT NULL, level INT NOT NULL DEFAULT 2, anchor VARCHAR(255) DEFAULT NULL, collapsible BOOLEAN NOT NULL DEFAULT true, content TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE web_content_section ADD CONSTRAINT FK_2F0B82895C019E1 FOREIGN KEY (web_content_id) REFERENCES web_content (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_2F0B82895C019E1 ON web_content_section (web_content_id)');
        $this->addSql('ALTER TABLE web_content DROP COLUMN content');
        $this->addSql('ALTER TABLE combat_art ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE combat_art ALTER order_index DROP DEFAULT');
        $this->addSql('ALTER TABLE combat_art ALTER section DROP DEFAULT');
        $this->addSql('ALTER TABLE "sort" ALTER id DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE web_content ADD COLUMN content TEXT DEFAULT NULL');
        $this->addSql('DROP TABLE web_content_section');
        $this->addSql('DROP SEQUENCE web_content_section_id_seq');
    }
}
