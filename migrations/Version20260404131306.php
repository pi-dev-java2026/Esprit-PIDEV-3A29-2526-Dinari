<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260404131306 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajout promotions et nouveaux champs abonnement';
    }

    public function up(Schema $schema): void
{
    $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(30) NOT NULL, label VARCHAR(100) NOT NULL, reduction_pct INT NOT NULL, conditions LONGTEXT DEFAULT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, actif TINYINT(1) DEFAULT 1 NOT NULL, created_at DATETIME NOT NULL, abonnement_id INT NOT NULL, INDEX IDX_C11D7DD1F1D74413 (abonnement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
    $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1F1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id) ON DELETE CASCADE');
    $this->addSql('ALTER TABLE abonnement ADD prix_marche NUMERIC(10, 2) DEFAULT NULL, ADD prix_dinari NUMERIC(10, 2) DEFAULT NULL, ADD essai_gratuit INT DEFAULT 0 NOT NULL, ADD badge VARCHAR(50) DEFAULT NULL, ADD mis_en_avant TINYINT(1) DEFAULT 0 NOT NULL, ADD date_fin_offre DATE DEFAULT NULL, ADD description LONGTEXT DEFAULT NULL, CHANGE date_debut date_debut DATE DEFAULT NULL, CHANGE categorie categorie VARCHAR(50) DEFAULT NULL, CHANGE image_path image_path VARCHAR(255) DEFAULT NULL, CHANGE tier tier VARCHAR(20) DEFAULT \'Normal\' NOT NULL, CHANGE google_calendar_event_id google_calendar_event_id VARCHAR(255) DEFAULT NULL');
    $this->addSql('ALTER TABLE paiement CHANGE nom_titulaire nom_titulaire VARCHAR(100) DEFAULT NULL, CHANGE prenom_titulaire prenom_titulaire VARCHAR(100) DEFAULT NULL, CHANGE mode_paiement mode_paiement VARCHAR(50) DEFAULT NULL, CHANGE numero_carte numero_carte VARCHAR(20) DEFAULT NULL, CHANGE date_expiration date_expiration VARCHAR(10) DEFAULT NULL, CHANGE cvv cvv VARCHAR(5) DEFAULT NULL, CHANGE stripe_transaction_id stripe_transaction_id VARCHAR(100) DEFAULT NULL');
    $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    $this->addSql('ALTER TABLE paiement DROP FOREIGN KEY paiement_ibfk_1');
    $this->addSql('ALTER TABLE paiement DROP INDEX abonnement_id');
    $this->addSql('CREATE INDEX IDX_B1DC7A1EF1D74413 ON paiement (abonnement_id)');
    $this->addSql('ALTER TABLE paiement ADD CONSTRAINT paiement_ibfk_1 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id) ON DELETE CASCADE');
}

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1F1D74413');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('ALTER TABLE abonnement DROP prix_marche, DROP prix_dinari, DROP essai_gratuit, DROP badge, DROP mis_en_avant, DROP date_fin_offre, DROP description, CHANGE date_debut date_debut DATE DEFAULT NULL, CHANGE categorie categorie VARCHAR(50) DEFAULT NULL, CHANGE image_path image_path VARCHAR(255) DEFAULT NULL, CHANGE tier tier VARCHAR(20) DEFAULT \'Normal\' NOT NULL, CHANGE google_calendar_event_id google_calendar_event_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE paiement CHANGE nom_titulaire nom_titulaire VARCHAR(100) DEFAULT NULL, CHANGE prenom_titulaire prenom_titulaire VARCHAR(100) DEFAULT NULL, CHANGE mode_paiement mode_paiement VARCHAR(50) DEFAULT NULL, CHANGE numero_carte numero_carte VARCHAR(20) DEFAULT NULL, CHANGE date_expiration date_expiration VARCHAR(10) DEFAULT NULL, CHANGE cvv cvv VARCHAR(5) DEFAULT NULL, CHANGE stripe_transaction_id stripe_transaction_id VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');

        // Retour index original
        $this->addSql('ALTER TABLE paiement DROP INDEX IDX_B1DC7A1EF1D74413');
        $this->addSql('CREATE INDEX abonnement_id ON paiement (abonnement_id)');
    }
}