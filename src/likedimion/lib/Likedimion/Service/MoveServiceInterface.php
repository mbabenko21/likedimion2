<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 07.12.13
 * Time: 23:31
 */

namespace Likedimion\Service;


use Likedimion\Database\Entity\Location;

interface MoveServiceInterface {
    /**
     * @param object $object
     * @param Location $fromLoc
     * @param Location $toLoc
     * @return void
     */
    public function move($object, Location $fromLoc, Location $toLoc);
} 