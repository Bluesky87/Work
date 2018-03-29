<?php

/**
 * Created by PhpStorm.
 * User: Grzegorz Kasperek
 * Date: 02.06.2017
 * Time: 23:12
 */

namespace Work\CurlContent;

use Exception;
use Work\AuthenticationContent\AuthenticationInterface;
use Work\ResponseContent\Response;

/**
 * Class Curl
 * @package Work\Curl
 */
class Curl implements CurlMethodInterface, CurlInterface
{
    protected $curl;

    private $url;

    private $method;

    /**
     * Curl constructor.
     * init curl, set essential parameters of curl
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
        $this->curl = curl_init($this->url);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLINFO_HEADER_OUT, true);
        curl_setopt($this->curl, CURLOPT_HEADER, 1);
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setAuth(AuthenticationInterface $authentication)
    {
        $type = $authentication->getType();

        if ($type == 'basic')
        {
            curl_setopt($this->curl, CURLOPT_USERPWD, $authentication->getLogin() . ':' . $authentication->getPassword());
        }
        elseif ($type == 'digest')
        {
            curl_setopt($this->curl, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
            curl_setopt($this->curl, CURLOPT_USERPWD, $authentication->getLogin() . ':' . $authentication->getPassword());
        }
        elseif ($type == 'token')
        {
            //@TODO;
        }
        else {
            throw new Exception('Incorrect type of authentication');
        }
    }

    public function get()
    {
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'GET');
    }

    public function post($data)
    {
        if ($this->validate_json($data))
        {
            curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data))
            );
        }
        else
        {
            throw new Exception('Incorrect data format, need to be JSON');
        }
    }

    public function put()
    {
        // @TODO;
    }

    public function patch()
    {
        // @TODO;
    }

    public function delete()
    {
        // @TODO;
    }

    public function send()
    {
        $result = curl_exec($this->curl);
        $body = $this->setBody($result);
        $headers = $this->setHeaders($result);
        curl_close($this->curl);
        return new Response($body, $headers[0], $headers[1], $headers[2]);
    }

    /**
     * Helper method, build body from curl result
     * @param $result
     * @return bool|string
     */
    private function setBody($result)
    {
        $info  = curl_getinfo($this->curl);
        $header_size = $info['header_size'];
        $body = substr($result, $header_size);
        return $body;
    }

    /**
     * Helper method, build headers, code and version from curl result
     * @param $result
     * @return array
     */
    private function setHeaders($result)
    {
        $headers = [];
        $resultsRaw = explode(PHP_EOL, $result);
        $mainInformation = explode(' ', array_shift($resultsRaw), 3);
        $version = explode('/', $mainInformation[0])[1];
        $code = $mainInformation[1];
        foreach ($resultsRaw as $row) {
            $parts = explode(':', $row);
            if (count($parts) === 2)
            {
                $headers[trim($parts[0])] = trim($parts[1]);
            }
        }
        return [$headers, $code, $version];
    }

    /**
     * Helper function check if data is in JSON format
     * @param null $data
     * @return bool
     */
    private function validate_json($data=null)
    {
        if (is_string($data))
        {
            @json_decode($data);
            return (json_last_error() === JSON_ERROR_NONE);
        }
        return false;
    }
}
