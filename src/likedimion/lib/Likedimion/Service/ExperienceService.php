<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 07.12.13
 * Time: 20:52
 */

namespace Likedimion\Service;


use Likedimion\Database\Entity\Player;
use Likedimion\Tools\Helper\ExpTableLevelDataHelper;

interface ExperienceService {
    /**
     * @param Player $player
     * @return ExpTableLevelDataHelper
     */
    public function getNextLvl(Player $player);

    /**
     * @param Player $player
     * @return ExpTableLevelDataHelper
     */
    public function getCurrentLvl(Player $player);

    /**
     * @param Player $player
     * @return int
     */
    public function getNeedExpForNextLevel(Player $player);
} 