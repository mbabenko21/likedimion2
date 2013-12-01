<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 01.12.13
 * Time: 23:54
 */

namespace Likedimion\Database\Entity;

/**
 * Class PlayerStatistic
 * @package Likedimion\Database\Entity
 *
 * @Entity
 * @Table(name="players_statistic")
 */
class PlayerStatistic {
    /**
     * @var int
     * @Id
     * @GenerateValue(strategy="AUTO")
     * @Column(type="integer")
     */
    protected $id;
    /**
     * @var Player
     * @OneToOne(targetEntity="Player")
     * @JoinColumn(name="player_id", referencedColumnName="id")
     */
    protected $player;
    /**
     * @var int
     * @Column(type="integer", name="pvp")
     */
    protected $PVP;
    /**
     * @var int
     * @Column(type="integer", name="pve")
     */
    protected $PVE;
    /**
     * @var int
     * @Column(type="integer", name="arena_pvp")
     */
    protected $ArenaPVP;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param mixed $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }

    /**
     * @return int
     */
    public function getPVP()
    {
        return $this->PVP;
    }

    /**
     * @param int $PVP
     */
    public function setPVP($PVP)
    {
        $this->PVP = $PVP;
    }

    /**
     * @return int
     */
    public function getPVE()
    {
        return $this->PVE;
    }

    /**
     * @param int $PVE
     */
    public function setPVE($PVE)
    {
        $this->PVE = $PVE;
    }

    /**
     * @return mixed
     */
    public function getArenaPVP()
    {
        return $this->ArenaPVP;
    }

    /**
     * @param mixed $ArenaPVP
     */
    public function setArenaPVP($ArenaPVP)
    {
        $this->ArenaPVP = $ArenaPVP;
    }
} 