<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 1:43
 */

namespace Likedimion\Service;


use Likedimion\Database\Entity\Player;

interface PlayerServiceInterface extends LikedimionRepositoryInterface {
    /**
     * @param Player $player
     * @param int $experience
     * @return Player
     */
    public function addExperience(Player $player, $experience = 1);
    /**
     * @return PlayerRepositoryInterface
     */
    public function getRepository();
} 