<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Migration pour ajouter les colonnes de brouillon à formulaire_inscription
 */
final class Version20251014090000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajout des colonnes draft_json, draft_step et draft_updated_at à formulaire_inscription';
    }

    public function up(Schema $schema): void
    {
        // Ajout des colonnes de brouillon
        $this->addSql('ALTER TABLE formulaire_inscription ADD draft_json LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE formulaire_inscription ADD draft_step INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formulaire_inscription ADD draft_updated_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // Suppression des colonnes de brouillon
        $this->addSql('ALTER TABLE formulaire_inscription DROP draft_json');
        $this->addSql('ALTER TABLE formulaire_inscription DROP draft_step');
        $this->addSql('ALTER TABLE formulaire_inscription DROP draft_updated_at');
    }
}
