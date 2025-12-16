<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251216101131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formulaire_intendance (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, nom_etudiant VARCHAR(255) DEFAULT NULL, prenom_etudiant VARCHAR(255) DEFAULT NULL, classe VARCHAR(255) DEFAULT NULL, date_naissance DATE DEFAULT NULL, nom_representant VARCHAR(255) DEFAULT NULL, prenom_representant VARCHAR(255) DEFAULT NULL, adresse_representant LONGTEXT DEFAULT NULL, code_postal_representant VARCHAR(10) DEFAULT NULL, telephone_representant VARCHAR(20) DEFAULT NULL, ville_representant VARCHAR(255) DEFAULT NULL, mail_representant VARCHAR(255) DEFAULT NULL, nom_employeur VARCHAR(255) DEFAULT NULL, adresse_employeur LONGTEXT DEFAULT NULL, etudiant_regime VARCHAR(255) DEFAULT NULL, statut VARCHAR(50) DEFAULT NULL, date_creation DATETIME DEFAULT NULL, date_soumission DATETIME DEFAULT NULL, INDEX IDX_6DE90C3FFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formulaire_intendance ADD CONSTRAINT FK_6DE90C3FFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formulaire_intendance DROP FOREIGN KEY FK_6DE90C3FFB88E14F');
        $this->addSql('DROP TABLE formulaire_intendance');
    }
}
