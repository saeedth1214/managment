<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\services\Filter\FilterManagement;

class HasSpecialKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->method() == 'GET') {
            // FilterManagement::install($request);
        }
        return $next($request);
    }
}
