<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 07.12.13
 * Time: 20:52
 */

namespace Likedimion\Tools\Helper;


class ExpTableLevelDataHelper {
    /**
     * @var int
     */
    protected $needExp;
    /**
     * @var int
     */
    protected $costBonus;
    /**
     * @var int
     */
    protected $lifeBonus;
    /**
     * @var int
     */
    protected $manaBonus;

    /**
     * @return int
     */
    public function getNeedExp()
    {
        return $this->needExp;
    }

    /**
     * @param int $needExp
     */
    public function setNeedExp($needExp)
    {
        $this->needExp = $needExp;
    }

    /**
     * @return int
     */
    public function getCostBonus()
    {
        return $this->costBonus;
    }

    /**
     * @param int $costBonus
     */
    public function setCostBonus($costBonus)
    {
        $this->costBonus = $costBonus;
    }

    /**
     * @return int
     */
    public function getLifeBonus()
    {
        return $this->lifeBonus;
    }

    /**
     * @param int $lifeBonus
     */
    public function setLifeBonus($lifeBonus)
    {
        $this->lifeBonus = $lifeBonus;
    }

    /**
     * @return int
     */
    public function getManaBonus()
    {
        return $this->manaBonus;
    }

    /**
     * @param int $manaBonus
     */
    public function setManaBonus($manaBonus)
    {
        $this->manaBonus = $manaBonus;
    }
} 