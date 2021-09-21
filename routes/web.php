<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\TestHook;

// use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Livewire\Admin\TestHook;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$frontNameSpace = "App\Http\Controllers\Frontend";
$adminNameSpace = "App\Http\Livewire\Admin\\";

Route::group(['prefix' => "admin", 'namespace' => $adminNameSpace], function () {
    Route::get('dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('users', UserManagment::class)->name('admin.users');
});

Route::get('test/hooks', TestHook::class)->name('test.hooks');







// Route::view('/login', 'livewire.home');
//Route::get('/', function () {
//    return view('welcome');
//});
