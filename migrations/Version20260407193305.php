<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260407193305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY avis_ibfk_1');
        $this->addSql('ALTER TABLE quiz_symfony DROP FOREIGN KEY fk_quiz_symfony_cours');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE cours_symfony');
        $this->addSql('DROP TABLE quiz_symfony');
        $this->addSql('ALTER TABLE chapitre DROP FOREIGN KEY fk_chapitre_cours_symfony');
        $this->addSql('ALTER TABLE chapitre CHANGE position position INT NOT NULL, CHANGE sous_titre sous_titre VARCHAR(255) DEFAULT NULL, CHANGE intro intro LONGTEXT DEFAULT NULL, CHANGE contenu_principal contenu_principal LONGTEXT DEFAULT NULL, CHANGE a_retenir a_retenir LONGTEXT DEFAULT NULL, CHANGE video_url video_url VARCHAR(500) DEFAULT NULL, CHANGE image_url image_url VARCHAR(500) DEFAULT NULL, CHANGE image_titre image_titre VARCHAR(255) DEFAULT NULL, CHANGE image_description image_description VARCHAR(500) DEFAULT NULL, CHANGE contenu contenu LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE chapitre ADD CONSTRAINT FK_8C62B025134FCDAC FOREIGN KEY (id_cours) REFERENCES cours (id_cours) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chapitre RENAME INDEX fk_chapitre_cours_symfony TO IDX_8C62B025134FCDAC');
        $this->addSql('ALTER TABLE chapitre_question CHANGE question question LONGTEXT NOT NULL, CHANGE choix_c choix_c VARCHAR(300) DEFAULT NULL, CHANGE choix_d choix_d VARCHAR(300) DEFAULT NULL, CHANGE bonne_reponse bonne_reponse VARCHAR(1) NOT NULL, CHANGE position position INT NOT NULL');
        $this->addSql('ALTER TABLE chapitre_question RENAME INDEX fk_chapitre_question_chapitre TO IDX_F3FC940ADCB95CB0');
        $this->addSql('ALTER TABLE chapitre_tache CHANGE description description LONGTEXT DEFAULT NULL, CHANGE position position INT NOT NULL');
        $this->addSql('ALTER TABLE chapitre_tache RENAME INDEX fk_chapitre_tache_chapitre TO IDX_27198D14DCB95CB0');
        $this->addSql('ALTER TABLE commentaire CHANGE contenu contenu LONGTEXT NOT NULL, CHANGE cours_slug cours_slug VARCHAR(100) DEFAULT NULL, CHANGE chapitre chapitre VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE cours ADD contenu VARCHAR(255) DEFAULT NULL, CHANGE nom_cours nom_cours VARCHAR(150) DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE date_creation date_creation DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE quiz ADD liste_reponse LONGTEXT DEFAULT NULL, DROP question, DROP liste_reponses, CHANGE id_cours id_cours INT DEFAULT NULL, CHANGE titre titre VARCHAR(255) DEFAULT NULL, CHANGE reponse_correct reponse_correct VARCHAR(255) DEFAULT NULL, CHANGE date_creation date_creation DATE DEFAULT NULL, CHANGE is_exam_mode is_exam_mode TINYINT(1) DEFAULT NULL, CHANGE time_limit time_limit INT DEFAULT NULL, CHANGE score score_quiz INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quiz RENAME INDEX id_cours TO IDX_A412FA92134FCDAC');
        $this->addSql('ALTER TABLE reaction CHANGE commentaire_id commentaire_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id_avis INT AUTO_INCREMENT NOT NULL, id_quiz INT NOT NULL, commentaire TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, note INT DEFAULT NULL, date_creation DATE DEFAULT \'NULL\', INDEX id_quiz (id_quiz), PRIMARY KEY(id_avis)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cours_symfony (id_cours INT AUTO_INCREMENT NOT NULL, nom_cours VARCHAR(150) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, contenu VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, date_creation DATE DEFAULT \'NULL\', PRIMARY KEY(id_cours)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE quiz_symfony (id_quiz INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, liste_reponse TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, reponse_correct VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, score_quiz INT DEFAULT NULL, date_creation DATE DEFAULT \'NULL\', is_exam_mode TINYINT(1) DEFAULT NULL, time_limit INT DEFAULT NULL, id_cours INT DEFAULT NULL, INDEX fk_quiz_symfony_cours (id_cours), PRIMARY KEY(id_quiz)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT avis_ibfk_1 FOREIGN KEY (id_quiz) REFERENCES quiz (id_quiz)');
        $this->addSql('ALTER TABLE quiz_symfony ADD CONSTRAINT fk_quiz_symfony_cours FOREIGN KEY (id_cours) REFERENCES cours_symfony (id_cours) ON DELETE SET NULL');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE chapitre DROP FOREIGN KEY FK_8C62B025134FCDAC');
        $this->addSql('ALTER TABLE chapitre CHANGE position position INT DEFAULT 0 NOT NULL, CHANGE sous_titre sous_titre VARCHAR(255) DEFAULT \'NULL\', CHANGE intro intro TEXT DEFAULT NULL, CHANGE contenu_principal contenu_principal TEXT DEFAULT NULL, CHANGE a_retenir a_retenir TEXT DEFAULT NULL, CHANGE video_url video_url VARCHAR(500) DEFAULT \'NULL\', CHANGE image_url image_url VARCHAR(500) DEFAULT \'NULL\', CHANGE image_titre image_titre VARCHAR(255) DEFAULT \'NULL\', CHANGE image_description image_description VARCHAR(500) DEFAULT \'NULL\', CHANGE contenu contenu TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE chapitre ADD CONSTRAINT fk_chapitre_cours_symfony FOREIGN KEY (id_cours) REFERENCES cours_symfony (id_cours) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chapitre RENAME INDEX idx_8c62b025134fcdac TO fk_chapitre_cours_symfony');
        $this->addSql('ALTER TABLE chapitre_question CHANGE question question TEXT NOT NULL, CHANGE choix_c choix_c VARCHAR(300) DEFAULT \'NULL\', CHANGE choix_d choix_d VARCHAR(300) DEFAULT \'NULL\', CHANGE bonne_reponse bonne_reponse VARCHAR(1) DEFAULT \'\'\'a\'\'\' NOT NULL, CHANGE position position INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE chapitre_question RENAME INDEX idx_f3fc940adcb95cb0 TO fk_chapitre_question_chapitre');
        $this->addSql('ALTER TABLE chapitre_tache CHANGE description description TEXT DEFAULT NULL, CHANGE position position INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE chapitre_tache RENAME INDEX idx_27198d14dcb95cb0 TO fk_chapitre_tache_chapitre');
        $this->addSql('ALTER TABLE commentaire CHANGE contenu contenu TEXT NOT NULL, CHANGE cours_slug cours_slug VARCHAR(100) DEFAULT \'NULL\', CHANGE chapitre chapitre VARCHAR(100) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE cours DROP contenu, CHANGE nom_cours nom_cours VARCHAR(255) NOT NULL, CHANGE description description TEXT DEFAULT NULL, CHANGE date_creation date_creation DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE quiz ADD question TEXT DEFAULT NULL, ADD liste_reponses TEXT DEFAULT NULL, DROP liste_reponse, CHANGE titre titre VARCHAR(255) NOT NULL, CHANGE reponse_correct reponse_correct VARCHAR(255) DEFAULT \'NULL\', CHANGE date_creation date_creation DATE DEFAULT \'NULL\', CHANGE is_exam_mode is_exam_mode TINYINT(1) DEFAULT 0, CHANGE time_limit time_limit INT DEFAULT 0, CHANGE id_cours id_cours INT NOT NULL, CHANGE score_quiz score INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quiz RENAME INDEX idx_a412fa92134fcdac TO id_cours');
        $this->addSql('ALTER TABLE reaction CHANGE commentaire_id commentaire_id INT NOT NULL');
    }
}
