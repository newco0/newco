<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200328122115 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comments CHANGE date_register date_register DATE NOT NULL, CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD date_delete DATE DEFAULT NULL, DROP datedelete, CHANGE date_update date_update DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE discussion CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE discussion_history CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE friend CHANGE date_register date_register DATE NOT NULL, CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE image CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE interaction CHANGE date_register date_register DATE NOT NULL, CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE publication CHANGE date_register date_register DATE NOT NULL, CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE date_register date_register DATE NOT NULL, CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comments CHANGE date_register date_register DATETIME NOT NULL, CHANGE date_update date_update DATETIME NOT NULL, CHANGE date_delete date_delete DATETIME NOT NULL');
        $this->addSql('ALTER TABLE contact ADD datedelete TINYINT(1) DEFAULT NULL, DROP date_delete, CHANGE date_update date_update DATE NOT NULL');
        $this->addSql('ALTER TABLE discussion CHANGE date_update date_update DATE NOT NULL, CHANGE date_delete date_delete DATE NOT NULL');
        $this->addSql('ALTER TABLE discussion_history CHANGE date_update date_update DATE NOT NULL, CHANGE date_delete date_delete DATE NOT NULL');
        $this->addSql('ALTER TABLE friend CHANGE date_register date_register DATETIME NOT NULL, CHANGE date_update date_update DATETIME NOT NULL, CHANGE date_delete date_delete DATETIME NOT NULL');
        $this->addSql('ALTER TABLE image CHANGE date_update date_update DATE NOT NULL, CHANGE date_delete date_delete DATE NOT NULL');
        $this->addSql('ALTER TABLE interaction CHANGE date_register date_register DATETIME NOT NULL, CHANGE date_update date_update DATETIME NOT NULL, CHANGE date_delete date_delete DATETIME NOT NULL');
        $this->addSql('ALTER TABLE publication CHANGE date_register date_register DATETIME NOT NULL, CHANGE date_update date_update DATETIME NOT NULL, CHANGE date_delete date_delete DATETIME NOT NULL');
        $this->addSql('ALTER TABLE users CHANGE date_register date_register DATETIME NOT NULL, CHANGE date_update date_update DATETIME NOT NULL, CHANGE date_delete date_delete DATETIME NOT NULL');
    }
}
