<?php

namespace App\Http\Livewire\Admin\Invoice;

use Livewire\Component;
use App\Repositories\companyRepository;
use App\Repositories\packageRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Repositories\invoiceRepository;
use App\Http\traits\message;
use App\Widgets\InvoiceStatus;
use App\Models\invoice;
use App\Rules\InvoiceUniqueKeys;

class InvoiceManagment extends Component
{
    use message;
    private $companyRepository;
    private $packageRepository;
    private $invoiceRepository;
    public $companies=[];
    public $packages=[];
    public $state=[];
    public $invoices=[];
    public $deletedIds=[];
    public $updateInvoice=false;

    public $status=[];


    protected $listeners=[
        'deleteInvoices'
    ];

    public function __construct()
    {
        parent::__construct(null);
        $this->companyRepository=resolve(companyRepository::class);
        $this->invoiceRepository=resolve(invoiceRepository::class);
        $this->packageRepository=resolve(packageRepository::class);
        $this->status=InvoiceStatus::STATUS;
    }

    public function mount()
    {
        $this->companies=$this->companyRepository->companyNameForInvoice();
        $this->packages=$this->packageRepository->packageNameForInvoice();
        $this->invoices=$this->invoiceRepository->all();
        $this->resetFields();
    }

    public function resetFields()
    {
        count($this->companies) >0
        ?
        $this->state['company_id']= array_keys($this->companies)[0]
        :null;

        count($this->packages) > 0
            ?
            $this->state['package_id'] = array_keys($this->packages)[0]
            : null;
        count($this->status) > 0
            ?
            $this->state['status'] = array_keys($this->status)[0]
            : null;

            $this->state['discount']="";
            $this->state['amount']="";

    }
    public function refresh()
    {
        $this->mount();
    }
    public function create()
    {
        $validateData=$this->validateCreateInvoive();

        $result=$this->invoiceRepository->create($validateData);
        $result ?
        $this->setMessage(__('public.createInvoice')):
        $this->setMessage(__('public.failedMessage'), 'error');
        $this->refresh();
    }
    public function validateCreateInvoive()
    {
        return Validator::make($this->state, [
            'company_id'=>[
                'required',
                $this->updateInvoice
                ?
                new InvoiceUniqueKeys('package_id',$this->state['package_id'],$this->state['id'])
                :
                new InvoiceUniqueKeys('package_id', $this->state['package_id']),

                Rule::in(array_keys($this->companies))
            ],
            'package_id' => [
                'required',
                $this->updateInvoice
                ?
                new InvoiceUniqueKeys('company_id',$this->state['company_id'],$this->state['id'])
                :
                new InvoiceUniqueKeys('company_id',$this->state['company_id']),
                Rule::in(array_keys($this->packages))
            ],
            'amount' => [
                'required',
                'integer',
                "min:1000",
            ],
            'discount' => [
                'required',
                'integer',
                "min:1",
                "max:100",
            ],
            'status'=>[
                    'required',
                    Rule::in(array_keys($this->status))
            ]
        ])->validate();
    }
    public function addTodelete($invoiceId)
    {
        $result = $this->hasPackageid($invoiceId);

        $result ? $this->filterId($invoiceId) : $this->addToDeletedArray($invoiceId);
    }
    private function addToDeletedArray($invoiceId)
    {
        $this->deletedIds[] = $invoiceId;
    }
    private function hasPackageid($invoiceId)
    {
        return in_array($invoiceId, $this->deletedIds);
    }

    private function filterId($invoiceId)
    {
        $this->deletedIds = array_filter($this->deletedIds, function ($id) use ($invoiceId) {
            return $invoiceId !== $id;
        });
    }
    public function deleteConfimed()
    {
        if (empty($this->deletedIds)) {
            $this->setMessage(__('public.deleteConfirmed'), 'warning');
        } else {
            $this->confirmedMessage(__('public.sureMessage'), 'invoiceConfrim', 'warning');
        }
    }
    public function deleteInvoices()
    {
        $result = $this->invoiceRepository->delete($this->deletedIds);
        $result
            ?
            $this->setMessage(__('public.deleteInvoice'), 'success')
            : $this->setMessage(__('public.failedMessage'), 'error');
        $this->resetFields();
        $this->refresh();
    }

    public function edit(invoice $invoice)
    {
        $this->state=$invoice->toArray();
        $this->updateInvoice=true;
    }

    public function update()
    {
        $validateData = $this->validateCreateInvoive();
        $result = $this->invoiceRepository->update($this->state['id'], $validateData);
        // dd($result);
        $result ?
            $this->setMessage(__('public.updateInvoice'), 'success')
            : $this->setMessage(__('public.failedMessage'), 'error');
        $this->refresh();
    }

    public function render()
    {
        return view('livewire.admin.invoice.invoice-managment');
    }
}
