<?php

namespace ValueObjects\Exceptions;

/**
 * InvalidUrlException
 *
 * @author Sergio de Candelario <sergio.decandelario@gmail.com>
 */
class InvalidUrlException extends \Exception
{
    public static function create($url){
        return new self("The $url is not valid");
    }
}