<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200321095057 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE discussion DROP FOREIGN KEY FK_C0B9F90FF4519D17');
        $this->addSql('DROP INDEX IDX_C0B9F90FF4519D17 ON discussion');
        $this->addSql('ALTER TABLE discussion CHANGE id_exp_id exp_id INT NOT NULL');
        $this->addSql('ALTER TABLE discussion ADD CONSTRAINT FK_C0B9F90FD26628FA FOREIGN KEY (exp_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_C0B9F90FD26628FA ON discussion (exp_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE discussion DROP FOREIGN KEY FK_C0B9F90FD26628FA');
        $this->addSql('DROP INDEX IDX_C0B9F90FD26628FA ON discussion');
        $this->addSql('ALTER TABLE discussion CHANGE exp_id id_exp_id INT NOT NULL');
        $this->addSql('ALTER TABLE discussion ADD CONSTRAINT FK_C0B9F90FF4519D17 FOREIGN KEY (id_exp_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_C0B9F90FF4519D17 ON discussion (id_exp_id)');
    }
}
