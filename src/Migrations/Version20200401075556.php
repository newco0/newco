<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200401075556 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE admin_response (id INT AUTO_INCREMENT NOT NULL, contact_id INT NOT NULL, admin_id INT NOT NULL, message VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, is_read TINYINT(1) NOT NULL, date_register DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, date_update DATETIME DEFAULT NULL, date_delete DATETIME DEFAULT NULL, INDEX IDX_AADB0CFDE7A1254A (contact_id), INDEX IDX_AADB0CFD642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin_response ADD CONSTRAINT FK_AADB0CFDE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE admin_response ADD CONSTRAINT FK_AADB0CFD642B8210 FOREIGN KEY (admin_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE comments CHANGE date_register date_register DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE contact CHANGE user_id user_id INT DEFAULT NULL, CHANGE date_register date_register DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE discussion CHANGE date_register date_register DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE discussion_history CHANGE date_register date_register DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE friend CHANGE date_register date_register DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE image CHANGE date_register date_register DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE interaction CHANGE date_register date_register DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE publication CHANGE is_active is_active TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE date_register date_register DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE is_active is_active TINYINT(1) DEFAULT \'1\' NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE admin_response');
        $this->addSql('ALTER TABLE comments CHANGE date_register date_register DATETIME NOT NULL, CHANGE date_update date_update DATETIME NOT NULL, CHANGE date_delete date_delete DATETIME NOT NULL');
        $this->addSql('ALTER TABLE contact CHANGE user_id user_id INT NOT NULL, CHANGE date_register date_register DATE NOT NULL, CHANGE date_update date_update DATE NOT NULL, CHANGE date_delete date_delete DATE NOT NULL');
        $this->addSql('ALTER TABLE discussion CHANGE date_register date_register DATE NOT NULL, CHANGE date_update date_update DATE NOT NULL, CHANGE date_delete date_delete DATE NOT NULL');
        $this->addSql('ALTER TABLE discussion_history CHANGE date_register date_register DATE NOT NULL, CHANGE date_update date_update DATE NOT NULL, CHANGE date_delete date_delete DATE NOT NULL');
        $this->addSql('ALTER TABLE friend CHANGE date_register date_register DATETIME NOT NULL, CHANGE date_update date_update DATETIME NOT NULL, CHANGE date_delete date_delete DATETIME NOT NULL');
        $this->addSql('ALTER TABLE image CHANGE date_register date_register DATE NOT NULL, CHANGE date_update date_update DATE NOT NULL, CHANGE date_delete date_delete DATE NOT NULL');
        $this->addSql('ALTER TABLE interaction CHANGE date_register date_register DATETIME NOT NULL, CHANGE date_update date_update DATETIME NOT NULL, CHANGE date_delete date_delete DATETIME NOT NULL');
        $this->addSql('ALTER TABLE publication CHANGE is_active is_active TINYINT(1) NOT NULL, CHANGE date_register date_register DATETIME NOT NULL, CHANGE date_update date_update DATETIME NOT NULL, CHANGE date_delete date_delete DATETIME NOT NULL');
        $this->addSql('ALTER TABLE users CHANGE is_active is_active TINYINT(1) NOT NULL');
    }
}
