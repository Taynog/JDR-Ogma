<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240627130323 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE combat_art (name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, conditions LONGTEXT DEFAULT NULL, effect LONGTEXT NOT NULL, cost VARCHAR(255) DEFAULT NULL, assaillant_test LONGTEXT NOT NULL, defender_test LONGTEXT NOT NULL, PRIMARY KEY(name)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE combat_art_weapon_category (combat_art VARCHAR(255) NOT NULL, weapon_category VARCHAR(255) NOT NULL, INDEX IDX_B04BE02052A7FB94 (combat_art), INDEX IDX_B04BE0207758AB08 (weapon_category), PRIMARY KEY(combat_art, weapon_category)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE combat_art_weapon_category ADD CONSTRAINT FK_B04BE02052A7FB94 FOREIGN KEY (combat_art) REFERENCES combat_art (name)');
        $this->addSql('ALTER TABLE combat_art_weapon_category ADD CONSTRAINT FK_B04BE0207758AB08 FOREIGN KEY (weapon_category) REFERENCES weapon_category (category)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE combat_art_weapon_category DROP FOREIGN KEY FK_B04BE02052A7FB94');
        $this->addSql('ALTER TABLE combat_art_weapon_category DROP FOREIGN KEY FK_B04BE0207758AB08');
        $this->addSql('DROP TABLE combat_art');
        $this->addSql('DROP TABLE combat_art_weapon_category');
    }
}
