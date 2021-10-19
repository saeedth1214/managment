<?php

namespace App\Http\Livewire\Admin\Discount;

use Livewire\Component;
use App\Http\traits\message;
use Livewire\WithPagination;
use App\Repositories\discountRepository;
use Illuminate\Support\Facades\Validator;

class DiscountManagment extends Component
{
    use message;
    use WithPagination;
    private $discountRepository;
    public $state=[];
    public $discounts=[];
    public $update=false;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'deleteConfimed'
    ];

    public function __construct()
    {
        parent::__construct(null);
        $this->discountRepository = resolve(discountRepository::class);
    }

    public function mount()
    {
        $this->discounts=$this->discountRepository->all();
        $this->resetFileds();
    }
    public function create()
    {
        $validateData=$this->validateDiscount();
        $result= $this->discountRepository->create($validateData);
        $result ?
            $this->setMessage(__('public.createDiscount'))
            : $this->setMessage(__('public.failedMessage'), 'error');
        $this->refresh();
    }

    private function refresh()
    {
        $this->mount();
    }
    public function resetFileds()
    {
        $this->state = [];
    }

    private function validateDiscount()
    {
        return Validator::make($this->state, [

            'code'=>'required|string|max:255',
            'percent'=>'required|integer|min:1|max:100',
            'max_use'=>'required|integer|min:1',
            "expires_at"=> 'required',

        ])->validate();
    }

    public function edit(alert $alert)
    {
        $this->state=$alert->toArray();
        $this->update=true;
    }

    public function update()
    {
        $validateData = $this->validateDiscount();
        $result = $this->discountRepository->update($this->state['id'], $validateData);
        $result ?
            $this->setMessage(__('public.updateDiscount'))
            : $this->setMessage(__('public.failedMessage'), 'error');
        $this->refresh();
    }

    public function deleteDiscount($id)
    {
        $this->confirmedMessage(__('public.sureMessage'), 'discountConfrim', 'warning', $id);
    }
    public function deleteConfimed($id)
    {
        $result=$this->discountRepository->delete($id);
        $result
        ?
            $this->setMessage(__('public.deleteDiscount'))
            :
            $this->setMessage(__('public.failedMessage'), 'error');
        $this->refresh();
    }
    public function render()
    {
        return view('livewire.admin.discount.discount-managment');
    }
}
