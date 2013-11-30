<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 2:33
 */

namespace Likedimion\Tools\Command;


use Likedimion\Game;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InformationCommand extends Command {
    protected function configure() {
        $this->setName("likedimion:information");
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        $config = Game::getInstance()->getConfig();
        $output->writeln(array(
            sprintf("<info>%s</info>, ver. <comment>%s, %s mode</comment>", $config["app"]["name"], $config["app"]["version"], $config["app"]["mode"]),
            sprintf("<info>Author:</info> <comment>%s <%s></comment>", $config["author"]["name"], $config["author"]["email"]),
            sprintf("Date: %s", date("d-m-Y"))
        ));
    }
} 