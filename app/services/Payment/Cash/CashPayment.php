<?php

namespace App\services\Payment\Cash;

use Shetabit\Multipay\Abstracts\Driver;
use Shetabit\Multipay\RedirectionForm;
use Shetabit\Multipay\Contracts\ReceiptInterface;
use Shetabit\Multipay\Invoice;
use App\Repositories\invoiceRepository;

class CashPayment extends Driver
{

    protected $settings;

    public function __construct(Invoice $invoice, $settings=[])
    {
        $this->invoice($invoice);
        $this->settings=$settings;
    }

    public function purchase()
    {
        $invoiceData = $this->invoice->getDetails();
        $invoiceData = array_merge($invoiceData, [
            'status' => 4,
            "amount" => $this->invoice->getAmount()
        ]);

        $invoiceRepository = resolve(invoiceRepository::class);
        $invoiceRepository->create($invoiceData);

    }
    
    
    public function pay():RedirectionForm
    {
        return new RedirectionForm(route('admin.payment.check'), [], 'GET');
    }

    public function verify(): ReceiptInterface
    {
        return new CashVerify();
    }
}
