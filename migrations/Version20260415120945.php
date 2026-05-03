<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260415120945 extends AbstractMigration{
    public function getDescription(): string
    {
        return 'Ajout des tables tentative_paiement et alerte_fraude';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE tentative_paiement (
            id INT AUTO_INCREMENT NOT NULL,
            client_id INT NOT NULL,
            client_email VARCHAR(100) NOT NULL,
            client_nom VARCHAR(100) NOT NULL,
            ip_adresse VARCHAR(45) NOT NULL,
            score_risque INT DEFAULT 0 NOT NULL,
            statut VARCHAR(20) NOT NULL,
            created_at DATETIME NOT NULL,
            abonnement_id INT NOT NULL,
            INDEX IDX_315BA1E2F1D74413 (abonnement_id),
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4');

        $this->addSql('CREATE TABLE alerte_fraude (
            id INT AUTO_INCREMENT NOT NULL,
            client_id INT NOT NULL,
            client_email VARCHAR(100) NOT NULL,
            client_nom VARCHAR(100) NOT NULL,
            raison VARCHAR(50) NOT NULL,
            severite VARCHAR(20) NOT NULL,
            statut VARCHAR(20) NOT NULL,
            note_admin LONGTEXT DEFAULT NULL,
            resolved_at DATETIME DEFAULT NULL,
            created_at DATETIME NOT NULL,
            tentative_id INT NOT NULL,
            INDEX IDX_72F9F016D78CE477 (tentative_id),
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4');

        $this->addSql('ALTER TABLE tentative_paiement ADD CONSTRAINT FK_315BA1E2F1D74413 
            FOREIGN KEY (abonnement_id) REFERENCES abonnement (id)');

        $this->addSql('ALTER TABLE alerte_fraude ADD CONSTRAINT FK_72F9F016D78CE477 
            FOREIGN KEY (tentative_id) REFERENCES tentative_paiement (id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE alerte_fraude DROP FOREIGN KEY FK_72F9F016D78CE477');
        $this->addSql('ALTER TABLE tentative_paiement DROP FOREIGN KEY FK_315BA1E2F1D74413');
        $this->addSql('DROP TABLE alerte_fraude');
        $this->addSql('DROP TABLE tentative_paiement');
    }
}