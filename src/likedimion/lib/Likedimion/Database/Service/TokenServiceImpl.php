<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 2:02
 */

namespace Likedimion\Database\Service;


use Doctrine\ORM\EntityManager;
use Likedimion\Database\Entity\Token;
use Likedimion\Service\TokenServiceInterface;

class TokenServiceImpl implements TokenServiceInterface {
    /** @var  EntityManager */
    protected $em;
    /**
     * @return Token
     */
    public function generateToken()
    {
        // TODO: Implement generateToken() method.
    }

    /**
     * @param string $value
     * @return Token
     */
    public function findToken($value)
    {
        // TODO: Implement findToken() method.
    }

    /**
     * @param Token $token
     * @return bool
     */
    public function save(Token $token)
    {
        $this->em->persist($token);
    }

    /**
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function setEm($em)
    {
        $this->em = $em;
    }
}