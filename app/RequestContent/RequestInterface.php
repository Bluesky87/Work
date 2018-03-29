<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Kasperek
 * Date: 03.06.2017
 * Time: 00:44
 */

namespace Work\RequestContent;

/**
 * Interface RequestInterface
 * @package Work\RequestContent
 */
interface RequestInterface
{
    /**
     * Retrieves the message's request target.
     * @return string
     */
    public function getRequestTarget();

    /**
     * Return HTTP method GET/POST/DELETE/PATCH/PUT
     * @return string
     */
    public function getMethod();

    /**
     * Return full URL from request
     * @return string
     */
    public function getUrl();
}
