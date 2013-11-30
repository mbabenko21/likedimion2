<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 2:00
 */

namespace Likedimion\Tools;


use Likedimion\Database\Entity\Account;
use Likedimion\Service\AuthServiceInterface;

class AuthServiceImpl implements AuthServiceInterface {

    /**
     * @param string $login
     * @param string $password
     * @return string
     */
    public function login($login, $password)
    {
        // TODO: Implement login() method.
    }

    /**
     * @return bool
     */
    public function isLogin()
    {
        // TODO: Implement isLogin() method.
    }

    /**
     * @return bool
     */
    public function logout()
    {
        // TODO: Implement logout() method.
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        // TODO: Implement getAccount() method.
    }

    /**
     * @return string
     */
    public function getToken()
    {
        // TODO: Implement getToken() method.
    }
}