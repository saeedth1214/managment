<?php

namespace App\services\MakeRequest\Concreate;

use App\services\MakeRequest\Abstraction\MakeRequestInterface;
use App\services\MakeRequest\Drivers\ReceiverPost;

class CreateReceiverPost implements MakeRequestInterface
{
    public function createRequest()
    {
        return new ReceiverPost();
    }
}
