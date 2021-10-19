<?php


namespace App\services\MakeRequest\Validation;

use App\services\MakeRequest\Abstraction\MakeRequestInterface;
use PHPUnit\Framework\Exception;

class CheckValidCreatorRequest
{
    public static function checkValidClass($routeName)
    {
        $class = config()->get("request." . $routeName)['class'];
        if (!(resolve($class) instanceof MakeRequestInterface)) {
            throw new Exception("$class" . " should implements MakeRequestInterface");
        }
        return config()->get("request." . $routeName)['class'];
    }
}
