<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260404160543 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chapitre (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(200) NOT NULL, contenu LONGTEXT DEFAULT NULL, position INT NOT NULL, id_cours INT NOT NULL, INDEX IDX_8C62B025134FCDAC (id_cours), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE chapitre ADD CONSTRAINT FK_8C62B025134FCDAC FOREIGN KEY (id_cours) REFERENCES cours (id_cours) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire CHANGE cours_slug cours_slug VARCHAR(100) DEFAULT NULL, CHANGE chapitre chapitre VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE cours CHANGE nom_cours nom_cours VARCHAR(150) DEFAULT NULL, CHANGE contenu contenu VARCHAR(255) DEFAULT NULL, CHANGE date_creation date_creation DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE quiz CHANGE titre titre VARCHAR(255) DEFAULT NULL, CHANGE reponse_correct reponse_correct VARCHAR(255) DEFAULT NULL, CHANGE date_creation date_creation DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chapitre DROP FOREIGN KEY FK_8C62B025134FCDAC');
        $this->addSql('DROP TABLE chapitre');
        $this->addSql('ALTER TABLE commentaire CHANGE cours_slug cours_slug VARCHAR(100) DEFAULT \'NULL\', CHANGE chapitre chapitre VARCHAR(100) DEFAULT \'\'\'introduction\'\'\'');
        $this->addSql('ALTER TABLE cours CHANGE nom_cours nom_cours VARCHAR(150) DEFAULT \'NULL\', CHANGE contenu contenu VARCHAR(255) DEFAULT \'NULL\', CHANGE date_creation date_creation DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE quiz CHANGE titre titre VARCHAR(255) DEFAULT \'NULL\', CHANGE reponse_correct reponse_correct VARCHAR(255) DEFAULT \'NULL\', CHANGE date_creation date_creation DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE quiz RENAME INDEX idx_a412fa92134fcdac TO FK_A412FA92134FCDAC');
        $this->addSql('ALTER TABLE reaction RENAME INDEX idx_a4d707f7ba9cd190 TO IDX_reaction_commentaire');
    }
}
