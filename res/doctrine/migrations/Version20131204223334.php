<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131204223334 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE accounts (id INT AUTO_INCREMENT NOT NULL, token_id INT DEFAULT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, create_date DATE NOT NULL, UNIQUE INDEX UNIQ_CAC89EAC41DEE7B9 (token_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE players (id INT AUTO_INCREMENT NOT NULL, account_id INT DEFAULT NULL, statistic_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, class INT NOT NULL, sex INT NOT NULL, create_date DATE NOT NULL, INDEX IDX_264E43A69B6B5FBA (account_id), UNIQUE INDEX UNIQ_264E43A653B6268F (statistic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE players_statistic (id INT NOT NULL, player_id INT DEFAULT NULL, pvp INT NOT NULL, pve INT NOT NULL, arena_pvp INT NOT NULL, UNIQUE INDEX UNIQ_FA247EAC99E6F5DF (player_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE premiums (id INT AUTO_INCREMENT NOT NULL, account_id INT DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, premium_type INT NOT NULL, INDEX IDX_865585B09B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE tokens (id INT AUTO_INCREMENT NOT NULL, value VARCHAR(255) NOT NULL, end_date DATE NOT NULL, start_date DATE NOT NULL, UNIQUE INDEX UNIQ_AA5A118E1D775834 (value), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE accounts ADD CONSTRAINT FK_CAC89EAC41DEE7B9 FOREIGN KEY (token_id) REFERENCES tokens (id)");
        $this->addSql("ALTER TABLE players ADD CONSTRAINT FK_264E43A69B6B5FBA FOREIGN KEY (account_id) REFERENCES accounts (id)");
        $this->addSql("ALTER TABLE players ADD CONSTRAINT FK_264E43A653B6268F FOREIGN KEY (statistic_id) REFERENCES players_statistic (id)");
        $this->addSql("ALTER TABLE players_statistic ADD CONSTRAINT FK_FA247EAC99E6F5DF FOREIGN KEY (player_id) REFERENCES players (id)");
        $this->addSql("ALTER TABLE premiums ADD CONSTRAINT FK_865585B09B6B5FBA FOREIGN KEY (account_id) REFERENCES accounts (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE players DROP FOREIGN KEY FK_264E43A69B6B5FBA");
        $this->addSql("ALTER TABLE premiums DROP FOREIGN KEY FK_865585B09B6B5FBA");
        $this->addSql("ALTER TABLE players_statistic DROP FOREIGN KEY FK_FA247EAC99E6F5DF");
        $this->addSql("ALTER TABLE players DROP FOREIGN KEY FK_264E43A653B6268F");
        $this->addSql("ALTER TABLE accounts DROP FOREIGN KEY FK_CAC89EAC41DEE7B9");
        $this->addSql("DROP TABLE accounts");
        $this->addSql("DROP TABLE players");
        $this->addSql("DROP TABLE players_statistic");
        $this->addSql("DROP TABLE premiums");
        $this->addSql("DROP TABLE tokens");
    }
}
