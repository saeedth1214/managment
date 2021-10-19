<?php

namespace App\services\MakeRequest\Concreate;

use App\services\MakeRequest\Abstraction\MakeRequestInterface;
use App\services\MakeRequest\Drivers\LogoutRequest;

class CreateLogoutRequest implements MakeRequestInterface
{
    public function createRequest()
    {
        return new LogoutRequest();
    }
}
