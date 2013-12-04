<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131204230858 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE accounts DROP FOREIGN KEY FK_CAC89EAC41DEE7B9");
        $this->addSql("ALTER TABLE accounts ADD CONSTRAINT FK_CAC89EAC41DEE7B9 FOREIGN KEY (token_id) REFERENCES tokens (id) ON DELETE SET NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE accounts DROP FOREIGN KEY FK_CAC89EAC41DEE7B9");
        $this->addSql("ALTER TABLE accounts ADD CONSTRAINT FK_CAC89EAC41DEE7B9 FOREIGN KEY (token_id) REFERENCES tokens (id)");
    }
}
