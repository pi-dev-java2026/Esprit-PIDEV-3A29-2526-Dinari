<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260503133940 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conversation CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE message CHANGE conversation_id conversation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamation CHANGE id_reclamation id_reclamation INT AUTO_INCREMENT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conversation CHANGE id id BINARY(16) NOT NULL');
        $this->addSql('ALTER TABLE message CHANGE conversation_id conversation_id BINARY(16) DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamation CHANGE id_reclamation id_reclamation BINARY(16) NOT NULL');
    }
}
