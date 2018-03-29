<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Kasperek
 * Date: 01.06.2017
 * Time: 18:55
 */

namespace Work\ResponseContent;

/**
 * Interface ResponseInterface
 * @package Work\ResponseContent
 */
interface ResponseInterface
{
    /**
     * Return response status code from RestApi
     * @return mixed
     */
    public function getCode();

    /**
     * Return response description code from RestApi
     * @return mixed
     */
    public function getCodeDescription();

    /**
     * Return body message from RestApi
     * @return mixed
     */
    public function getBody();

    /**
     * @return mixed
     */
    public function getVersion();
}
