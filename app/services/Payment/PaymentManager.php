<?php
namespace App\services\Payment;

use Shetabit\Multipay\Payment;
use Shetabit\Multipay\Invoice;
use App\Repositories\invoiceRepository;

class PaymentManager extends Payment
{
    public function purchase(Invoice $invoice = null, $finalizeCallback = null)
    {
        if ($invoice) { // create new invoice
            $this->invoice($invoice);
        }

        $this->driverInstance = $this->getFreshDriverInstance();

    
        //purchase the invoice
        $transactionId = $this->driverInstance->purchase();

        if ($finalizeCallback) {
            call_user_func_array($finalizeCallback, [$this->driverInstance, $transactionId]);
        }

        // dispatch event
        $this->dispatchEvent(
            'purchase',
            $this->driverInstance,
            $this->driverInstance->getInvoice()
        );

        return $this;
    }


    public function pay($initializeCallback = null)
    {
        if ($this->invoice->getAmount()<=0) {

            
            $invoiceData=$this->invoice->getDetails();
            $invoiceData=array_merge($invoiceData, [
                'status'=>1,
                "amount"=>0
            ]);


            $invoiceRepository=resolve(invoiceRepository::class);
            $invoiceRepository->create($invoiceData);

            return;
        }


        $this->driverInstance = $this->getDriverInstance();

        if ($initializeCallback) {
            call_user_func($initializeCallback, $this->driverInstance);
        }

        $this->validateInvoice();

        // dispatch event
        $this->dispatchEvent(
            'pay',
            $this->driverInstance,
            $this->driverInstance->getInvoice()
        );

        return $this->driverInstance->pay();
    }
}
