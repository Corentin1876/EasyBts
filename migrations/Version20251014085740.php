<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251014085740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription_brouillon DROP FOREIGN KEY FK_169D1DF35627D44C');
        $this->addSql('ALTER TABLE inscription_brouillon DROP FOREIGN KEY FK_169D1DF3FB88E14F');
        $this->addSql('DROP TABLE inscription_brouillon');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscription_brouillon (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, specialisation_id INT NOT NULL, donnees_formulaire JSON NOT NULL COMMENT \'(DC2Type:json)\', etape_actuelle INT NOT NULL, date_creation DATETIME NOT NULL, date_modification DATETIME NOT NULL, INDEX IDX_169D1DF3FB88E14F (utilisateur_id), INDEX IDX_169D1DF35627D44C (specialisation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE inscription_brouillon ADD CONSTRAINT FK_169D1DF35627D44C FOREIGN KEY (specialisation_id) REFERENCES specialisation (id)');
        $this->addSql('ALTER TABLE inscription_brouillon ADD CONSTRAINT FK_169D1DF3FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
    }
}
