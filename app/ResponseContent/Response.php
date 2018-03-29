<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Kasperek
 * Date: 31.05.2017
 * Time: 20:19
 */


namespace Work\ResponseContent;

use Work\Header;

/**
 * Class Response
 * Aggregate information from Rest Api and presents received data
 * @package Work\ResponseContent
 */
class Response extends Header implements ResponseInterface
{
    private $codeDescription;

    private $code;

    private $body;

    private $version;
    /**
     * array containing code from RESTAPI, key = code, value = code text description
     * @var array
     */
    private $descriptions = [
        '200' => 'OK',
        '400' => 'Bad Request. Client sent invalid data to perform the request. Fix your request and send it again.',
        '401' => 'Unauthorized. Client sent unauthorized request. Make sure that you perform Basic HTTP Authorization' .
                 ' and that login and/or password is correct. Check also that user account is active',
        '403' => 'Forbidden. You were authenticated. Server knows who you are. But you dont have access' .
                 ' to specified resource.',
        '404' => 'Not found. Specified resource was not found',
        '500' => 'Internal server errors. Contact with i-sklep.pl or check server logs.',
        '503' => 'Service unavailable. Contact with i-sklep.pl or check server logs.'
    ];

    /**
     * Response constructor.
     * Build Response from data provided from Curl class
     * @param $body
     * @param $headers
     * @param $code
     * @param $version
     */
    public function __construct($body, $headers, $code, $version)
    {
        $this->headers = $headers;
        $this->headerLowercase = $this->convertHeaderNameToLowerCase();
        $this->body = $body;
        $this->code = $code;
        $this->codeDescription = $this->descriptions[$code];
        $this->version = $version;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getCodeDescription()
    {
        return $this->codeDescription;
    }

    public function getVersion()
    {
        return $this->version;
    }
}
