<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260723120100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Populate combat_art category, tier, order_index, section, critique; add missing duplicate arts for weapon skills';
    }

    public function up(Schema $schema): void
    {
        // Section 1: Basics — update existing rows
        $this->addSql("UPDATE combat_art SET section = 1, order_index = 1, critique = 'R: La cible s''assome et sombre dans l''inconscience<br/>E: Le héros chute et passe son prochain tour' WHERE name = 'Balayette'");
        $this->addSql("UPDATE combat_art SET section = 1, order_index = 2, critique = 'R: La cible s''assome et sombre dans l''inconscience<br/>E: Le héros trébuche et passe son prochain tour' WHERE name = 'Charge d''épaule'");
        $this->addSql("UPDATE combat_art SET section = 1, order_index = 3, critique = 'R: Dégâts + 2, cible aveugle 5 tours<br/>E: /' WHERE name = 'Coup dans les yeux'");
        $this->addSql("UPDATE combat_art SET section = 1, order_index = 4, critique = 'R: /<br/>E: Le héros fait tomber son arme à ses pieds.' WHERE name = 'Désarmement'");
        $this->addSql("UPDATE combat_art SET section = 1, order_index = 5, critique = 'R: dégâts + 4<br/>E: Le héros baisse sa garde et subit une attaque d''opportunité' WHERE name = 'Feinte'");
        $this->addSql("UPDATE combat_art SET section = 1, order_index = 6, critique = 'R: /<br/>E: Le héros trébuche et tombe au sol' WHERE name = 'Fente'");
        $this->addSql("UPDATE combat_art SET section = 1, order_index = 7, critique = 'R: 5 tours de saignement<br/>E: /' WHERE name = 'Lacération'");
        $this->addSql("UPDATE combat_art SET section = 1, order_index = 8, critique = NULL WHERE name = 'Lutte'");
        $this->addSql("UPDATE combat_art SET section = 1, order_index = 9, critique = 'R: La durée de provocation passe à 5 rounds, la cible ne frappe que le héros<br/>E: Le héros baisse sa garde et subit une attaque d''opportunité' WHERE name = 'Provocation'");
        $this->addSql("UPDATE combat_art SET section = 1, order_index = 10, critique = 'R: /<br/>E: Le héros baisse sa garde et subit une attaque d''opportunité' WHERE name = 'Ralliement'");
        $this->addSql("UPDATE combat_art SET section = 1, order_index = 11, critique = 'R: /<br/>E: /' WHERE name = 'Repositionnement'");
        $this->addSql("UPDATE combat_art SET section = 1, order_index = 12, critique = 'R: Dégâts + 2<br/>E: /' WHERE name = 'Tranche'");
        $this->addSql("UPDATE combat_art SET section = 1, order_index = 13, critique = 'R: dégâts + 3<br/>E: /' WHERE name = 'Tranche-tendons'");

        // Section 2: Specialist — update existing rows
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Arbalétrier', tier = 'Apprenti', order_index = 1, critique = 'R: /<br/>E: /' WHERE name = 'Tir précis' AND description LIKE '%arbalétrier%'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Arbalétrier', tier = 'Adepte', order_index = 2, critique = 'R: /<br/>E: /' WHERE name = 'Tir déstabilisant' AND description LIKE '%arbalétrier%'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Arbalétrier', tier = 'Expert', order_index = 3, critique = 'R: /<br/>E: /' WHERE name = 'Tir rapide'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Arbalétrier', tier = 'Expert', order_index = 4, critique = 'R: le carreau frappe une troisième cible si possible avec -6 dégâts.<br/>E: /' WHERE name = 'Tir pénétrant'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Archer', tier = 'Expert', order_index = 3, critique = 'R: /<br/>E: La corde de l''arc se brise (Rupture)' WHERE name = 'Volée de flèches'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Assassin', tier = 'Apprenti', order_index = 1, critique = 'R: /<br/>E: /' WHERE name = 'Frappe assassine'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Assassin', tier = 'Expert', order_index = 2, critique = 'R: /<br/>E: /' WHERE name = 'Coup mortel'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Barbare', tier = 'Apprenti', order_index = 1, critique = 'R: /<br/>E: /' WHERE name = 'Frappe lourde' AND description LIKE '%barbare%'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Barbare', tier = 'Adepte', order_index = 2, critique = 'R: L''équipement ciblé est détruit<br/>E: /' WHERE name = 'Destruction' AND description LIKE '%barbare%'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Épéiste', tier = 'Apprenti', order_index = 1, critique = 'R: /<br/>E: /' WHERE name = 'Double attaque'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Épéiste', tier = 'Expert', order_index = 2, critique = 'R: /<br/>E: /' WHERE name = 'Triple attaque'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Faucheur', tier = 'Apprenti', order_index = 1, critique = 'R: /<br/>E: /' WHERE name = 'Déplacement forcé'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Faucheur', tier = 'Adepte', order_index = 2, critique = 'R: /<br/>E: /' WHERE name = 'Frappe dans le dos'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Faucheur', tier = 'Expert', order_index = 3, critique = 'R: /<br/>E: /' WHERE name = 'Frappe de la faucheuse'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Hallebardier', tier = 'Novice', order_index = 0, critique = 'R: /<br/>E: /' WHERE name = 'Réception de charge' AND description LIKE '%hallebardier%'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Hallebardier', tier = 'Apprenti', order_index = 1, critique = 'R: /<br/>E: /' WHERE name = 'Mise au sol'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Hallebardier', tier = 'Adepte', order_index = 2, critique = 'R: /<br/>E: /' WHERE name = 'Frappe de la hampe'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Lancier', tier = 'Apprenti', order_index = 1, critique = 'R: /<br/>E: /' WHERE name = 'Double estoc'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Lancier', tier = 'Expert', order_index = 2, critique = 'R: /<br/>E: /' WHERE name = 'Triple estoc'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Moine', tier = 'Apprenti', order_index = 1, critique = 'R: /<br/>E: /' WHERE name = 'Coup étourdissant'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Moine', tier = 'Adepte', order_index = 2, critique = 'R: /<br/>E: /' WHERE name = 'Enchaînement'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Moine', tier = 'Expert', order_index = 3, critique = 'R: /<br/>E: /' WHERE name = 'Enchaînement supérieur'");
        $this->addSql("UPDATE combat_art SET section = 2, category = 'Tirailleur', tier = 'Adepte', order_index = 2, critique = 'R: /<br/>E: /' WHERE name = 'Harcelement'");

        // === INSERT missing duplicate arts for weapon skills ===

        // Archer
        $this->addSql("INSERT INTO combat_art (name, description, conditions, effect, cost, critique, assaillant_test, defender_test, category, tier, order_index, section) VALUES
            ('Tir précis', 'L''archer prend son temps pour viser sa cible', NULL, 'Dégâts normaux', NULL, 'R: /<br/>E: /', 'Action complexe :<br/>Tir à +15', '', 'Archer', 'Apprenti', 1, 2),
            ('Tir déstabilisant', 'L''archer prépare un tir particulièrement puissant pour faire chuter sa cible', 'Jet rupture pour l''arme à +1', 'La cible est à terre', NULL, 'R: /<br/>E: /', 'Action complexe :<br/>Tir classique', 'VIG pour ne pas tomber', 'Archer', 'Adepte', 2, 2)");

        // Fusilier
        $this->addSql("INSERT INTO combat_art (name, description, conditions, effect, cost, critique, assaillant_test, defender_test, category, tier, order_index, section) VALUES
            ('Tir précis', 'Le fusilier prend son temps pour viser sa cible', NULL, 'Dégâts normaux', NULL, 'R: /<br/>E: /', 'Action complexe :<br/>Tir à +15', '', 'Fusilier', 'Apprenti', 1, 2),
            ('Tir déstabilisant', 'Le fusilier prépare un tir particulièrement puissant en ajoutant une dose de poudre pour faire chuter sa cible', '2 doses de poudres au lieu d''une', 'La cible est à terre', NULL, 'R: /<br/>E: /', 'Action complexe :<br/>Tir classique', 'VIG pour ne pas tomber', 'Fusilier', 'Adepte', 2, 2)");

        // Lanceur
        $this->addSql("INSERT INTO combat_art (name, description, conditions, effect, cost, critique, assaillant_test, defender_test, category, tier, order_index, section) VALUES
            ('Tir précis', 'Le lanceur prend son temps pour viser sa cible', NULL, 'Dégâts normaux', NULL, 'R: /<br/>E: /', 'Action complexe :<br/>Tir à +10', '', 'Lanceur', 'Apprenti', 1, 2),
            ('Tir déstabilisant', 'Le lanceur prépare un tir particulièrement puissant en ajoutant une dose de poudre pour faire chuter sa cible', '-', 'La cible est à terre', NULL, 'R: /<br/>E: /', 'Action complexe :<br/>Tir classique', 'VIG pour ne pas tomber', 'Lanceur', 'Adepte', 2, 2)");

        // Lancier — Novice
        $this->addSql("INSERT INTO combat_art (name, description, conditions, effect, cost, critique, assaillant_test, defender_test, category, tier, order_index, section) VALUES
            ('Réception de charge', 'Le lancier se prépare à infliger une attaque d''opportunité à quiconque pénètre sa zone de contrôle', NULL, 'Le lancier peut porter une attaque d''opportunité (avec un bonus de 10 à l''Atq) supplémentaire sur un adversaire pénétrant sa zone de contrôle.', NULL, 'R: /<br/>E: /', 'Action de mouvement :<br/>Aucune épreuve pour se préparer', '', 'Lancier', 'Novice', 0, 2)");

        // Martelier
        $this->addSql("INSERT INTO combat_art (name, description, conditions, effect, cost, critique, assaillant_test, defender_test, category, tier, order_index, section) VALUES
            ('Frappe lourde', 'Le martelier envoie son adversaire au sol en le frappant avec un force surhumaine', 'FOR du martelier supérieure à celle de sa cible', 'Dégâts x1,5, cible mise au sol et envoyée à 1m + 1m par 10 points de marge de réussite.', NULL, 'R: /<br/>E: /', 'Action complexe<br/>Atq à -10', 'VIG pour résister à la mise au sol', 'Martelier', 'Apprenti', 1, 2),
            ('Destruction', 'Le martelier tente de briser l''équipement de son adversaire avec son arme', 'Rupture du martelier supérieure à l''adversaire', 'L''équipement ciblé est endommagé (arme: Atq et Prd -10, Dgt -2; armure : PR -2)', NULL, 'R: L''équipement ciblé est détruit<br/>E: /', 'Action simple :<br/>FOR', 'AGI pour l''armure ou DEX pour l''arme suivi d''un test de rupture', 'Martelier', 'Adepte', 2, 2)");

        // Pistolier
        $this->addSql("INSERT INTO combat_art (name, description, conditions, effect, cost, critique, assaillant_test, defender_test, category, tier, order_index, section) VALUES
            ('Tir précis', 'Le pistolier prend son temps pour viser sa cible', NULL, 'Dégâts normaux', NULL, 'R: /<br/>E: /', 'Action complexe :<br/>Tir à +15', '', 'Pistolier', 'Apprenti', 1, 2),
            ('Tir déstabilisant', 'Le pistolier prépare un tir particulièrement puissant avec une charge de poudre supplémentaire pour faire chuter sa cible', '2 doses de poudre au lieu d''une', 'La cible est à terre', NULL, 'R: /<br/>E: /', 'Action complexe :<br/>Tir classique', 'VIG pour ne pas tomber', 'Pistolier', 'Adepte', 2, 2),
            ('Tir rapide', 'Le pistolier effectue un tir rapide à la hanche', NULL, 'Dégâts normaux', NULL, 'R: /<br/>E: /', 'Action bonus :<br/>Tir à -10', '', 'Pistolier', 'Expert', 3, 2)");

        // Tirailleur — Apprenti
        $this->addSql("INSERT INTO combat_art (name, description, conditions, effect, cost, critique, assaillant_test, defender_test, category, tier, order_index, section) VALUES
            ('Tir précis', 'Le tirailleur prend son temps pour viser sa cible', NULL, 'Dégâts normaux', NULL, 'R: /<br/>E: /', 'Action complexe :<br/>Tir à +15', '', 'Tirailleur', 'Apprenti', 1, 2)");

        // Section 3: Arts du combat
        $this->addSql("INSERT INTO combat_art (name, description, conditions, effect, cost, critique, assaillant_test, defender_test, category, tier, order_index, section) VALUES
            ('Frappe de précision', 'Le héros vise un point faible de l''armure', NULL, 'Ignore 2 PR supplémentaire', NULL, 'R: Dégâts + 4<br/>E: /', 'Action simple :<br/>Atq - 10', 'Parade/Esquive classique', 'Coup précis', 'Apprenti', 1, 3),
            ('Coup de bouclier', 'Le héros utilise son bouclier pour étourdir son adversaire en le frappant à la tête', NULL, 'Atq et Prd de la cible -10 (3 rounds)', NULL, 'R: Cible passe son prochain tour<br/>E: /', 'Action bonus<br/>Atq du bouclier', 'AGI pour esquiver puis VIG pour résister à l''étourdissement', 'Défenseur', 'Apprenti', 1, 3)");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DELETE FROM combat_art WHERE section IN (2, 3) AND id NOT IN (
            SELECT id FROM (SELECT id FROM combat_art WHERE name IN (
                'Coup étourdissant','Coup mortel','Déplacement forcé','Destruction','Double attaque',
                'Double estoc','Enchaînement','Enchaînement supérieur','Frappe assassine','Frappe dans le dos',
                'Frappe de la faucheuse','Frappe de la hampe','Frappe lourde','Harcelement','Mise au sol',
                'Réception de charge','Tir déstabilisant','Tir pénétrant','Tir précis','Tir rapide',
                'Triple attaque','Triple estoc','Volée de flèches'
            )) AS t
        )");
        $this->addSql("UPDATE combat_art SET section = 1, category = NULL, tier = NULL, order_index = 0, critique = NULL");
    }
}
