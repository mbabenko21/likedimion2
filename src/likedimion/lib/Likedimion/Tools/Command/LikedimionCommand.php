<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 08.12.13
 * Time: 7:42
 */

namespace Likedimion\Tools\Command;


use Likedimion\Game;
use Symfony\Component\Console\Command\Command;

class LikedimionCommand extends Command{

    protected function get($serviceId){
        $container = Game::getInstance()->getContainer();
        return $container->get($serviceId);
    }

} 