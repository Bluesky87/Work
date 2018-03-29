<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Kasperek
 * Date: 14.06.2017
 * Time: 21:06
 */

namespace Work;

use JsonSerializable;
use ReflectionClass;

/**
 * Global model foundation class
 * Class Model
 * @package Work
 */
abstract class Model implements JsonSerializable
{
    /**
     * build json Serialize using ReflectionClass from model property
     * @return array
     */
    public function jsonSerialize()
    {
        $reflect = new ReflectionClass($this);
        $model = $reflect->getProperties();
        $data = [];
        foreach ($model as $property) {
            $property->setAccessible(true);
            $data[$property->getName()] = $property->getValue($this);
        }
        return [
            strtolower($reflect->getShortName()) => $data
        ];
    }
}
