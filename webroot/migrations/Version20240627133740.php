<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240627133740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE weapon_properties (id INT AUTO_INCREMENT NOT NULL, weapon_property_id VARCHAR(255) NOT NULL, x VARCHAR(20) DEFAULT NULL, y VARCHAR(20) DEFAULT NULL, z VARCHAR(20) DEFAULT NULL, INDEX IDX_B894FE746C5A615 (weapon_property_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon_properties_join_weapons (weapon_type INT NOT NULL, weapon_property VARCHAR(50) NOT NULL, INDEX IDX_F9EED02B34C1BFD6 (weapon_type), INDEX IDX_F9EED02BFAE6AE17 (weapon_property), PRIMARY KEY(weapon_type, weapon_property)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE weapon_properties ADD CONSTRAINT FK_B894FE746C5A615 FOREIGN KEY (weapon_property_id) REFERENCES weapon_property (property)');
        $this->addSql('ALTER TABLE weapon_properties_join_weapons ADD CONSTRAINT FK_F9EED02B34C1BFD6 FOREIGN KEY (weapon_type) REFERENCES weapon_properties (id)');
        $this->addSql('ALTER TABLE weapon_properties_join_weapons ADD CONSTRAINT FK_F9EED02BFAE6AE17 FOREIGN KEY (weapon_property) REFERENCES weapon (type)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE weapon_properties DROP FOREIGN KEY FK_B894FE746C5A615');
        $this->addSql('ALTER TABLE weapon_properties_join_weapons DROP FOREIGN KEY FK_F9EED02B34C1BFD6');
        $this->addSql('ALTER TABLE weapon_properties_join_weapons DROP FOREIGN KEY FK_F9EED02BFAE6AE17');
        $this->addSql('DROP TABLE weapon_properties');
        $this->addSql('DROP TABLE weapon_properties_join_weapons');
    }
}
