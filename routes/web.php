<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\Home;
use App\Http\Livewire\TestComponent;

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


Route::get('test/component',TestComponent::class);

Route::group(['prefix' => "admin", 'namespace' => $adminNameSpace], function () {
    Route::get('dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('users', UserManagment::class)->name('admin.users');
    Route::get('packages', 'package\\'.PackageManagment::class)->name('admin.packages');
    Route::get('companies', 'company\\'.CompanyManagment::class)->name('admin.companies');
    Route::get('alerts', 'alert\\'.AlertManagment::class)->name('admin.alerts');
    Route::get('discounts', 'discount\\'.DiscountManagment::class)->name('admin.discounts');
    Route::get('invoices', 'invoice\\'.InvoiceManagment::class)->name('admin.invoices');
    Route::get('transactions', 'Transaction\\'.TransactionManagment::class)->name('admin.transactions');
    Route::get('devices', 'Device\\'.FetchDevicesManagment::class)->name('admin.devices');
    Route::get('company/{company}/packages', 'company\\'.CompanyPackages::class)->name('admin.company-packages');
    // test alert

    Route::get('test-alerts', [ AlertController::class,'index'])->name('test.alert-controller');
    Route::get('payment', [ PaymentController::class,'payment'])->name('admin.payment');
    Route::get('check', [ PaymentController::class,'check'])->name('admin.payment.check');
    Route::get('verify', [ PaymentController::class,'verify'])->name('admin.payment.verify');
    Route::get('transction/store', [ TransactionController::class,'store'])->name('admin.transaction.store');

    // filters
    Route::get('products',[ProductController::class,'index']);
    
    
});



