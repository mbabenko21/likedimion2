<?php
use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Symfony\Component\Console\Helper\DialogHelper;

/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 30.11.13
 * Time: 22:40
 */

require __DIR__."/../index.php";

$cli = new \Symfony\Component\Console\Application('Likedimion CLI', \Likedimion\Game::getInstance()->getVersion());
$entityManager = \Likedimion\Game::getInstance()->getContainer()->get("entity_manager");

$helperSet = \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
$helperSet->set(new DialogHelper(), 'dialog');

$cli->setHelperSet($helperSet);

$cli->addCommands(array(
    //Migrations
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\DiffCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\ExecuteCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\GenerateCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\MigrateCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\StatusCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\VersionCommand(),


    new \Likedimion\Tools\Command\InformationCommand()
));
\Doctrine\ORM\Tools\Console\ConsoleRunner::addCommands($cli);
$cli->run();
