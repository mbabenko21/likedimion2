<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 02.12.13
 * Time: 0:16
 */

namespace Likedimion\Service;


use Likedimion\Database\Entity\Player;

interface PlayerRepository {
    /**
     * @param string $name
     * @return Player
     */
    public function findPlayerByName($name);

    /**
     * @param Player $player
     * @return void
     */
    public function save(Player $player);

    /**
     * @param Player $player
     * @return void
     */
    public function remove(Player $player);
} 