<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251209184508 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE armor (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, protection SMALLINT NOT NULL, protection_magical SMALLINT NOT NULL, price VARCHAR(255) NOT NULL, enc SMALLINT NOT NULL, speed_penalty VARCHAR(255) DEFAULT NULL, movement_check_disadvantage VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE changelog (id INT AUTO_INCREMENT NOT NULL, version VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE combat_art (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, conditions LONGTEXT DEFAULT NULL, effect LONGTEXT NOT NULL, cost VARCHAR(255) DEFAULT NULL, assaillant_test LONGTEXT NOT NULL, defender_test LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE combat_art_weapon_category (combat_art INT NOT NULL, weapon_category INT NOT NULL, INDEX IDX_B04BE02052A7FB94 (combat_art), INDEX IDX_B04BE0207758AB08 (weapon_category), PRIMARY KEY(combat_art, weapon_category)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE damage_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, effect LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE glossary_condition (id INT AUTO_INCREMENT NOT NULL, `condition` VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, effect LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE glossary_trait (id INT AUTO_INCREMENT NOT NULL, trait VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, effect LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, item VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, price VARCHAR(255) NOT NULL, enc SMALLINT NOT NULL, INDEX IDX_1F1B251E12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_category (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE material (id INT AUTO_INCREMENT NOT NULL, material VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, weapon_bonus_dmg VARCHAR(255) DEFAULT NULL, weapon_passive_effect LONGTEXT DEFAULT NULL, weapon_active_effect LONGTEXT DEFAULT NULL, armor_bonus_protection VARCHAR(255) DEFAULT NULL, armor_bonus_proctection_magical VARCHAR(255) DEFAULT NULL, armor_passive_effect LONGTEXT DEFAULT NULL, armor_active_effect LONGTEXT DEFAULT NULL, weapon_price_multiplier VARCHAR(255) DEFAULT NULL, armor_price_multiplier VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE armor_material (armor_material INT NOT NULL, armor_category INT NOT NULL, INDEX IDX_29DBA0B129DBA0B1 (armor_material), INDEX IDX_29DBA0B15329CCE5 (armor_category), PRIMARY KEY(armor_material, armor_category)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, skill VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, main_carac VARCHAR(255) DEFAULT NULL, specialisation_example LONGTEXT DEFAULT NULL, test_example LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stance (id INT AUTO_INCREMENT NOT NULL, stance VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, effect LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, type VARCHAR(50) NOT NULL, damage_type VARCHAR(255) NOT NULL, damage VARCHAR(255) NOT NULL, handling VARCHAR(255) NOT NULL, reach VARCHAR(25) NOT NULL, enc SMALLINT NOT NULL, price VARCHAR(255) NOT NULL, INDEX IDX_6933A7E612469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon_category (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, effect LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon_property (id INT AUTO_INCREMENT NOT NULL, property VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, effect LONGTEXT DEFAULT NULL, example LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon_property_details (weapon_id INT NOT NULL, weapon_property_id INT NOT NULL, x VARCHAR(20) DEFAULT NULL, y VARCHAR(20) DEFAULT NULL, z VARCHAR(20) DEFAULT NULL, INDEX IDX_A51DCA9595B82273 (weapon_id), INDEX IDX_A51DCA956C5A615 (weapon_property_id), PRIMARY KEY(weapon_id, weapon_property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE web_content (id INT AUTO_INCREMENT NOT NULL, page VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, category VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE combat_art_weapon_category ADD CONSTRAINT FK_B04BE02052A7FB94 FOREIGN KEY (combat_art) REFERENCES combat_art (id)');
        $this->addSql('ALTER TABLE combat_art_weapon_category ADD CONSTRAINT FK_B04BE0207758AB08 FOREIGN KEY (weapon_category) REFERENCES weapon_category (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E12469DE2 FOREIGN KEY (category_id) REFERENCES item_category (id)');
        $this->addSql('ALTER TABLE armor_material ADD CONSTRAINT FK_29DBA0B129DBA0B1 FOREIGN KEY (armor_material) REFERENCES material (id)');
        $this->addSql('ALTER TABLE armor_material ADD CONSTRAINT FK_29DBA0B15329CCE5 FOREIGN KEY (armor_category) REFERENCES armor (id)');
        $this->addSql('ALTER TABLE weapon ADD CONSTRAINT FK_6933A7E612469DE2 FOREIGN KEY (category_id) REFERENCES weapon_category (id)');
        $this->addSql('ALTER TABLE weapon_property_details ADD CONSTRAINT FK_A51DCA9595B82273 FOREIGN KEY (weapon_id) REFERENCES weapon (id)');
        $this->addSql('ALTER TABLE weapon_property_details ADD CONSTRAINT FK_A51DCA956C5A615 FOREIGN KEY (weapon_property_id) REFERENCES weapon_property (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE combat_art_weapon_category DROP FOREIGN KEY FK_B04BE02052A7FB94');
        $this->addSql('ALTER TABLE combat_art_weapon_category DROP FOREIGN KEY FK_B04BE0207758AB08');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E12469DE2');
        $this->addSql('ALTER TABLE armor_material DROP FOREIGN KEY FK_29DBA0B129DBA0B1');
        $this->addSql('ALTER TABLE armor_material DROP FOREIGN KEY FK_29DBA0B15329CCE5');
        $this->addSql('ALTER TABLE weapon DROP FOREIGN KEY FK_6933A7E612469DE2');
        $this->addSql('ALTER TABLE weapon_property_details DROP FOREIGN KEY FK_A51DCA9595B82273');
        $this->addSql('ALTER TABLE weapon_property_details DROP FOREIGN KEY FK_A51DCA956C5A615');
        $this->addSql('DROP TABLE armor');
        $this->addSql('DROP TABLE changelog');
        $this->addSql('DROP TABLE combat_art');
        $this->addSql('DROP TABLE combat_art_weapon_category');
        $this->addSql('DROP TABLE damage_type');
        $this->addSql('DROP TABLE glossary_condition');
        $this->addSql('DROP TABLE glossary_trait');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE item_category');
        $this->addSql('DROP TABLE material');
        $this->addSql('DROP TABLE armor_material');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE stance');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE weapon');
        $this->addSql('DROP TABLE weapon_category');
        $this->addSql('DROP TABLE weapon_property');
        $this->addSql('DROP TABLE weapon_property_details');
        $this->addSql('DROP TABLE web_content');
    }
}
