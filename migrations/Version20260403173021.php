<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260403173021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, auteur VARCHAR(100) NOT NULL, contenu LONGTEXT NOT NULL, date_creation DATETIME NOT NULL, cours_slug VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY fk_avis_quiz');
        $this->addSql('DROP TABLE avis');
        $this->addSql('ALTER TABLE cours CHANGE nom_cours nom_cours VARCHAR(150) DEFAULT NULL, CHANGE contenu contenu VARCHAR(255) DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE date_creation date_creation DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE quiz DROP FOREIGN KEY quiz_ibfk_1');
        $this->addSql('ALTER TABLE quiz CHANGE titre titre VARCHAR(255) DEFAULT NULL, CHANGE liste_reponse liste_reponse LONGTEXT DEFAULT NULL, CHANGE reponse_correct reponse_correct VARCHAR(255) DEFAULT NULL, CHANGE date_creation date_creation DATE DEFAULT NULL, CHANGE is_exam_mode is_exam_mode TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE quiz ADD CONSTRAINT FK_A412FA92134FCDAC FOREIGN KEY (id_cours) REFERENCES cours (id_cours)');
        $this->addSql('ALTER TABLE quiz RENAME INDEX id_cours TO IDX_A412FA92134FCDAC');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id_avis INT AUTO_INCREMENT NOT NULL, id_quiz INT NOT NULL, commentaire VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, note INT DEFAULT NULL, date_creation DATE DEFAULT \'NULL\', INDEX fk_avis_quiz (id_quiz), PRIMARY KEY(id_avis)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT fk_avis_quiz FOREIGN KEY (id_quiz) REFERENCES quiz (id_quiz) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE cours CHANGE nom_cours nom_cours VARCHAR(150) DEFAULT \'NULL\', CHANGE contenu contenu VARCHAR(255) DEFAULT \'NULL\', CHANGE description description TEXT DEFAULT NULL, CHANGE date_creation date_creation DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE quiz DROP FOREIGN KEY FK_A412FA92134FCDAC');
        $this->addSql('ALTER TABLE quiz CHANGE titre titre VARCHAR(150) DEFAULT \'NULL\', CHANGE liste_reponse liste_reponse TEXT DEFAULT NULL, CHANGE reponse_correct reponse_correct VARCHAR(255) DEFAULT \'NULL\', CHANGE date_creation date_creation DATE DEFAULT \'NULL\', CHANGE is_exam_mode is_exam_mode TINYINT(1) DEFAULT 0');
        $this->addSql('ALTER TABLE quiz ADD CONSTRAINT quiz_ibfk_1 FOREIGN KEY (id_cours) REFERENCES cours (id_cours) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quiz RENAME INDEX idx_a412fa92134fcdac TO id_cours');
    }
}
