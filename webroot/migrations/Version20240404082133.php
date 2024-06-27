<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240404082133 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE armor (category VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, protection SMALLINT NOT NULL, protection_magical SMALLINT NOT NULL, price VARCHAR(255) NOT NULL, enc SMALLINT NOT NULL, speed_penalty VARCHAR(255) DEFAULT NULL, movement_check_disadvantage VARCHAR(255) DEFAULT NULL, PRIMARY KEY(category)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE damage_type (type VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, effect LONGTEXT DEFAULT NULL, PRIMARY KEY(type)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE glossary_condition (`condition` VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, effect LONGTEXT NOT NULL, PRIMARY KEY(`condition`)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE glossary_trait (trait VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, effect LONGTEXT NOT NULL, PRIMARY KEY(trait)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (item VARCHAR(255) NOT NULL, category_id VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, price VARCHAR(255) NOT NULL, enc SMALLINT NOT NULL, INDEX IDX_1F1B251E12469DE2 (category_id), PRIMARY KEY(item)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_category (category VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(category)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE material (material VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, weapon_bonus_dmg VARCHAR(255) DEFAULT NULL, weapon_passive_effect LONGTEXT DEFAULT NULL, weapon_active_effect LONGTEXT DEFAULT NULL, armor_bonus_protection VARCHAR(255) DEFAULT NULL, armor_bonus_proctection_magical VARCHAR(255) DEFAULT NULL, armor_passive_effect LONGTEXT DEFAULT NULL, armor_active_effect LONGTEXT DEFAULT NULL, weapon_price_multiplier VARCHAR(255) DEFAULT NULL, armor_price_multiplier VARCHAR(255) DEFAULT NULL, PRIMARY KEY(material)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE armor_material (armor_material VARCHAR(255) NOT NULL, armor_category VARCHAR(255) NOT NULL, INDEX IDX_29DBA0B129DBA0B1 (armor_material), INDEX IDX_29DBA0B15329CCE5 (armor_category), PRIMARY KEY(armor_material, armor_category)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (skill VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, main_carac VARCHAR(255) DEFAULT NULL, specialisation_example LONGTEXT DEFAULT NULL, test_example LONGTEXT DEFAULT NULL, PRIMARY KEY(skill)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stance (stance VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, effect LONGTEXT NOT NULL, PRIMARY KEY(stance)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon (type VARCHAR(50) NOT NULL, category_id VARCHAR(255) NOT NULL, damage_type VARCHAR(255) NOT NULL, damage VARCHAR(255) NOT NULL, handling VARCHAR(255) NOT NULL, enc SMALLINT NOT NULL, price VARCHAR(255) NOT NULL, INDEX IDX_6933A7E612469DE2 (category_id), PRIMARY KEY(type)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon_properties (weapon_type VARCHAR(50) NOT NULL, weapon_property VARCHAR(255) NOT NULL, INDEX IDX_B894FE7434C1BFD6 (weapon_type), INDEX IDX_B894FE74FAE6AE17 (weapon_property), PRIMARY KEY(weapon_type, weapon_property)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon_category (category VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, effect LONGTEXT DEFAULT NULL, PRIMARY KEY(category)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon_property (property VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, effect LONGTEXT DEFAULT NULL, example LONGTEXT DEFAULT NULL, PRIMARY KEY(property)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE web_content (page VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, category VARCHAR(255) NOT NULL, PRIMARY KEY(page)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E12469DE2 FOREIGN KEY (category_id) REFERENCES item_category (category)');
        $this->addSql('ALTER TABLE armor_material ADD CONSTRAINT FK_29DBA0B129DBA0B1 FOREIGN KEY (armor_material) REFERENCES material (material)');
        $this->addSql('ALTER TABLE armor_material ADD CONSTRAINT FK_29DBA0B15329CCE5 FOREIGN KEY (armor_category) REFERENCES armor (category)');
        $this->addSql('ALTER TABLE weapon ADD CONSTRAINT FK_6933A7E612469DE2 FOREIGN KEY (category_id) REFERENCES weapon_category (category)');
        $this->addSql('ALTER TABLE weapon_properties ADD CONSTRAINT FK_B894FE7434C1BFD6 FOREIGN KEY (weapon_type) REFERENCES weapon (type)');
        $this->addSql('ALTER TABLE weapon_properties ADD CONSTRAINT FK_B894FE74FAE6AE17 FOREIGN KEY (weapon_property) REFERENCES weapon_property (property)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E12469DE2');
        $this->addSql('ALTER TABLE armor_material DROP FOREIGN KEY FK_29DBA0B129DBA0B1');
        $this->addSql('ALTER TABLE armor_material DROP FOREIGN KEY FK_29DBA0B15329CCE5');
        $this->addSql('ALTER TABLE weapon DROP FOREIGN KEY FK_6933A7E612469DE2');
        $this->addSql('ALTER TABLE weapon_properties DROP FOREIGN KEY FK_B894FE7434C1BFD6');
        $this->addSql('ALTER TABLE weapon_properties DROP FOREIGN KEY FK_B894FE74FAE6AE17');
        $this->addSql('DROP TABLE armor');
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
        $this->addSql('DROP TABLE weapon_properties');
        $this->addSql('DROP TABLE weapon_category');
        $this->addSql('DROP TABLE weapon_property');
        $this->addSql('DROP TABLE web_content');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
