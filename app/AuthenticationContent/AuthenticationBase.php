<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Kasperek
 * Date: 04.07.2017
 * Time: 19:32
 */

namespace Work\AuthenticationContent;

/**
 *
 * Class AuthenticationBase
 * @package Work\AuthenticationContent
 */
class AuthenticationBase implements AuthenticationInterface
{
    private $login;
    private $password;
    private $type = 'basic';

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

    public function getType() {
        return $this->type;
    }

    public function getAuth()
    {
        return $this;
    }
}
