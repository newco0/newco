<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200406183319 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, sender_id INT DEFAULT NULL, is_active TINYINT(1) NOT NULL, is_seen TINYINT(1) NOT NULL, type SMALLINT NOT NULL, date_register DATETIME NOT NULL, date_update DATETIME NOT NULL, INDEX IDX_BF5476CAA76ED395 (user_id), INDEX IDX_BF5476CAF624B39D (sender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAF624B39D FOREIGN KEY (sender_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE contact CHANGE date_update date_update DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE discussion CHANGE date_update date_update DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE discussion_history DROP text, CHANGE date_update date_update DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE friend ADD friend_id INT NOT NULL, ADD is_accepted TINYINT(1) DEFAULT NULL, ADD is_seen TINYINT(1) DEFAULT \'0\', DROP is_friend, CHANGE date_update date_update DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE friend ADD CONSTRAINT FK_55EEAC616A5458E8 FOREIGN KEY (friend_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_55EEAC616A5458E8 ON friend (friend_id)');
        $this->addSql('ALTER TABLE image CHANGE is_active is_active TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE date_register date_register DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE date_update date_update DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE interaction CHANGE date_update date_update DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE publication CHANGE is_active is_active TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE date_register date_register DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE date_update date_update DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE notification');
        $this->addSql('ALTER TABLE contact CHANGE date_update date_update DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE discussion CHANGE date_update date_update DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE discussion_history ADD text VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_update date_update DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE friend DROP FOREIGN KEY FK_55EEAC616A5458E8');
        $this->addSql('DROP INDEX IDX_55EEAC616A5458E8 ON friend');
        $this->addSql('ALTER TABLE friend ADD is_friend TINYINT(1) NOT NULL, DROP friend_id, DROP is_accepted, DROP is_seen, CHANGE date_update date_update DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE image CHANGE is_active is_active TINYINT(1) DEFAULT \'1\', CHANGE date_register date_register DATETIME DEFAULT CURRENT_TIMESTAMP, CHANGE date_update date_update DATETIME DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE interaction CHANGE date_update date_update DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE publication CHANGE is_active is_active TINYINT(1) DEFAULT \'1\', CHANGE date_register date_register DATETIME DEFAULT CURRENT_TIMESTAMP, CHANGE date_update date_update DATETIME DEFAULT CURRENT_TIMESTAMP');
    }
}
