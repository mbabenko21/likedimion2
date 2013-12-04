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
use Likedimion\Service\AuthServiceInterface;
use Likedimion\Service\PlayerRepository;
use Likedimion\Service\PlayerServiceInterface;

class PlayerServiceImpl implements PlayerServiceInterface {
    /** @var  EntityManager */
    protected $em;
    /** @var  AuthServiceInterface */
    protected $authService;
    /** @var  string */
    protected $entityClass;

    /**
     * @param string $name
     * @param int $sex
     * @param int $class
     * @return Player
     */
    public function createPlayer($name, $sex, $class)
    {
        $account = $this->authService->getAccount();
        $player = new Player();
        $statistic = new PlayerStatistic();
        $player->setAccount($account);
        $player->setName($name);
        $player->setStatistic($statistic);
        $player->setSex($sex);
        $player->setClass($class);

        $this->getRepository()->save($player);
    }


    /**
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function setEm($em)
    {
        $this->em = $em;
    }

    /**
     * @return PlayerRepository
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
}