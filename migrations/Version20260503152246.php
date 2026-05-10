<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260503152246 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Rename FK column justificatif_depense.id_depense → depense_id to follow Doctrine naming convention';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE justificatif_depense DROP FOREIGN KEY `FK_CA76ECC4EA983E27`');
        $this->addSql('DROP INDEX IDX_CA76ECC4EA983E27 ON justificatif_depense');
        $this->addSql('ALTER TABLE justificatif_depense CHANGE id_depense depense_id INT NOT NULL');
        $this->addSql('ALTER TABLE justificatif_depense ADD CONSTRAINT FK_CA76ECC441D81563 FOREIGN KEY (depense_id) REFERENCES depense (id_depense) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_CA76ECC441D81563 ON justificatif_depense (depense_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE justificatif_depense DROP FOREIGN KEY FK_CA76ECC441D81563');
        $this->addSql('DROP INDEX IDX_CA76ECC441D81563 ON justificatif_depense');
        $this->addSql('ALTER TABLE justificatif_depense CHANGE depense_id id_depense INT NOT NULL');
        $this->addSql('ALTER TABLE justificatif_depense ADD CONSTRAINT `FK_CA76ECC4EA983E27` FOREIGN KEY (id_depense) REFERENCES depense (id_depense) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_CA76ECC4EA983E27 ON justificatif_depense (id_depense)');
    }
}
