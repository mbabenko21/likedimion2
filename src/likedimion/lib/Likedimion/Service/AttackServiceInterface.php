<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 07.12.13
 * Time: 23:42
 */

namespace Likedimion\Service;


interface AttackServiceInterface {
    /**
     * @param $from кто атакует
     * @param $to кого атакует
     * @return void
     */
    public function attack($from, $to);

} 