<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Kasperek
 * Date: 04.07.2017
 * Time: 19:34
 */

namespace Work\AuthenticationContent;

/**
 * Class Authentication
 * @package Work\AuthenticationContent
 */
class Authentication
{
    private $authenticationType;

    /**
     * Set Authentication class
     * @param AuthenticationInterface $authenticationType
     */
    public function setType(AuthenticationInterface $authenticationType)
    {
        $this->authenticationType = $authenticationType;
    }

    /**
     * @return object authentication
     */
    public function getAuthenticationObject()
    {
        return $this->authenticationType->getAuth();
    }
}
