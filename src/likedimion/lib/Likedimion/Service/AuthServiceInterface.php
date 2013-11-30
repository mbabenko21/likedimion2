<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 1:45
 */

namespace Likedimion\Service;


use Likedimion\Database\Entity\Account;

interface AuthServiceInterface {
    /**
     * @param string $login
     * @param string $password
     * @return string
     */
    public function login($login, $password);

    /**
     * @return bool
     */
    public function isLogin();

    /**
     * @return bool
     */
    public function logout();

    /**
     * @return Account
     */
    public function getAccount();

    /**
     * @return string
     */
    public function getToken();
} 