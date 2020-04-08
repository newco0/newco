<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200405095826 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image CHANGE is_active is_active TINYINT(1) DEFAULT \'1\', CHANGE date_register date_register DATETIME DEFAULT CURRENT_TIMESTAMP, CHANGE date_update date_update DATETIME DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE publication CHANGE date_register date_register DATETIME DEFAULT CURRENT_TIMESTAMP, CHANGE date_update date_update DATETIME DEFAULT CURRENT_TIMESTAMP');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image CHANGE is_active is_active TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE date_register date_register DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE date_update date_update DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE publication CHANGE date_register date_register DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE date_update date_update DATETIME DEFAULT NULL');
    }
}
