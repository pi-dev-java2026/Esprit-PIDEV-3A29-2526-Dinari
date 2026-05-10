<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260412120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création de la table avis/testimonials pour les avis clients';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE avis (
            id INT AUTO_INCREMENT NOT NULL,
            paiement_id INT DEFAULT NULL,
            abonnement_id INT DEFAULT NULL,
            nom_client VARCHAR(100) NOT NULL,
            email_client VARCHAR(100) DEFAULT NULL,
            commentaire LONGTEXT NOT NULL,
            note INT NOT NULL DEFAULT 5,
            date_cretion DATETIME NOT NULL,
            approuve TINYINT(1) NOT NULL DEFAULT 0,
            couleur_avatar VARCHAR(20) DEFAULT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            INDEX IDX_A78E6C4DB1E85FB0 (paiement_id),
            INDEX IDX_A78E6C4DF1D74413 (abonnement_id),
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');

        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_A78E6C4DB1E85FB0 FOREIGN KEY (paiement_id) REFERENCES paiement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_A78E6C4DF1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_A78E6C4DB1E85FB0');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_A78E6C4DF1D74413');
        $this->addSql('DROP TABLE avis');
    }
}
