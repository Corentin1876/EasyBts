<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250929095808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adhesion_mdl (id INT AUTO_INCREMENT NOT NULL, formulaire_inscription_id INT DEFAULT NULL, montant_adhesion INT NOT NULL, mode_reglement VARCHAR(255) NOT NULL, INDEX IDX_894EAC6CB6346BD2 (formulaire_inscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annee_scolaire (id INT AUTO_INCREMENT NOT NULL, information_eleve_id INT DEFAULT NULL, scolarite_des2_annee_anterieur_id INT DEFAULT NULL, date DATE NOT NULL, INDEX IDX_97150C2B8D7955C0 (information_eleve_id), INDEX IDX_97150C2B2B136C8D (scolarite_des2_annee_anterieur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE assurance_scolaire (id INT AUTO_INCREMENT NOT NULL, formulaire_inscription_id INT DEFAULT NULL, adresse VARCHAR(255) NOT NULL, numero INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_86134EAB6346BD2 (formulaire_inscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formulaire_inscription (id INT AUTO_INCREMENT NOT NULL, remplit_formulaire_id INT DEFAULT NULL, type_formulaire VARCHAR(255) NOT NULL, est_signe TINYINT(1) NOT NULL, date_soumission DATE NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_E5B1825CBC136CC1 (remplit_formulaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information_eleve (id INT AUTO_INCREMENT NOT NULL, niveau_classe VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, numero_securiter_social INT NOT NULL, date_entree DATE NOT NULL, nationalite VARCHAR(255) NOT NULL, naissance_departement VARCHAR(255) NOT NULL, naissance_commune VARCHAR(255) NOT NULL, redoublement TINYINT(1) NOT NULL, transport TINYINT(1) NOT NULL, type_transport VARCHAR(255) NOT NULL, numero_immatriculation_vehicule INT NOT NULL, specialiter VARCHAR(255) NOT NULL, langues VARCHAR(255) NOT NULL, dernier_diplome VARCHAR(255) NOT NULL, regime_choisi VARCHAR(255) NOT NULL, date_choix_regime DATE NOT NULL, autorisation_droit_image TINYINT(1) NOT NULL, posibilite_de_changement_fin_trimestre TINYINT(1) NOT NULL, acceptation_sms TINYINT(1) NOT NULL, autorisation_communication TINYINT(1) NOT NULL, est_majeur TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, sante_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_1BDA53C6C1683D7D (sante_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responsable (id INT AUTO_INCREMENT NOT NULL, formulaire_inscription_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, profession VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, tellephone VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, nom_employeur VARCHAR(255) NOT NULL, adresse_employeur VARCHAR(255) NOT NULL, lien_avec_eleve VARCHAR(255) NOT NULL, autorisation_communication TINYINT(1) NOT NULL, tell_domicile VARCHAR(255) NOT NULL, tell_travail VARCHAR(255) NOT NULL, tell_mobile VARCHAR(255) NOT NULL, acceptation_sms TINYINT(1) NOT NULL, INDEX IDX_52520D07B6346BD2 (formulaire_inscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sante (id INT AUTO_INCREMENT NOT NULL, formulaire_inscription_id INT DEFAULT NULL, date_dernier_rappel_vaccin_antitetanique DATE NOT NULL, observation_particuliere VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, tel_medecin_traitant VARCHAR(255) NOT NULL, INDEX IDX_CF08326BB6346BD2 (formulaire_inscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scolarite_des2_annee_anterieur (id INT AUTO_INCREMENT NOT NULL, formulaire_inscription_id INT DEFAULT NULL, classe VARCHAR(255) NOT NULL, langue_lv1 VARCHAR(255) NOT NULL, langue_lv2 VARCHAR(255) NOT NULL, option_matiere VARCHAR(255) NOT NULL, etablisement VARCHAR(255) NOT NULL, INDEX IDX_BB6E6E10B6346BD2 (formulaire_inscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE securite_sociale (id INT AUTO_INCREMENT NOT NULL, formulaire_inscription_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, INDEX IDX_BB68B740B6346BD2 (formulaire_inscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialisation (id INT AUTO_INCREMENT NOT NULL, information_eleve_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_B9D6A3A28D7955C0 (information_eleve_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_responsable (id INT AUTO_INCREMENT NOT NULL, responsable_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_194BDA9653C59D72 (responsable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, contient_information_eleve_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, date_creation DATE NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, user VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, adresse VARCHAR(255) NOT NULL, departement VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B369FE64AF (contient_information_eleve_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adhesion_mdl ADD CONSTRAINT FK_894EAC6CB6346BD2 FOREIGN KEY (formulaire_inscription_id) REFERENCES formulaire_inscription (id)');
        $this->addSql('ALTER TABLE annee_scolaire ADD CONSTRAINT FK_97150C2B8D7955C0 FOREIGN KEY (information_eleve_id) REFERENCES information_eleve (id)');
        $this->addSql('ALTER TABLE annee_scolaire ADD CONSTRAINT FK_97150C2B2B136C8D FOREIGN KEY (scolarite_des2_annee_anterieur_id) REFERENCES scolarite_des2_annee_anterieur (id)');
        $this->addSql('ALTER TABLE assurance_scolaire ADD CONSTRAINT FK_86134EAB6346BD2 FOREIGN KEY (formulaire_inscription_id) REFERENCES formulaire_inscription (id)');
        $this->addSql('ALTER TABLE formulaire_inscription ADD CONSTRAINT FK_E5B1825CBC136CC1 FOREIGN KEY (remplit_formulaire_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C6C1683D7D FOREIGN KEY (sante_id) REFERENCES sante (id)');
        $this->addSql('ALTER TABLE responsable ADD CONSTRAINT FK_52520D07B6346BD2 FOREIGN KEY (formulaire_inscription_id) REFERENCES formulaire_inscription (id)');
        $this->addSql('ALTER TABLE sante ADD CONSTRAINT FK_CF08326BB6346BD2 FOREIGN KEY (formulaire_inscription_id) REFERENCES formulaire_inscription (id)');
        $this->addSql('ALTER TABLE scolarite_des2_annee_anterieur ADD CONSTRAINT FK_BB6E6E10B6346BD2 FOREIGN KEY (formulaire_inscription_id) REFERENCES formulaire_inscription (id)');
        $this->addSql('ALTER TABLE securite_sociale ADD CONSTRAINT FK_BB68B740B6346BD2 FOREIGN KEY (formulaire_inscription_id) REFERENCES formulaire_inscription (id)');
        $this->addSql('ALTER TABLE specialisation ADD CONSTRAINT FK_B9D6A3A28D7955C0 FOREIGN KEY (information_eleve_id) REFERENCES information_eleve (id)');
        $this->addSql('ALTER TABLE type_responsable ADD CONSTRAINT FK_194BDA9653C59D72 FOREIGN KEY (responsable_id) REFERENCES responsable (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B369FE64AF FOREIGN KEY (contient_information_eleve_id) REFERENCES information_eleve (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adhesion_mdl DROP FOREIGN KEY FK_894EAC6CB6346BD2');
        $this->addSql('ALTER TABLE annee_scolaire DROP FOREIGN KEY FK_97150C2B8D7955C0');
        $this->addSql('ALTER TABLE annee_scolaire DROP FOREIGN KEY FK_97150C2B2B136C8D');
        $this->addSql('ALTER TABLE assurance_scolaire DROP FOREIGN KEY FK_86134EAB6346BD2');
        $this->addSql('ALTER TABLE formulaire_inscription DROP FOREIGN KEY FK_E5B1825CBC136CC1');
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C6C1683D7D');
        $this->addSql('ALTER TABLE responsable DROP FOREIGN KEY FK_52520D07B6346BD2');
        $this->addSql('ALTER TABLE sante DROP FOREIGN KEY FK_CF08326BB6346BD2');
        $this->addSql('ALTER TABLE scolarite_des2_annee_anterieur DROP FOREIGN KEY FK_BB6E6E10B6346BD2');
        $this->addSql('ALTER TABLE securite_sociale DROP FOREIGN KEY FK_BB68B740B6346BD2');
        $this->addSql('ALTER TABLE specialisation DROP FOREIGN KEY FK_B9D6A3A28D7955C0');
        $this->addSql('ALTER TABLE type_responsable DROP FOREIGN KEY FK_194BDA9653C59D72');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B369FE64AF');
        $this->addSql('DROP TABLE adhesion_mdl');
        $this->addSql('DROP TABLE annee_scolaire');
        $this->addSql('DROP TABLE assurance_scolaire');
        $this->addSql('DROP TABLE formulaire_inscription');
        $this->addSql('DROP TABLE information_eleve');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE responsable');
        $this->addSql('DROP TABLE sante');
        $this->addSql('DROP TABLE scolarite_des2_annee_anterieur');
        $this->addSql('DROP TABLE securite_sociale');
        $this->addSql('DROP TABLE specialisation');
        $this->addSql('DROP TABLE type_responsable');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
