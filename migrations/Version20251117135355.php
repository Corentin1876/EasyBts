<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251117135355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formulaire_inscription ADD carte_identite_recto VARCHAR(255) DEFAULT NULL, ADD carte_identite_verso VARCHAR(255) DEFAULT NULL, ADD justificatif_domicile VARCHAR(255) DEFAULT NULL, ADD releves_notes VARCHAR(255) DEFAULT NULL, DROP message_rejet');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formulaire_inscription ADD message_rejet LONGTEXT DEFAULT NULL, DROP carte_identite_recto, DROP carte_identite_verso, DROP justificatif_domicile, DROP releves_notes');
    }
}
