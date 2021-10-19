<?php

namespace App\Http\Controllers;

use Shetabit\Payment\Facade\Payment;

use Shetabit\Multipay\Invoice;

class PaymentController
{
    public function payment()
    {
        $invoice=new Invoice();
        $invoice->amount(5000);
        $invoice->detail([
            'company_id'=>20,
            'package_id'=>18,
            'discount'=>5,
        ]);

        return Payment::purchase($invoice)->pay()->render();
    }
}
