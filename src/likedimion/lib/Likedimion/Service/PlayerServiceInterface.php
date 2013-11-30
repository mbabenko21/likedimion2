<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 1:43
 */

namespace Likedimion\Service;


use Likedimion\Database\Entity\Player;

interface PlayerServiceInterface {
    /**
     * @param string $name
     * @return Player
     */
    public function findByName($name);
} 