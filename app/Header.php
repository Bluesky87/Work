<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Kasperek
 * Date: 31.05.2017
 * Time: 20:19
 */

namespace Work;

/**
 * Class Header
 * Class prepare to work on Headers
 * @package Work
 */
abstract class Header
{
    protected $headers = array();

    protected $headerLowercase = array();

    /**
     * Get all existing Headers
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Get header property using name, name(case insensitive)
     * @param $name
     * @return bool|mixed
     */
    public function getHeader($name)
    {
        $name = strtolower($name);
        if (isset($this->headerLowercase[$name])) {
            return $this->headerLowercase[$name];
        }
        return false;
    }

    /**
     * Check if a header exists by the given case-insensitive name.
     * @param $name
     * @return bool
     */
    public function hasHeader($name)
    {
        $name = strtolower($name);
        if (isset($this->headerLowercase[$name])) {
            return true;
        }
        return false;
    }

    /**
     * Helper method to get case-insensitive header name
     * @return array
     */
    protected function convertHeaderNameToLowerCase()
    {
        foreach ($this->headers as $name => $header) {
            $name = strtolower($name);
            $this->headerLowercase[$name] = $header;
        }
        return $this->headerLowercase;
    }
}
