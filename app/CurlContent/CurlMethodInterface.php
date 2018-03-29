<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Kasperek
 * Date: 03.06.2017
 * Time: 00:16
 */

namespace Work\CurlContent;

/**
 * Interface CurlMethodInterface
 * @package Work\CurlContent
 */
interface CurlMethodInterface
{
    /**
     * Part of CURL, build GET method type
     */
    public function get();

    /**
     * Part of CURL, build POST method, provide data in Json format
     * @param $data
     *
     */
    public function post($data);

    /**
     * @TODO
     * @return mixed
     */
    public function put();

    /**
     * @TODO
     * @return mixed
     */
    public function patch();

    /**
     * @TODO
     * @return mixed
     */
    public function delete();
}
