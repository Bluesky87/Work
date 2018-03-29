<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Kasperek
 * Date: 06.06.2017
 * Time: 18:26
 */

namespace Work\CurlContent;

use Work\AuthenticationContent\AuthenticationInterface;

/**
 * Interface CurlInterface
 * @package Work\CurlContent
 */
interface CurlInterface
{
    /**
     * Return full url provide to curl
     * @return string
     */
    public function getUrl();

    /**
     * Return HTTP method GET/POST/DELETE/PATCH/PUT set in Curl
     * @return mixed
     */
    public function getMethod();

    /**
     * Set selected authentication type in curl
     * @param AuthenticationInterface $authentication
     * @return mixed
     */
    public function setAuth(AuthenticationInterface $authentication);

    /**
     * Close Curl, prepare body and headers then build Response
     * @return Response
     */
    public function send();
}
