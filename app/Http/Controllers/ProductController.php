<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\Filter\Builder\QueryBuilder;
use App\Models\User;
use App\Models\company;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $result=QueryBuilder::for(user::class, $request)
        // ->allowedJoin('companies','users.id','companies.user_id')
        ->allowedFilter('active')
        ->allowedInclude('company')
        ->allowedWithCount('company')
        ->SelectResult('companies.database','full_name','email','active')
        ->GetResult();

        dd($result);
    }
}
