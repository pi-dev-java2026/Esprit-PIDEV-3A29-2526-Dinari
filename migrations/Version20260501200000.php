<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Behavioral AI — Error Detection System
 *
 * Changes:
 *  1. user_concept_progress  — tracks per-concept correct/wrong counts per session
 *  2. chapitre_question.concept — concept keyword on chapter questions
 *  3. quiz_symfony.concept      — primary concept keyword on quizzes
 *  4. quiz_resultat.concept_answers — JSON per-concept breakdown per attempt
 */
final class Version20260501200000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Behavioral AI: user_concept_progress table + concept fields on quiz/question/resultat';
    }

    public function up(Schema $schema): void
    {
        // 1. Per-concept progress tracking table
        $this->addSql('
            CREATE TABLE user_concept_progress (
                id                   INT AUTO_INCREMENT NOT NULL,
                session_id           VARCHAR(128) NOT NULL,
                concept              VARCHAR(100) NOT NULL,
                correct_count        INT NOT NULL DEFAULT 0,
                wrong_count          INT NOT NULL DEFAULT 0,
                weak_quiz_streak     INT NOT NULL DEFAULT 0,
                level                VARCHAR(20) NOT NULL DEFAULT \'moderate\',
                is_repeated_weakness TINYINT(1) NOT NULL DEFAULT 0,
                last_updated         DATETIME NOT NULL,
                INDEX idx_ucp_session (session_id),
                INDEX idx_ucp_session_concept (session_id, concept),
                UNIQUE uniq_session_concept (session_id, concept),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4
        ');

        // 2. Concept field on chapter questions
        $this->addSql('ALTER TABLE chapitre_question ADD concept VARCHAR(100) DEFAULT NULL');

        // 3. Primary concept field on quizzes
        $this->addSql('ALTER TABLE quiz_symfony ADD concept VARCHAR(100) DEFAULT NULL');

        // 4. Per-concept answer breakdown on quiz results
        $this->addSql('ALTER TABLE quiz_resultat ADD concept_answers JSON DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE user_concept_progress');
        $this->addSql('ALTER TABLE chapitre_question DROP COLUMN concept');
        $this->addSql('ALTER TABLE quiz_symfony DROP COLUMN concept');
        $this->addSql('ALTER TABLE quiz_resultat DROP COLUMN concept_answers');
    }
}
