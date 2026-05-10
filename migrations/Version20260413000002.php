<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260413000002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add notification table for in-app notifications';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('
            CREATE TABLE notification (
                id         INT AUTO_INCREMENT NOT NULL,
                session_id VARCHAR(128) NOT NULL,
                message    LONGTEXT NOT NULL,
                type       VARCHAR(20) NOT NULL DEFAULT \'info\',
                is_read    TINYINT(1) NOT NULL DEFAULT 0,
                created_at DATETIME NOT NULL,
                INDEX idx_notif_session (session_id),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`
        ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE notification');
    }
}
