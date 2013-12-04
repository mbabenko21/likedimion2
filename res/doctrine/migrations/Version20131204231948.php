<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131204231948 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE tokens ADD account_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE tokens ADD CONSTRAINT FK_AA5A118E9B6B5FBA FOREIGN KEY (account_id) REFERENCES accounts (id) ON DELETE CASCADE");
        $this->addSql("CREATE UNIQUE INDEX UNIQ_AA5A118E9B6B5FBA ON tokens (account_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE tokens DROP FOREIGN KEY FK_AA5A118E9B6B5FBA");
        $this->addSql("DROP INDEX UNIQ_AA5A118E9B6B5FBA ON tokens");
        $this->addSql("ALTER TABLE tokens DROP account_id");
    }
}
