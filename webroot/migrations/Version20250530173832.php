<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250530173832 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE weapon_property_details (weapon_id VARCHAR(50) NOT NULL, weapon_property_id VARCHAR(255) NOT NULL, x VARCHAR(20) DEFAULT NULL, y VARCHAR(20) DEFAULT NULL, z VARCHAR(20) DEFAULT NULL, INDEX IDX_A51DCA9595B82273 (weapon_id), INDEX IDX_A51DCA956C5A615 (weapon_property_id), PRIMARY KEY(weapon_id, weapon_property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE weapon_property_details ADD CONSTRAINT FK_A51DCA9595B82273 FOREIGN KEY (weapon_id) REFERENCES weapon (type)');
        $this->addSql('ALTER TABLE weapon_property_details ADD CONSTRAINT FK_A51DCA956C5A615 FOREIGN KEY (weapon_property_id) REFERENCES weapon_property (property)');
        $this->addSql('DROP TABLE weapon_properties');
        $this->addSql('DROP TABLE weapon_properties_join_weapons');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE weapon_properties (id INT AUTO_INCREMENT NOT NULL, weapon_property_id VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, x VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, y VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, z VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_B894FE746C5A615 (weapon_property_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE weapon_properties_join_weapons (weapon_type VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, weapon_properties_id INT NOT NULL, INDEX IDX_F9EED02B34C1BFD6 (weapon_type), INDEX IDX_F9EED02B48E49E6A (weapon_properties_id), PRIMARY KEY(weapon_properties_id, weapon_type)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE weapon_property_details DROP FOREIGN KEY FK_A51DCA9595B82273');
        $this->addSql('ALTER TABLE weapon_property_details DROP FOREIGN KEY FK_A51DCA956C5A615');
        $this->addSql('DROP TABLE weapon_property_details');
    }
}
