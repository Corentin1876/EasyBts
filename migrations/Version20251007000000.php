<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Suppression de la table contact (migration vers Messenger sans persistance locale).
 */
final class Version20251007000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Drop table contact (remplacée par un flux Messenger)';
    }

    public function up(Schema $schema): void
    {
        if ($schema->hasTable('contact')) {
            $this->addSql('DROP TABLE contact');
        }
    }

    public function down(Schema $schema): void
    {
        // Reconstruction minimale si rollback nécessaire
        if (!$schema->hasTable('contact')) {
            $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, civilite VARCHAR(10) NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, email VARCHAR(180) NOT NULL, telephone VARCHAR(20) DEFAULT NULL, sujet VARCHAR(50) NOT NULL, message LONGTEXT NOT NULL, consent TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT "(DC2Type:datetime_immutable)", status VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        }
    }
}