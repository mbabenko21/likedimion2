<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 07.12.13
 * Time: 19:54
 */

namespace Likedimion\Listener;


use Likedimion\Events\LvlUpEvent;
use Likedimion\Events\PlayerEvent;
use Likedimion\Service\CalculatingService;
use Likedimion\Service\ExperienceService;
use Likedimion\Service\PlayerServiceInterface;

class PlayerListener {
    /** @var  PlayerServiceInterface */
    protected $playerService;
    /** @var  CalculatingService */
    protected $calculatingService;
    /** @var  ExperienceService */
    protected $expTableService;

    /**
     * @param \Likedimion\Events\PlayerEvent $event
     */
    public function onLvlUp(PlayerEvent $event){
        $player = $event->getPlayer();
        $this->calculatingService->calculate($player);
        $player->getCharParameters()->setNeedExperience($this->expTableService->getNeedExpForNextLevel($player->getCharParameters()->getLevel()));
        $this->playerService->getRepository()->save($player);
    }

    public function onAddExp(PlayerEvent $player){
        $this->playerService->getRepository()->save($player);
    }

    public function calculatePlayer(PlayerEvent $player){
        $this->calculatingService->calculate($player);
    }

    /**
     * @param \Likedimion\Service\PlayerServiceInterface $playerService
     */
    public function setPlayerService($playerService)
    {
        $this->playerService = $playerService;
    }

    /**
     * @param \Likedimion\Service\CalculatingService $calculatingService
     */
    public function setCalculatingService($calculatingService)
    {
        $this->calculatingService = $calculatingService;
    }

    /**
     * @param \Likedimion\Service\ExperienceService $expTableService
     */
    public function setExpTableService($expTableService)
    {
        $this->expTableService = $expTableService;
    }

} 