<?php

use App\services\MakeRequest\Concreate\CreateLoginRequest;
use App\services\MakeRequest\Concreate\CreateRegisterRequest;
use App\services\MakeRequest\Concreate\CreateLogoutRequest;
use App\services\MakeRequest\Concreate\CreateReceiverPost;

return [
    "login" => [
        'class' => CreateLoginRequest::class
    ],
    'register' => [
        'class' => CreateRegisterRequest::class,
    ],
    'logout' => [
        'class' => CreateLogoutRequest::class,
    ],
    'posts'=>[
        'class'=>CreateReceiverPost::class,
    ]
];
