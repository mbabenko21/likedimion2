<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 0:20
 */

namespace Likedimion\Service;


use Likedimion\Database\Entity\Account;

interface AccountServiceInterface {
    /**
     * Проверка валидности пароля
     * @param string $login
     * @param string $password
     * @return bool
     */
    public function verifyPassword($login, $password);

    /**
     *
     * @param string $email
     * @return Account
     */
    public function findByEmail($email);

    /**
     * @param string $login
     * @return Account
     */
    public function findByLogin($login);

    /**
     * @param \Likedimion\Database\Entity\Account $account
     * @return void
     */
    public function save(Account $account);
} 