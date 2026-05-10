<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Adds recommendation system:
 *  - cours.niveau      (debutant|intermediaire|avance)
 *  - cours.theme       (comma-separated keywords)
 *  - quiz.theme        (comma-separated keywords)
 *  - quiz_resultat     (quiz attempt tracking per session)
 */
final class Version20260413000001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Recommendation system: niveau/theme on cours & quiz, quiz_resultat table';
    }

    public function up(Schema $schema): void
    {
        // Add niveau and theme to cours
        $this->addSql('ALTER TABLE cours ADD niveau VARCHAR(20) DEFAULT NULL, ADD theme VARCHAR(255) DEFAULT NULL');

        // Add theme to quiz
        $this->addSql('ALTER TABLE quiz ADD theme VARCHAR(255) DEFAULT NULL');

        // Create quiz_resultat table
        $this->addSql('
            CREATE TABLE quiz_resultat (
                id          INT AUTO_INCREMENT NOT NULL,
                id_quiz     INT NOT NULL,
                session_id  VARCHAR(128) NOT NULL,
                score_obtenu INT NOT NULL DEFAULT 0,
                score_max    INT NOT NULL DEFAULT 100,
                niveau_utilisateur VARCHAR(20) DEFAULT NULL,
                date_passage DATETIME NOT NULL,
                INDEX idx_qr_session (session_id),
                INDEX IDX_QR_QUIZ (id_quiz),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4
        ');

        $this->addSql('
            ALTER TABLE quiz_resultat
            ADD CONSTRAINT FK_QR_QUIZ
            FOREIGN KEY (id_quiz) REFERENCES quiz (id_quiz) ON DELETE CASCADE
        ');

        // Seed niveau and theme on existing courses based on their name/slug
        $this->addSql("
            UPDATE cours SET
                niveau = 'debutant',
                theme  = 'budget,depenses,finances'
            WHERE contenu = 'les-bases-du-budget'
        ");
        $this->addSql("
            UPDATE cours SET
                niveau = 'intermediaire',
                theme  = 'epargne,investissement,placement'
            WHERE contenu = 'epargne-investissement'
        ");
        $this->addSql("
            UPDATE cours SET
                niveau = 'intermediaire',
                theme  = 'banque,credit,taux,interet'
            WHERE contenu = 'comprendre-la-banque'
        ");

        // Seed theme on existing quizzes
        $this->addSql("
            UPDATE quiz SET theme = 'budget,depenses'
            WHERE titre LIKE '%budget%'
        ");
        $this->addSql("
            UPDATE quiz SET theme = 'epargne,investissement'
            WHERE titre LIKE '%pargne%' OR titre LIKE '%investissement%'
        ");
        $this->addSql("
            UPDATE quiz SET theme = 'banque,credit'
            WHERE titre LIKE '%banque%'
        ");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE quiz_resultat DROP FOREIGN KEY FK_QR_QUIZ');
        $this->addSql('DROP TABLE quiz_resultat');
        $this->addSql('ALTER TABLE cours DROP niveau, DROP theme');
        $this->addSql('ALTER TABLE quiz DROP theme');
    }
}
