<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 07.12.13
 * Time: 20:55
 */

namespace Likedimion\Tools;


use Likedimion\Common\StringCommon;
use Likedimion\Database\Entity\Player;
use Likedimion\Service\ExperienceService;
use Likedimion\Tools\Helper\ExpTableLevelDataHelper;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use Symfony\Component\Yaml\Yaml;

class ExpTableServiceImpl implements ExperienceService
{

    /**
     * @param Player $player
     * @return ExpTableLevelDataHelper
     */
    public function getNextLvl(Player $player)
    {
        $currentLvl = $player->getCharParameters()->getLevel();
        if (isset($this->expTable[$currentLvl + 1])) {
            $data = new ExpTableLevelDataHelper();
            $data->setNeedExp($this->expTable[$currentLvl + 1][0]);
            $data->setCostBonus($this->expTable[$currentLvl + 1][1]);
            $data->setLifeBonus($this->expTable[$currentLvl + 1][2]);
            $data->setManaBonus($this->expTable[$currentLvl + 1][3]);
            return $data;
        } else {
            return $this->getCurrentLvl($player);
        }
    }

    /**
     * @param Player $player
     * @return ExpTableLevelDataHelper
     */
    public function getCurrentLvl(Player $player)
    {
        $currentLvl = $player->getCharParameters()->getLevel();
        $data = new ExpTableLevelDataHelper();
        $data->setNeedExp($this->expTable[$currentLvl][0]);
        $data->setCostBonus($this->expTable[$currentLvl][1]);
        $data->setLifeBonus($this->expTable[$currentLvl][2]);
        $data->setManaBonus($this->expTable[$currentLvl][3]);
        return $data;
    }

    public function getNeedExpForNextLevel(Player $player)
    {
        $cl = $player->getCharParameters()->getLevel();
        if ($cl < 11) {
            $needExp = 40 * pow($cl, 2) + 360 * $cl;
        } elseif ($cl >= 11 and $cl < 30) {
            $needExp = -0.4 * pow($cl, 3) + 40.4 * pow($cl, 2) + 396 * $cl;
        } elseif($cl >= 30 and $cl < 60){
            //(65x 2 - 165x - 6750) × 0,82
            $needExp = (65 * pow($cl, 2) - 165 * $cl -6750) * 0.82;
        } elseif($cl >= 61 and $cl < 69) {
            //580 + (5 × CL)
            //155 + MXP (CL) х (1344 - ((69-CL) * (3 + (69-CL) * 4)))
            $needExp = 155 + 580 + (5*$cl)*(1344-((69-$cl)*(3+(69-$cl)*4)));
        } elseif($cl >= 70 and $cl < 80) {
            //580 + (5 × CL)
            //155 + MXP (CL) х (1344 - ((69-CL) * (3 + (69-CL) * 4)))
            $needExp = 155 + 1878 + (5*$cl)*(1990-((89-$cl)*(3+(89-$cl)*5)));
        } elseif($cl >= 80) {
            //155 + 3517 + (5*83)*(3820-((99-83)*(3+(99-83)*5)))
            $needExp = 155 + 3517 + (5 * $cl)*(3829-((99-$cl)*(3+(99-$cl)*5)));
        }
        return $needExp;
    }

    /**
     * @param array $expTable
     */
    public function setExpTable($expTable)
    {
        $this->expTable = $expTable;
    }
}