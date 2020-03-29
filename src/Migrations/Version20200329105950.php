<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200329105950 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE admin_response CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE comments CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE contact CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE discussion CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE discussion_history CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE friend CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE image CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE interaction CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE publication CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE admin_response CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE comments CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE contact CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE discussion CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE discussion_history CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE friend CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE image CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE interaction CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE publication CHANGE date_update date_update DATE DEFAULT NULL, CHANGE date_delete date_delete DATE DEFAULT NULL');
    }
}
