<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260401153259 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE conversations CHANGE id id INT NOT NULL, CHANGE date_creation date_creation DATETIME NOT NULL');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY `messages_ibfk_1`');
        $this->addSql('ALTER TABLE messages CHANGE id id INT NOT NULL, CHANGE conversation_id conversation_id INT DEFAULT NULL, CHANGE sender sender VARCHAR(255) NOT NULL, CHANGE content content LONGTEXT NOT NULL, CHANGE date_message date_message DATETIME NOT NULL');
        $this->addSql('DROP INDEX conversation_id ON messages');
        $this->addSql('CREATE INDEX IDX_DB021E969AC0396 ON messages (conversation_id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (conversation_id) REFERENCES conversations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation MODIFY id-reclamation INT NOT NULL');
        $this->addSql('ALTER TABLE reclamation ADD idreclamation INT NOT NULL, DROP id-reclamation, DROP PRIMARY KEY, ADD PRIMARY KEY (idreclamation)');
        $this->addSql('ALTER TABLE user CHANGE id id INT NOT NULL, CHANGE reset_code reset_code VARCHAR(10) NOT NULL, CHANGE last_login last_login DATETIME NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE conversations CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE date_creation date_creation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E969AC0396');
        $this->addSql('ALTER TABLE messages CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE sender sender ENUM(\'USER\', \'BOT\') NOT NULL, CHANGE content content TEXT NOT NULL, CHANGE date_message date_message DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE conversation_id conversation_id INT NOT NULL');
        $this->addSql('DROP INDEX idx_db021e969ac0396 ON messages');
        $this->addSql('CREATE INDEX conversation_id ON messages (conversation_id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E969AC0396 FOREIGN KEY (conversation_id) REFERENCES conversations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation ADD id-reclamation INT AUTO_INCREMENT NOT NULL, DROP idreclamation, DROP PRIMARY KEY, ADD PRIMARY KEY (id-reclamation)');
        $this->addSql('ALTER TABLE user CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE reset_code reset_code VARCHAR(10) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP');
    }
}
