<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Rewritten to match the REAL database state at migration time.
 *
 * What was already done in the DB before this migration runs:
 *   - depense.id_depense already exists (PK, correct name)
 *   - depense FK constraints FK_34059757438F5B63 and FK_34059757BCF5E72D already applied
 *   - depense still has OLD index names: fk_depense_mode_paiement, fk_depense_categorie
 *   - justificatif_depense still has OLD columns: idJustificatif (PK), idDepense (FK)
 *   - justificatif_depense FK constraint is named DepenseFK, index named DepenseFK
 *   - mode_paiement unique index UNIQ_B2BB0E85EA750E8 does NOT exist yet
 *
 * What this migration does:
 *   1. Rename depense indexes to Doctrine-expected names (no FK add/drop needed)
 *   2. Rename justificatif_depense columns idJustificatif→id_justificatif,
 *      idDepense→id_depense (drop old FK first, re-add after rename)
 *   3. Create missing unique index on mode_paiement.label
 */
final class Version20260502221530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Rename legacy indexes on depense; rename idJustificatif/idDepense columns; add unique index on mode_paiement.label';
    }

    public function up(Schema $schema): void
    {
        // ── 1. depense: rename old plain indexes to Doctrine-expected names ──
        // The FK constraints (FK_34059757438F5B63, FK_34059757BCF5E72D) already
        // exist and already back these columns. We must drop the FK constraints
        // first so MariaDB allows us to drop the old indexes, then recreate the
        // FKs with the new index names.

        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_34059757438F5B63');
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_34059757BCF5E72D');

        $this->addSql('DROP INDEX fk_depense_mode_paiement ON depense');
        $this->addSql('DROP INDEX fk_depense_categorie ON depense');

        $this->addSql('CREATE INDEX IDX_34059757438F5B63 ON depense (mode_paiement_id)');
        $this->addSql('CREATE INDEX IDX_34059757BCF5E72D ON depense (categorie_id)');

        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_34059757438F5B63 FOREIGN KEY (mode_paiement_id) REFERENCES mode_paiement (id)');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_34059757BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');

        // ── 2. justificatif_depense: drop old FK, rename columns, re-add FK ──
        // Must drop the FK before renaming the column it references.

        $this->addSql('ALTER TABLE justificatif_depense DROP FOREIGN KEY `DepenseFK`');
        $this->addSql('DROP INDEX DepenseFK ON justificatif_depense');

        // Strip AUTO_INCREMENT before the CHANGE so MariaDB allows the rename
        // of the PK column without complaints.
        $this->addSql('ALTER TABLE justificatif_depense MODIFY idJustificatif INT NOT NULL');

        // Rename both columns in one ALTER statement and restore PK + AUTO_INCREMENT.
        $this->addSql('ALTER TABLE justificatif_depense
            CHANGE idJustificatif id_justificatif INT AUTO_INCREMENT NOT NULL,
            CHANGE idDepense      id_depense      INT NOT NULL,
            DROP PRIMARY KEY,
            ADD  PRIMARY KEY (id_justificatif)');

        // Re-add the FK constraint under the new Doctrine-expected name.
        $this->addSql('ALTER TABLE justificatif_depense ADD CONSTRAINT FK_CA76ECC4EA983E27 FOREIGN KEY (id_depense) REFERENCES depense (id_depense) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_CA76ECC4EA983E27 ON justificatif_depense (id_depense)');

        // ── 3. mode_paiement: tighten label column + add missing unique index ──
        $this->addSql('ALTER TABLE mode_paiement CHANGE label label VARCHAR(100) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B2BB0E85EA750E8 ON mode_paiement (label)');
    }

    public function down(Schema $schema): void
    {
        // ── 3. mode_paiement ──────────────────────────────────────────────────
        $this->addSql('DROP INDEX UNIQ_B2BB0E85EA750E8 ON mode_paiement');
        $this->addSql('ALTER TABLE mode_paiement CHANGE label label VARCHAR(250) NOT NULL');

        // ── 2. justificatif_depense: reverse column renames ───────────────────
        $this->addSql('ALTER TABLE justificatif_depense DROP FOREIGN KEY FK_CA76ECC4EA983E27');
        $this->addSql('DROP INDEX IDX_CA76ECC4EA983E27 ON justificatif_depense');

        $this->addSql('ALTER TABLE justificatif_depense MODIFY id_justificatif INT NOT NULL');

        $this->addSql('ALTER TABLE justificatif_depense
            CHANGE id_justificatif idJustificatif INT AUTO_INCREMENT NOT NULL,
            CHANGE id_depense      idDepense      INT NOT NULL,
            DROP PRIMARY KEY,
            ADD  PRIMARY KEY (idJustificatif)');

        $this->addSql('ALTER TABLE justificatif_depense ADD CONSTRAINT `DepenseFK` FOREIGN KEY (idDepense) REFERENCES depense (id_depense) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX DepenseFK ON justificatif_depense (idDepense)');

        // ── 1. depense: restore old index names ───────────────────────────────
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_34059757438F5B63');
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_34059757BCF5E72D');

        $this->addSql('DROP INDEX IDX_34059757438F5B63 ON depense');
        $this->addSql('DROP INDEX IDX_34059757BCF5E72D ON depense');

        $this->addSql('CREATE INDEX fk_depense_mode_paiement ON depense (mode_paiement_id)');
        $this->addSql('CREATE INDEX fk_depense_categorie ON depense (categorie_id)');

        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_34059757438F5B63 FOREIGN KEY (mode_paiement_id) REFERENCES mode_paiement (id)');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_34059757BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
    }
}
