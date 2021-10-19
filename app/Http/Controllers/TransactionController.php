<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    
    public function store()
    {
        if (request()->filled('status') && request('status') == "OK") { }
         elseif (request()->filled('status') && request('status') == "NOK") { } 
         else { }
    }

}
