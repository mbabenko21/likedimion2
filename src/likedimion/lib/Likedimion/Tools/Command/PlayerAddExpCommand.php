<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 08.12.13
 * Time: 7:40
 */

namespace Likedimion\Tools\Command;


use Doctrine\ORM\EntityNotFoundException;
use Likedimion\Service\PlayerServiceInterface;
use Likedimion\Service\TranslationsHelperInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PlayerAddExpCommand extends LikedimionCommand
{
    protected function configure()
    {
        $this->setName("likedimion:player:add_exp")
            ->addArgument("name", InputArgument::REQUIRED, "Player name")
            ->addArgument("experience", InputArgument::REQUIRED, "Added experience");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var $playerService PlayerServiceInterface */
        $playerService = $this->get("player_service");
        /** @var $translations TranslationsHelperInterface */
        $translations = $this->getHelper("translations");
        try {
            $player = $playerService->getRepository()->findPlayerByName($input->getArgument("name"));
            $playerService->addExperience($player, $input->getArgument("experience"));
        } catch (EntityNotFoundException $e) {
            $output->writeln(sprintf($translations->getLine("player_not_exists"), $input->getArgument("name")));
        }
    }
} 