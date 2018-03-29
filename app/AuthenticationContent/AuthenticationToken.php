<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Kasperek
 * Date: 04.07.2017
 * Time: 21:46
 */

namespace Work\AuthenticationContent;

/**
 * Class AuthenticationToken
 * @package Work\AuthenticationContent
 */
class AuthenticationToken implements AuthenticationInterface
{
    private $type = 'token';

    public function getAuth()
    {
        // TODO: Implement setAuth() method.
    }

    public function getType()
    {
        return $this->type;
    }
}
