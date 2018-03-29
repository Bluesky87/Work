<?php

/**
 * Created by PhpStorm.
 * User: Grzegorz Kasperek
 * Date: 03.06.2017
 * Time: 01:36
 */
namespace Work\ClientContent;

use Work\RequestContent\Request;

/**
 * Class Client
 * Class responsible for all raw request to i-sklep API
 * @package Work\Cient
 */
class Client
{
    /**
     * @param $url
     * @param $method
     * @param array $headers
     * @param null $body
     * @return \Work\ResponseContent\Response
     */
    public function request($url, $method, $headers = [], $body = null)
    {
        $request = new Request($url, $method, $headers, $body);
        $result = $request->execute();
        return $result;
    }
}
