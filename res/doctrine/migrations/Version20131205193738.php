<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131205193738 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE accounts ADD current_player_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE accounts ADD CONSTRAINT FK_CAC89EAC42C04473 FOREIGN KEY (current_player_id) REFERENCES players (id) ON DELETE SET NULL");
        $this->addSql("CREATE UNIQUE INDEX UNIQ_CAC89EAC42C04473 ON accounts (current_player_id)");
        $this->addSql("CREATE UNIQUE INDEX UNIQ_264E43A65E237E06 ON players (name)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE accounts DROP FOREIGN KEY FK_CAC89EAC42C04473");
        $this->addSql("DROP INDEX UNIQ_CAC89EAC42C04473 ON accounts");
        $this->addSql("ALTER TABLE accounts DROP current_player_id");
        $this->addSql("DROP INDEX UNIQ_264E43A65E237E06 ON players");
    }
}
