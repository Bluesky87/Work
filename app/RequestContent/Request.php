<?php

/**
 * Created by PhpStorm.
 * User: Grzegorz Kasperek
 * Date: 03.06.2017
 * Time: 00:43
 */
namespace Work\RequestContent;

use Exception;
use Work\CurlContent\Curl;
use Work\CurlContent\GetMethod;
use Work\CurlContent\PostMethod;
use Work\Header;

/**
 * Class Request
 * @package Work\RequestContent
 */
class Request extends Header implements RequestInterface
{
    private $url;

    private $method;

    private $body;

    /**
     * Request constructor.
     * @param $url
     * @param $method
     * @param array $headers
     * @param null $body
     */
    public function __construct($url, $method, $headers = [], $body = null)
    {
        $this->url = $url;
        $this->method = $method;
        $this->headers = $headers;
        $this->convertHeaderNameToLowerCase();
        $this->body = $body;
    }

    public function getRequestTarget()
    {
        return $this->parseUrl($this->url);
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Build Curl,choose method of request, add authorization
     * @return \Work\ResponseContent\Response
     * @throws Exception
     */
    public function execute()
    {
        $curl = new Curl($this->url);

        // Myślałem tutaj o wzorcu strategia, ale raczej nie pojawi się w przyszłości nowa metoda stąd zwykłe ify

        if ($this->method == 'GET')
        {
            $curl->get();
        }
        elseif ($this->method == 'POST')
        {
            $curl->post($this->body);
        }
        elseif ($this->method == 'PUT')
        {
            $curl->put();
        }
        elseif ($this->method == 'PATCH')
        {
            $curl->patch();
        }
        elseif ($this->method == 'DELETE')
        {
            $curl->delete();
        }
        else
        {
            throw new Exception('Incorrect Type of method');
        }

        $authentication = $this->getHeader('auth');

        if($authentication) {
            $curl->setAuth($authentication);
        }

        $result = $curl->send();
        return $result;
    }

    /**
     * Parse URL to get only message's request target, helper method
     * @param $url
     * @return bool|string
     */
    private function parseUrl($url)
    {
        $protocolPosition = stripos($url, '//');

        if ($protocolPosition !== false) {
            $url = substr($url, $protocolPosition + 2);
        }
        $trueRequest = stripos($url, '/');
        $result = substr($url, $trueRequest);
        return $result;
    }
}
