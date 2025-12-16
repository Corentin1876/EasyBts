<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251216084348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fiche_urgence (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, nom_etudiant VARCHAR(255) DEFAULT NULL, prenom_etudiant VARCHAR(255) DEFAULT NULL, classe VARCHAR(255) DEFAULT NULL, sexe VARCHAR(10) DEFAULT NULL, nom_representant VARCHAR(255) DEFAULT NULL, adresse_representant LONGTEXT DEFAULT NULL, centre_secu_nom VARCHAR(255) DEFAULT NULL, centre_secu_adresse LONGTEXT DEFAULT NULL, assurance_nom VARCHAR(255) DEFAULT NULL, assurance_adresse LONGTEXT DEFAULT NULL, assurance_numero VARCHAR(100) DEFAULT NULL, pere_tel_domicile VARCHAR(20) DEFAULT NULL, pere_tel_travail VARCHAR(20) DEFAULT NULL, pere_poste VARCHAR(255) DEFAULT NULL, pere_tel_perso VARCHAR(20) DEFAULT NULL, mere_tel_travail VARCHAR(20) DEFAULT NULL, mere_poste VARCHAR(255) DEFAULT NULL, mere_tel_perso VARCHAR(20) DEFAULT NULL, nom_contact_urgence VARCHAR(255) DEFAULT NULL, tel_contact_urgence VARCHAR(20) DEFAULT NULL, date_vaccin_antitetanique DATE DEFAULT NULL, observation_etudiant LONGTEXT DEFAULT NULL, medecin_nom VARCHAR(255) DEFAULT NULL, medecin_adresse LONGTEXT DEFAULT NULL, medecin_numero VARCHAR(20) DEFAULT NULL, statut VARCHAR(50) DEFAULT NULL, date_creation DATETIME DEFAULT NULL, date_soumission DATETIME DEFAULT NULL, INDEX IDX_6B7C3017FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fiche_urgence ADD CONSTRAINT FK_6B7C3017FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche_urgence DROP FOREIGN KEY FK_6B7C3017FB88E14F');
        $this->addSql('DROP TABLE fiche_urgence');
    }
}
