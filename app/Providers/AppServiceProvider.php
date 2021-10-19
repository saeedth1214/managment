<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\services\Filter\FilterManagement;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(app_path()."\services\MakeRequest\Drivers"."/route_request.php", 'request');


    }
    public function boot()
    {

    }
}
