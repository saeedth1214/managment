<?php

namespace App\services\MakeRequest\Concreate;

use App\services\MakeRequest\Abstraction\MakeRequestInterface;
use App\services\MakeRequest\Drivers\LoginRequest;

class CreateLoginRequest implements MakeRequestInterface {

    public function createRequest()
    {
        return new LoginRequest();
    }

}

