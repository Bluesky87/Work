<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Kasperek
 * Date: 04.07.2017
 * Time: 21:44
 */

namespace Work\AuthenticationContent;

/**
 * Class AuthenticationDigest
 * @package Work\AuthenticationContent
 */
class AuthenticationDigest implements AuthenticationInterface
{
    public $login;
    public $password;
    public $type = 'digest';

    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getAuth()
    {
        return $this;
    }
}
