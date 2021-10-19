<?php

namespace App\services\MakeRequest\Concreate;

use App\services\MakeRequest\Abstraction\MakeRequestInterface;
use App\services\MakeRequest\Drivers\RegisterRequest;


class CreateRegisterRequest implements MakeRequestInterface
{
    public function createRequest()
    {
        return new RegisterRequest();
    }
}
