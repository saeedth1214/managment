<?php


namespace App\services\MakeRequest\Validation;

use PHPUnit\Framework\Exception;

class CheckValidRoute
{
    public static function CheckRoute($routeName)
    {
        $keys = array_keys(config()->get('request'));
        if (!in_array($routeName, $keys)) {
            throw new Exception("there isn't any route with this title.");
        }
    }
}
