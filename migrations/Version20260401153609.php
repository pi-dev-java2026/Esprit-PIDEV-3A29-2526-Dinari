<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260401153609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reclamation MODIFY id_reclamation INT NOT NULL');
        $this->addSql('ALTER TABLE reclamation ADD idreclamation INT NOT NULL, DROP id_reclamation, DROP PRIMARY KEY, ADD PRIMARY KEY (idreclamation)');
        $this->addSql('ALTER TABLE user CHANGE id id INT NOT NULL, CHANGE reset_code reset_code VARCHAR(10) NOT NULL, CHANGE last_login last_login DATETIME NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reclamation ADD id_reclamation INT AUTO_INCREMENT NOT NULL, DROP idreclamation, DROP PRIMARY KEY, ADD PRIMARY KEY (id_reclamation)');
        $this->addSql('ALTER TABLE user CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE reset_code reset_code VARCHAR(10) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP');
    }
}
