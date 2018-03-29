<?php

/**
 * Created by PhpStorm.
 * User: Grzegorz Kasperek
 * Date: 04.07.2017
 * Time: 19:30
 */

namespace Work\AuthenticationContent;

/**
 * Interface AuthenticationInterface
 * @package Work\AuthenticationContent
 */
interface AuthenticationInterface
{
    /**
     * Return object of authentication strategy
     */
    public function getAuth();

    /**
     *
     * Return name of type authentication
     * @return string
     */
    public function getType();
}
