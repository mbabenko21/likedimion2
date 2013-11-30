<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 2:01
 */

namespace Likedimion\Database\Service;


use Likedimion\Database\Entity\Player;
use Likedimion\Service\PlayerServiceInterface;

class PlayerServiceImpl implements PlayerServiceInterface {

    /**
     * @param string $name
     * @return Player
     */
    public function findByName($name)
    {
        // TODO: Implement findByName() method.
    }
}