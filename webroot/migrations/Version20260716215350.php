<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260716215350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create initial schema: all tables with id auto-increment PKs, unique constraints, and proper foreign keys.';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE armor_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE changelog_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE combat_art_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE damage_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE glossary_condition_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE glossary_trait_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE item_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE item_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE material_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE skill_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE stance_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE weapon_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE weapon_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE weapon_property_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE weapon_property_details_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE web_content_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE armor (id INT NOT NULL, category VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, protection SMALLINT NOT NULL, protection_magical SMALLINT NOT NULL, price VARCHAR(255) NOT NULL, enc SMALLINT NOT NULL, speed_penalty VARCHAR(255) DEFAULT NULL, movement_check_disadvantage VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BF27FEFC64C19C1 ON armor (category)');
        $this->addSql('CREATE TABLE changelog (id INT NOT NULL, version VARCHAR(255) NOT NULL, content TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C8422601BF1CD3C3 ON changelog (version)');
        $this->addSql('CREATE TABLE combat_art (id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, conditions TEXT DEFAULT NULL, effect TEXT NOT NULL, cost VARCHAR(255) DEFAULT NULL, assaillant_test TEXT NOT NULL, defender_test TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_52A7FB945E237E06 ON combat_art (name)');
        $this->addSql('CREATE TABLE combat_art_weapon_category (combat_art_id INT NOT NULL, weapon_category_id INT NOT NULL, PRIMARY KEY(combat_art_id, weapon_category_id))');
        $this->addSql('CREATE INDEX IDX_B04BE02023A1DB73 ON combat_art_weapon_category (combat_art_id)');
        $this->addSql('CREATE INDEX IDX_B04BE0204011281B ON combat_art_weapon_category (weapon_category_id)');
        $this->addSql('CREATE TABLE damage_type (id INT NOT NULL, type VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, effect TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_533C1638CDE5729 ON damage_type (type)');
        $this->addSql('CREATE TABLE glossary_condition (id INT NOT NULL, condition VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, effect TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3C3CCF3EBDD68843 ON glossary_condition (condition)');
        $this->addSql('CREATE TABLE glossary_trait (id INT NOT NULL, trait VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, effect TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CAF9008FA1041DD9 ON glossary_trait (trait)');
        $this->addSql('CREATE TABLE item (id INT NOT NULL, category_id INT NOT NULL, item VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, price VARCHAR(255) NOT NULL, enc SMALLINT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1F1B251E1F1B251E ON item (item)');
        $this->addSql('CREATE INDEX IDX_1F1B251E12469DE2 ON item (category_id)');
        $this->addSql('CREATE TABLE item_category (id INT NOT NULL, category VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6A41D10A64C19C1 ON item_category (category)');
        $this->addSql('CREATE TABLE material (id INT NOT NULL, material VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, weapon_bonus_dmg VARCHAR(255) DEFAULT NULL, weapon_passive_effect TEXT DEFAULT NULL, weapon_active_effect TEXT DEFAULT NULL, armor_bonus_protection VARCHAR(255) DEFAULT NULL, armor_bonus_proctection_magical VARCHAR(255) DEFAULT NULL, armor_passive_effect TEXT DEFAULT NULL, armor_active_effect TEXT DEFAULT NULL, weapon_price_multiplier VARCHAR(255) DEFAULT NULL, armor_price_multiplier VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7CBE75957CBE7595 ON material (material)');
        $this->addSql('CREATE TABLE armor_material (armor_material INT NOT NULL, armor_category INT NOT NULL, PRIMARY KEY(armor_material, armor_category))');
        $this->addSql('CREATE INDEX IDX_29DBA0B129DBA0B1 ON armor_material (armor_material)');
        $this->addSql('CREATE INDEX IDX_29DBA0B15329CCE5 ON armor_material (armor_category)');
        $this->addSql('CREATE TABLE skill (id INT NOT NULL, skill VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, main_carac VARCHAR(255) DEFAULT NULL, specialisation_example TEXT DEFAULT NULL, test_example TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5E3DE4775E3DE477 ON skill (skill)');
        $this->addSql('CREATE TABLE stance (id INT NOT NULL, stance VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, effect TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_82FD433C82FD433C ON stance (stance)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, is_verified BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('CREATE TABLE weapon (id INT NOT NULL, category_id INT NOT NULL, type VARCHAR(50) NOT NULL, damage_type VARCHAR(255) NOT NULL, damage VARCHAR(255) NOT NULL, handling VARCHAR(255) NOT NULL, reach VARCHAR(25) NOT NULL, enc SMALLINT NOT NULL, price VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6933A7E68CDE5729 ON weapon (type)');
        $this->addSql('CREATE INDEX IDX_6933A7E612469DE2 ON weapon (category_id)');
        $this->addSql('CREATE TABLE weapon_property_weapon (weapon_id INT NOT NULL, weapon_property_details_id INT NOT NULL, PRIMARY KEY(weapon_id, weapon_property_details_id))');
        $this->addSql('CREATE INDEX IDX_5F20560795B82273 ON weapon_property_weapon (weapon_id)');
        $this->addSql('CREATE INDEX IDX_5F205607CF8AEC93 ON weapon_property_weapon (weapon_property_details_id)');
        $this->addSql('CREATE TABLE weapon_category (id INT NOT NULL, category VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, effect TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7758AB0864C19C1 ON weapon_category (category)');
        $this->addSql('CREATE TABLE weapon_property (id INT NOT NULL, property VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, effect TEXT DEFAULT NULL, example TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FAE6AE178BF21CDE ON weapon_property (property)');
        $this->addSql('CREATE TABLE weapon_property_details (id INT NOT NULL, weapon_property_id INT NOT NULL, x VARCHAR(20) DEFAULT NULL, y VARCHAR(20) DEFAULT NULL, z VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A51DCA956C5A615 ON weapon_property_details (weapon_property_id)');
        $this->addSql('CREATE TABLE web_content (id INT NOT NULL, page VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, content TEXT DEFAULT NULL, category VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_166A9E37140AB620 ON web_content (page)');
        $this->addSql('ALTER TABLE combat_art_weapon_category ADD CONSTRAINT FK_B04BE02023A1DB73 FOREIGN KEY (combat_art_id) REFERENCES combat_art (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE combat_art_weapon_category ADD CONSTRAINT FK_B04BE0204011281B FOREIGN KEY (weapon_category_id) REFERENCES weapon_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E12469DE2 FOREIGN KEY (category_id) REFERENCES item_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE armor_material ADD CONSTRAINT FK_29DBA0B129DBA0B1 FOREIGN KEY (armor_material) REFERENCES material (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE armor_material ADD CONSTRAINT FK_29DBA0B15329CCE5 FOREIGN KEY (armor_category) REFERENCES armor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE weapon ADD CONSTRAINT FK_6933A7E612469DE2 FOREIGN KEY (category_id) REFERENCES weapon_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE weapon_property_weapon ADD CONSTRAINT FK_5F20560795B82273 FOREIGN KEY (weapon_id) REFERENCES weapon (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE weapon_property_weapon ADD CONSTRAINT FK_5F205607CF8AEC93 FOREIGN KEY (weapon_property_details_id) REFERENCES weapon_property_details (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE weapon_property_details ADD CONSTRAINT FK_A51DCA956C5A615 FOREIGN KEY (weapon_property_id) REFERENCES weapon_property (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE armor_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE changelog_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE combat_art_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE damage_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE glossary_condition_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE glossary_trait_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE item_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE item_category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE material_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE skill_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE stance_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE weapon_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE weapon_category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE weapon_property_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE weapon_property_details_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE web_content_id_seq CASCADE');
        $this->addSql('ALTER TABLE combat_art_weapon_category DROP CONSTRAINT FK_B04BE02023A1DB73');
        $this->addSql('ALTER TABLE combat_art_weapon_category DROP CONSTRAINT FK_B04BE0204011281B');
        $this->addSql('ALTER TABLE item DROP CONSTRAINT FK_1F1B251E12469DE2');
        $this->addSql('ALTER TABLE armor_material DROP CONSTRAINT FK_29DBA0B129DBA0B1');
        $this->addSql('ALTER TABLE armor_material DROP CONSTRAINT FK_29DBA0B15329CCE5');
        $this->addSql('ALTER TABLE weapon DROP CONSTRAINT FK_6933A7E612469DE2');
        $this->addSql('ALTER TABLE weapon_property_weapon DROP CONSTRAINT FK_5F20560795B82273');
        $this->addSql('ALTER TABLE weapon_property_weapon DROP CONSTRAINT FK_5F205607CF8AEC93');
        $this->addSql('ALTER TABLE weapon_property_details DROP CONSTRAINT FK_A51DCA956C5A615');
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
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE weapon');
        $this->addSql('DROP TABLE weapon_property_weapon');
        $this->addSql('DROP TABLE weapon_category');
        $this->addSql('DROP TABLE weapon_property');
        $this->addSql('DROP TABLE weapon_property_details');
        $this->addSql('DROP TABLE web_content');
    }
}
