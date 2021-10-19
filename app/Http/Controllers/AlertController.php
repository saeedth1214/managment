<?php

namespace App\Http\Controllers;

use App\services\MakeRequest\Facade\MakeRequestFacade;

class AlertController extends Controller
{
    public function index()
    {
        /**
         * 
         *
         * @var App\services\MakeRequest\Abstraction\BaseRequest $request
         */
        $request=MakeRequestFacade::createRequest();
        $request->ReceivePostRequest();

        
    }
}
