<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 2:01
 */

namespace Likedimion\Database\Service;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Likedimion\Database\Entity\Player;
use Likedimion\Database\Entity\PlayerStatistic;
use Likedimion\Events\EventsStore;
use Likedimion\Events\LvlUpEvent;
use Likedimion\Events\PlayerEvent;
use Likedimion\Game;
use Likedimion\Service\AuthServiceInterface;
use Likedimion\Service\ExperienceService;
use Likedimion\Service\PlayerRepositoryInterface;
use Likedimion\Service\PlayerServiceInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

class PlayerServiceImpl implements PlayerServiceInterface
{
    /** @var  EntityManager */
    protected $em;
    /** @var  AuthServiceInterface */
    protected $authService;
    /** @var  string */
    protected $entityClass;
    /** @var  EventDispatcher */
    protected $eventDispatcher;
    /** @var  ExperienceService */
    protected $expTableService;


    /**
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function setEm($em)
    {
        $this->em = $em;
    }

    /**
     * @return PlayerRepositoryInterface
     */
    public function getRepository()
    {
        return $this->em->getRepository("Likedimion\\Database\\Entity\\Player");
    }

    /**
     * @param \Likedimion\Service\AuthServiceInterface $authService
     */
    public function setAuthService($authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param string $entityClass
     */
    public function setEntityClass($entityClass)
    {
        $this->entityClass = $entityClass;
    }

    /**
     * @param Player $player
     * @param int $experience
     * @return Player
     */
    public function addExperience(Player $player, $experience = 1)
    {
        $cfg = Game::getInstance()->getConfig();
        $charParams = $player->getCharParameters();
        if ($charParams->getLevel() <= $cfg["app"]["max_lvl"]) {
            $charParams->setExperience($charParams->getExperience() + $experience * $cfg["app"]["exp_rate"]);
            if ($charParams->getExperience() >= $charParams->getNeedExperience()) {
                $exp = $charParams->getExperience() - $charParams->getNeedExperience();
                $charParams->setExperience(0);
                $charParams->addLvl(1);
                $player->setCharParameters($charParams);
                $this->addExperience($player, $exp);
                $this->eventDispatcher->dispatch(EventsStore::LVL_UP, new PlayerEvent($player));
            }

            $player->setCharParameters($charParams);
            $this->eventDispatcher->dispatch(EventsStore::ADD_EXP, new PlayerEvent($player));
            //$this->getRepository()->save($player);
        }
    }

    /**
     * @param \Symfony\Component\EventDispatcher\EventDispatcher $eventDispatcher
     */
    public function setEventDispatcher($eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param \Likedimion\Service\ExperienceService $expTableService
     */
    public function setExpTableService($expTableService)
    {
        $this->expTableService = $expTableService;
    }
}