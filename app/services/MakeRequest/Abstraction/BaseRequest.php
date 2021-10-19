<?php

namespace App\services\MakeRequest\Abstraction;

use GuzzleHttp\Client;

abstract class BaseRequest
{
    private $client=null;
    protected $params = [];
    protected $response;

    protected function ClientInstance()
    {
        if (!is_null($this->client)) {
            return $this->client;
        }
        return new Client();
    }
    abstract public function success($response);
    abstract public function failed($error);
}
