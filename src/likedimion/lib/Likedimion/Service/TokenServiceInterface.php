<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 1:53
 */

namespace Likedimion\Service;


use Likedimion\Database\Entity\Token;

interface TokenServiceInterface {
    /**
     * @return Token
     */
    public function generateToken();

    /**
     * @param string $value
     * @return Token
     */
    public function findToken($value);

    /**
     * @param Token $token
     * @return bool
     */
    public function save(Token $token);
} 