<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260501151301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE chapitre CHANGE position position INT NOT NULL, CHANGE sous_titre sous_titre VARCHAR(255) DEFAULT NULL, CHANGE intro intro LONGTEXT DEFAULT NULL, CHANGE contenu_principal contenu_principal LONGTEXT DEFAULT NULL, CHANGE a_retenir a_retenir LONGTEXT DEFAULT NULL, CHANGE video_url video_url VARCHAR(500) DEFAULT NULL, CHANGE image_url image_url VARCHAR(500) DEFAULT NULL, CHANGE image_titre image_titre VARCHAR(255) DEFAULT NULL, CHANGE image_description image_description VARCHAR(500) DEFAULT NULL, CHANGE contenu contenu LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE chapitre RENAME INDEX idx_chapitre_cours TO IDX_8C62B0252E149425');
        $this->addSql('ALTER TABLE chapitre_question CHANGE question question LONGTEXT NOT NULL, CHANGE choix_c choix_c VARCHAR(300) DEFAULT NULL, CHANGE choix_d choix_d VARCHAR(300) DEFAULT NULL, CHANGE bonne_reponse bonne_reponse VARCHAR(1) NOT NULL, CHANGE position position INT NOT NULL');
        $this->addSql('ALTER TABLE chapitre_question RENAME INDEX idx_chapitre_question_chapitre TO IDX_F3FC940A7AC228C');
        $this->addSql('ALTER TABLE chapitre_tache CHANGE description description LONGTEXT DEFAULT NULL, CHANGE position position INT NOT NULL');
        $this->addSql('ALTER TABLE chapitre_tache RENAME INDEX idx_chapitre_tache_chapitre TO IDX_27198D147AC228C');
        $this->addSql('ALTER TABLE commentaire CHANGE contenu contenu LONGTEXT NOT NULL, CHANGE cours_slug cours_slug VARCHAR(100) DEFAULT NULL, CHANGE chapitre chapitre VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE cours_symfony CHANGE nom_cours nom_cours VARCHAR(150) DEFAULT NULL, CHANGE contenu contenu VARCHAR(255) DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE date_creation date_creation DATE DEFAULT NULL, CHANGE niveau niveau VARCHAR(20) DEFAULT NULL, CHANGE theme theme VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE notification CHANGE message message LONGTEXT NOT NULL, CHANGE is_read is_read TINYINT(1) NOT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE quiz_resultat CHANGE score_obtenu score_obtenu INT NOT NULL, CHANGE score_max score_max INT NOT NULL, CHANGE niveau_utilisateur niveau_utilisateur VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE quiz_resultat RENAME INDEX idx_quiz_resultat_quiz TO IDX_311FA4A75BA17805');
        $this->addSql('ALTER TABLE quiz_symfony DROP FOREIGN KEY fk_quiz_cours');
        $this->addSql('ALTER TABLE quiz_symfony CHANGE titre titre VARCHAR(255) DEFAULT NULL, CHANGE liste_reponse liste_reponse LONGTEXT DEFAULT NULL, CHANGE reponse_correct reponse_correct VARCHAR(255) DEFAULT NULL, CHANGE date_creation date_creation DATE DEFAULT NULL, CHANGE theme theme VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE quiz_symfony ADD CONSTRAINT FK_9058FCEE2E149425 FOREIGN KEY (id_cours_id) REFERENCES cours_symfony (id_cours)');
        $this->addSql('ALTER TABLE quiz_symfony RENAME INDEX idx_quiz_cours TO IDX_9058FCEE2E149425');
        $this->addSql('ALTER TABLE reaction RENAME INDEX idx_reaction_commentaire TO IDX_A4D707F7BA9CD190');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE chapitre CHANGE position position INT DEFAULT 0 NOT NULL, CHANGE sous_titre sous_titre VARCHAR(255) DEFAULT \'NULL\', CHANGE intro intro TEXT DEFAULT NULL, CHANGE contenu_principal contenu_principal TEXT DEFAULT NULL, CHANGE a_retenir a_retenir TEXT DEFAULT NULL, CHANGE video_url video_url VARCHAR(500) DEFAULT \'NULL\', CHANGE image_url image_url VARCHAR(500) DEFAULT \'NULL\', CHANGE image_titre image_titre VARCHAR(255) DEFAULT \'NULL\', CHANGE image_description image_description VARCHAR(500) DEFAULT \'NULL\', CHANGE contenu contenu TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE chapitre RENAME INDEX idx_8c62b0252e149425 TO idx_chapitre_cours');
        $this->addSql('ALTER TABLE chapitre_question CHANGE question question TEXT NOT NULL, CHANGE choix_c choix_c VARCHAR(300) DEFAULT \'NULL\', CHANGE choix_d choix_d VARCHAR(300) DEFAULT \'NULL\', CHANGE bonne_reponse bonne_reponse CHAR(1) NOT NULL, CHANGE position position INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE chapitre_question RENAME INDEX idx_f3fc940a7ac228c TO idx_chapitre_question_chapitre');
        $this->addSql('ALTER TABLE chapitre_tache CHANGE description description TEXT DEFAULT NULL, CHANGE position position INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE chapitre_tache RENAME INDEX idx_27198d147ac228c TO idx_chapitre_tache_chapitre');
        $this->addSql('ALTER TABLE commentaire CHANGE contenu contenu TEXT NOT NULL, CHANGE cours_slug cours_slug VARCHAR(100) DEFAULT \'NULL\', CHANGE chapitre chapitre VARCHAR(100) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE cours_symfony CHANGE nom_cours nom_cours VARCHAR(150) DEFAULT \'NULL\', CHANGE contenu contenu VARCHAR(255) DEFAULT \'NULL\', CHANGE description description TEXT DEFAULT NULL, CHANGE date_creation date_creation DATE DEFAULT \'NULL\', CHANGE niveau niveau VARCHAR(20) DEFAULT \'NULL\', CHANGE theme theme VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE notification CHANGE message message TEXT NOT NULL, CHANGE is_read is_read TINYINT(1) DEFAULT 0 NOT NULL, CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE quiz_resultat CHANGE score_obtenu score_obtenu INT DEFAULT 0 NOT NULL, CHANGE score_max score_max INT DEFAULT 100 NOT NULL, CHANGE niveau_utilisateur niveau_utilisateur VARCHAR(20) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE quiz_resultat RENAME INDEX idx_311fa4a75ba17805 TO idx_quiz_resultat_quiz');
        $this->addSql('ALTER TABLE quiz_symfony DROP FOREIGN KEY FK_9058FCEE2E149425');
        $this->addSql('ALTER TABLE quiz_symfony CHANGE titre titre VARCHAR(255) DEFAULT \'NULL\', CHANGE liste_reponse liste_reponse TEXT DEFAULT NULL, CHANGE reponse_correct reponse_correct VARCHAR(255) DEFAULT \'NULL\', CHANGE date_creation date_creation DATE DEFAULT \'NULL\', CHANGE theme theme VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE quiz_symfony ADD CONSTRAINT fk_quiz_cours FOREIGN KEY (id_cours_id) REFERENCES cours_symfony (id_cours) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE quiz_symfony RENAME INDEX idx_9058fcee2e149425 TO idx_quiz_cours');
        $this->addSql('ALTER TABLE reaction RENAME INDEX idx_a4d707f7ba9cd190 TO idx_reaction_commentaire');
    }
}
