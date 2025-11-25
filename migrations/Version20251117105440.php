<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251117105440 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialisation ADD description LONGTEXT DEFAULT NULL, ADD duree VARCHAR(100) DEFAULT NULL, ADD niveau VARCHAR(100) DEFAULT NULL, ADD debouches LONGTEXT DEFAULT NULL, ADD conditions_admission LONGTEXT DEFAULT NULL, ADD libelle VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialisation DROP description, DROP duree, DROP niveau, DROP debouches, DROP conditions_admission, DROP libelle');
    }
}
