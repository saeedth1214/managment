<?php

namespace App\services\MakeRequest\Validation;

use PHPUnit\Framework\Exception;
use SebastianBergmann\CodeCoverage\InvalidArgumentException;

class CheckRouteHasUrl
{
    public static function checkRouteHasUrl($routeName, $requestMethod)
    {
        self::checkRouteHasMethods($routeName);
        return self::checkRouteHasUrlForRequestMethod($routeName, $requestMethod);
    }

    public static function checkRouteHasMethods($routeName)
    {
        if (!key_exists('methods', config()->get("request.$routeName"))) {
            throw new InvalidArgumentException("Argument methods doesn't set for this route");
        }
    }
    public static function checkRouteHasUrlForRequestMethod($routeName, $requestMethod)
    {
        self::routeHasRequestMethod($routeName, $requestMethod);
        return self::getUrlFromRequestMethod($routeName, $requestMethod);
    }
    public static function routeHasRequestMethod($routeName, $requestMethod)
    {
        if (!key_exists($requestMethod, config()->get("request.$routeName")['methods'])) {
            throw new Exception("there isn't any request methods for this route ");
        }
    }
    public static function getUrlFromRequestMethod($routeName, $requestMethod)
    {
        if (!key_exists('url', config()->get("request.$routeName")['methods'][$requestMethod])) {
            throw new Exception("there isn't any url for this request method ");
        }
        return config()->get("request.$routeName")['methods'][$requestMethod]['url'];
    }
}
