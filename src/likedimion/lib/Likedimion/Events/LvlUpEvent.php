<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 07.12.13
 * Time: 19:53
 */

namespace Likedimion\Events;


use Likedimion\Database\Entity\Player;
use Symfony\Component\EventDispatcher\Event;

class LvlUpEvent extends Event{
    /** @var \Likedimion\Database\Entity\Player  */
    protected $player;

    public function __construct(Player $player){
        $this->player = $player;
    }

    /**
     * @return \Likedimion\Database\Entity\Player
     */
    public function getPlayer()
    {
        return $this->player;
    }
} 