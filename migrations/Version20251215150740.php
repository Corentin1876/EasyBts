<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251215150740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adhesion_mdl ADD utilisateur_id INT DEFAULT NULL, ADD nom VARCHAR(255) DEFAULT NULL, ADD prenom VARCHAR(255) DEFAULT NULL, ADD classe VARCHAR(255) DEFAULT NULL, ADD date_naissance DATE DEFAULT NULL, ADD email_etudiant VARCHAR(255) DEFAULT NULL, ADD nom_responsable VARCHAR(255) DEFAULT NULL, ADD adresse_responsable LONGTEXT DEFAULT NULL, ADD type_paiement VARCHAR(100) DEFAULT NULL, ADD autorisation_droit_image TINYINT(1) DEFAULT NULL, ADD photo_individuelle VARCHAR(255) DEFAULT NULL, ADD statut VARCHAR(50) DEFAULT NULL, ADD date_creation DATETIME DEFAULT NULL, ADD date_soumission DATETIME DEFAULT NULL, CHANGE montant_adhesion montant_adhesion INT DEFAULT NULL, CHANGE mode_reglement mode_reglement VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE adhesion_mdl ADD CONSTRAINT FK_894EAC6CFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_894EAC6CFB88E14F ON adhesion_mdl (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adhesion_mdl DROP FOREIGN KEY FK_894EAC6CFB88E14F');
        $this->addSql('DROP INDEX IDX_894EAC6CFB88E14F ON adhesion_mdl');
        $this->addSql('ALTER TABLE adhesion_mdl DROP utilisateur_id, DROP nom, DROP prenom, DROP classe, DROP date_naissance, DROP email_etudiant, DROP nom_responsable, DROP adresse_responsable, DROP type_paiement, DROP autorisation_droit_image, DROP photo_individuelle, DROP statut, DROP date_creation, DROP date_soumission, CHANGE montant_adhesion montant_adhesion INT NOT NULL, CHANGE mode_reglement mode_reglement VARCHAR(255) NOT NULL');
    }
}
