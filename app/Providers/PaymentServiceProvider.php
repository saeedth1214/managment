<?php

namespace App\Providers;

use App\services\Payment\PaymentManager as Payment;
use Illuminate\Support\ServiceProvider;
use Shetabit\Payment\Events\InvoicePurchasedEvent;
use Shetabit\Payment\Events\InvoiceVerifiedEvent;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Bind to service container.
         */
        $this->app->bind('shetabit-payment', function () {
            $config = config('payment') ?? [];

            return new Payment($config);
        });

        $this->registerEvents();

        // use blade to render redirection form
        Payment::setRedirectionFormViewRenderer(function ($view, $action, $inputs, $method) {
            return view('shetabitPayment::redirectForm')->with(
                [
                    'action' => $action,
                    'inputs' => $inputs,
                    'method' => $method,
                ]
            );
        });
    }

    /**
     * Register Laravel events.
     *
     * @return void
     */
    public function registerEvents()
    {
        Payment::addPurchaseListener(function ($driver, $invoice) {
            event(new InvoicePurchasedEvent($driver, $invoice));
        });

        Payment::addVerifyListener(function ($reciept, $driver, $invoice) {
            event(new InvoiceVerifiedEvent($reciept, $driver, $invoice));
        });
    }
}
