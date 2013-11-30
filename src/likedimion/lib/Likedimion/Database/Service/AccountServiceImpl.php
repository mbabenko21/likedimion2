<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 0:20
 */

namespace Likedimion\Database\Service;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use Likedimion\Database\Entity\Account;
use Likedimion\Service\AccountServiceInterface;

class AccountServiceImpl implements AccountServiceInterface {
    /** @var  EntityManager */
    protected $em;

    /**
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function setEm($em)
    {
        $this->em = $em;
    }

    /**
     * Проверка валидности пароля
     * @param string $login
     * @param string $password
     * @return bool
     */
    public function verifyPassword($login, $password)
    {
        try{
            $account = $this->findByLogin($login);
            if(password_verify($password, $account->getPassword())){
                return true;
            }  else {
                return false;
            }
        } catch(EntityNotFoundException $e){
            return false;
        }
    }

    /**
     *
     * @param string $email
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @return Account
     */
    public function findByEmail($email)
    {
        $criteria = array("email" => $email);
        return $this->_findAccByCriteria($criteria);
    }

    /**
     * @param string $login
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @return Account
     */
    public function findByLogin($login)
    {
        $criteria = array("login" => $login);
        return $this->_findAccByCriteria($criteria);
    }

    /**
     * @param array $criteria
     * @return null|object
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    protected function _findAccByCriteria(array $criteria){
        $repo = $this->em->getRepository('Likedimion\\Database\\Entity\\Account');
        $document = $repo->findOneBy($criteria);
        if($document instanceof Account === false){
            throw new EntityNotFoundException();
        }
        return $document;
    }

    /**
     * @param \Likedimion\Database\Entity\Account $account
     * @return void
     */
    public function save(Account $account)
    {
        $this->em->persist($account);
    }
}