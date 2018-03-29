<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Kasperek
 * Date: 26.05.2017
 * Time: 20:20
 */
return PhpCsFixer\Config::create()
    ->setUsingCache(false)
    ->setRules(array(
        '@PSR2' => true,
        'full_opening_tag' => true,
        'method_separation' => true,
    ))
    ->setFinder(PhpCsFixer\Finder::create()
        ->in(__DIR__));