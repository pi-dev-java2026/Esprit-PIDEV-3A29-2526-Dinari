<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260404132000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add image field to abonnement table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE abonnement ADD COLUMN image VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE abonnement DROP COLUMN image');
    }
}
