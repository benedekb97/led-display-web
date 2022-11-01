<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20221031214321 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, previous_id INT DEFAULT NULL, next_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, animation VARCHAR(255) NOT NULL, message VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_DB021E962DE62210 (previous_id), UNIQUE INDEX UNIQ_DB021E96AA23F6C8 (next_id), INDEX IDX_DB021E96B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E962DE62210 FOREIGN KEY (previous_id) REFERENCES messages (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E96AA23F6C8 FOREIGN KEY (next_id) REFERENCES messages (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E96B03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E962DE62210');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96AA23F6C8');
        $this->addSql('DROP TABLE messages');
    }
}
