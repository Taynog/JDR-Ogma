<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240627134126 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE weapon_properties_join_weapons DROP FOREIGN KEY FK_F9EED02BFAE6AE17');
        $this->addSql('ALTER TABLE weapon_properties_join_weapons DROP FOREIGN KEY FK_F9EED02B34C1BFD6');
        $this->addSql('DROP INDEX IDX_F9EED02BFAE6AE17 ON weapon_properties_join_weapons');
        $this->addSql('DROP INDEX `primary` ON weapon_properties_join_weapons');
        $this->addSql('ALTER TABLE weapon_properties_join_weapons ADD weapon_properties_id INT NOT NULL, DROP weapon_property, CHANGE weapon_type weapon_type VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE weapon_properties_join_weapons ADD CONSTRAINT FK_F9EED02B48E49E6A FOREIGN KEY (weapon_properties_id) REFERENCES weapon_properties (id)');
        $this->addSql('ALTER TABLE weapon_properties_join_weapons ADD CONSTRAINT FK_F9EED02B34C1BFD6 FOREIGN KEY (weapon_type) REFERENCES weapon (type)');
        $this->addSql('CREATE INDEX IDX_F9EED02B48E49E6A ON weapon_properties_join_weapons (weapon_properties_id)');
        $this->addSql('ALTER TABLE weapon_properties_join_weapons ADD PRIMARY KEY (weapon_properties_id, weapon_type)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE weapon_properties_join_weapons DROP FOREIGN KEY FK_F9EED02B48E49E6A');
        $this->addSql('ALTER TABLE weapon_properties_join_weapons DROP FOREIGN KEY FK_F9EED02B34C1BFD6');
        $this->addSql('DROP INDEX IDX_F9EED02B48E49E6A ON weapon_properties_join_weapons');
        $this->addSql('DROP INDEX `PRIMARY` ON weapon_properties_join_weapons');
        $this->addSql('ALTER TABLE weapon_properties_join_weapons ADD weapon_property VARCHAR(50) NOT NULL, DROP weapon_properties_id, CHANGE weapon_type weapon_type INT NOT NULL');
        $this->addSql('ALTER TABLE weapon_properties_join_weapons ADD CONSTRAINT FK_F9EED02BFAE6AE17 FOREIGN KEY (weapon_property) REFERENCES weapon (type)');
        $this->addSql('ALTER TABLE weapon_properties_join_weapons ADD CONSTRAINT FK_F9EED02B34C1BFD6 FOREIGN KEY (weapon_type) REFERENCES weapon_properties (id)');
        $this->addSql('CREATE INDEX IDX_F9EED02BFAE6AE17 ON weapon_properties_join_weapons (weapon_property)');
        $this->addSql('ALTER TABLE weapon_properties_join_weapons ADD PRIMARY KEY (weapon_type, weapon_property)');
    }
}
