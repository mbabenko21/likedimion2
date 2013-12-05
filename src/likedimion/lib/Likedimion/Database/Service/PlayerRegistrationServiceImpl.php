<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 05.12.13
 * Time: 20:37
 */

namespace Likedimion\Database\Service;


use Doctrine\ORM\EntityNotFoundException;
use Likedimion\Database\Entity\Player;
use Likedimion\Database\Entity\PlayerStatistic;
use Likedimion\Exception\RegistrationException;
use Likedimion\Game;
use Likedimion\Service\AccountServiceInterface;
use Likedimion\Service\AuthServiceInterface;
use Likedimion\Service\PlayerRegistrationServiceInterface;
use Likedimion\Service\PlayerServiceInterface;
use Likedimion\Tools\Helper\PlayerDataHelper;

class PlayerRegistrationServiceImpl implements PlayerRegistrationServiceInterface {
    /** @var  PlayerServiceInterface */
    protected $playerService;
    /** @var  AuthServiceInterface */
    protected $authService;
    /** @var  AccountServiceInterface */
    protected $accountService;

    /**
     * @param \Likedimion\Tools\Helper\PlayerDataHelper $playerData
     * @throws \Likedimion\Exception\RegistrationException
     * @return Player
     */
    public function createPlayer(PlayerDataHelper $playerData)
    {
        try{
            $findPlayer = $this->playerService->getRepository()->findPlayerByName($playerData->name);
            throw new RegistrationException("player_name_exists");
        } catch(EntityNotFoundException $e){
            $player = new Player();
            $player->setName($playerData->name);
            $player->setSex($playerData->sex);
            $player->setClass($playerData->class);

            $this->playerService->getRepository()->save($player);

            $account = $this->authService->getAccount(Game::getInstance()->getAuthToken()->getValue());
            $account->addPlayer($player);
            $this->accountService->getRepository()->save($account);

            $this->playerService->getRepository()->save($player);
            return $player;
        }
    }

    /**
     * @param \Likedimion\Service\PlayerServiceInterface $playerService
     */
    public function setPlayerService($playerService)
    {
        $this->playerService = $playerService;
    }

    /**
     * @param \Likedimion\Service\AuthServiceInterface $authService
     */
    public function setAuthService($authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param \Likedimion\Service\AccountServiceInterface $accountService
     */
    public function setAccountService($accountService)
    {
        $this->accountService = $accountService;
    }
}