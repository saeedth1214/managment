<?php

namespace App\services\MakeRequest\Facade;

use Illuminate\Support\Facades\Facade;
use App\services\MakeRequest\Validation\CheckValidRoute;
use App\services\MakeRequest\Validation\CheckValidCreatorRequest;

class MakeRequestFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        $title= request('title');
        return self::checkValidKey($title);
    }

    private static function checkValidKey($title)
    {
        CheckValidRoute::CheckRoute($title);
        return CheckValidCreatorRequest::checkValidClass($title);
    }
}
