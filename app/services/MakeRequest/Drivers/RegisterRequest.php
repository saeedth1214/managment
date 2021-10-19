<?php
/**
 * Created by PhpStorm.
 * User: Saeedth1214
 * Date: 10/10/2021
 * Time: 10:32 AM
 */

namespace App\services\MakeRequest\Drivers;

use App\services\MakeRequest\Abstraction\BaseRequest;

class RegisterRequest extends BaseRequest
{
    protected $route= 'https://jsonplaceholder.typicode.com/posts';
    protected $method="POST";

    public function RegisterRequest(array $params)
    {
        try {
            $clientInstanse=$this->ClientInstance();
            $this->response = $clientInstanse->request($this->method, $this->route, $this->params);
            return $this->success($this->response);
        } catch (\GuzzleHttp\Exception\RequestException $error) {
            return $this->failed($error);
        }
    }

    public function success($response)
    {
        dd('send register request with status code '.$response->getStatusCode());
    }

    public function failed($error)
    {
        dd($error);
    }
}
