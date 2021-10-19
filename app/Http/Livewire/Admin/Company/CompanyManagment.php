<?php

namespace App\Http\Livewire\Admin\Company;

use Livewire\Component;
use App\Http\traits\message;
use App\Repositories\companyRepository;
use App\Widgets\dbStatus;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Repositories\UserRepository;
use App\Models\company;

class CompanyManagment extends Component
{
    use message;
    // use WithPagination;
    private $companyRepository;
    private $userRepository;
    public $state = [];
    public $message ='';
    public $updateCompany = false;
    public $deletedIds = [];
    public $companyMessage=null;
    protected $paginationTheme = 'bootstrap';
    public $db_status=[];
    protected $listeners = [
        'deleteConfimed',
        'deleteCompany',
        "activeCompany"
    ];

    public function __construct()
    {
        parent::__construct(null);

        $this->companyRepository = resolve(companyRepository::class);
        $this->userRepository=resolve(UserRepository::class);
        $this->db_status=dbStatus::DB_STATUS;
    }

    
    public function mount()
    {
        $this->users=$this->userRepository->getUserForCreateCompany();
        $this->companies=$this->companyRepository->all();
        $this->resetFileds();
    }

    public function create()
    {
        $validateData = $this->validateCompany();
        $result = $this->companyRepository->create($validateData);
        $result ?
            $this->setMessage(__('public.createCompany'))
            : $this->setMessage(__('public.fialedMessage'), 'error');
        $this->resetFileds();
        $this->refresh();
    }
    
    public function addTodelete($companyId)
    {
        $result = $this->hasPackageid($companyId);

        $result ? $this->filterId($companyId) : $this->addToDeletedArray($companyId);
    }
    private function addToDeletedArray($companyId)
    {
        $this->deletedIds[] = $companyId;
    }
    private function hasPackageid($companyId)
    {
        return in_array($companyId, $this->deletedIds);
    }

    private function filterId($companyId)
    {
        $this->deletedIds = array_filter($this->deletedIds, function ($id) use ($companyId) {
            return $companyId !== $id;
        });
    }
    public function deleteConfimed()
    {
        if (empty($this->deletedIds)) {
            $this->setMessage(__('public.deleteConfirmed'), 'warning');
        } else {
            $this->confirmedMessage(__('public.sureMessage'), 'companyConfrim', 'warning');
        }
    }
    public function deleteCompany()
    {
        $result = $this->companyRepository->delete($this->deletedIds);
        $result
            ?
            $this->setMessage(__('public.deleteCompany'), 'success')
            : $this->setMessage(__('public.fialedMessage'), 'error');
        $this->resetFileds();
        $this->refresh();
    }
    private function refresh()
    {
        $this->mount();
    }
    public function resetFileds()
    {
        $this->state = [
            'db_status' => 0,
        ];
        count($this->users) > 0 ?
        $this->state['user_id']=array_keys($this->users)[0]
        :null;
        count($this->db_status) > 0 ?
        $this->state['db_status'] = array_keys($this->db_status)[0]
        : null;
        $this->dispatchBrowserEvent('resetDatePickerInput');
    }

    private function validateCompany()
    {
        return Validator::make($this->state, [

            'name' => 'required|string|max:255',
            "user_id"=>[
                'required',
                Rule::in(array_keys($this->users)),
            ],
            'database' => 'required|string|max:255',
            'db_status' => [
                'required',
                Rule::in(array_keys($this->db_status)),
            ],
            "activation_at" => 'required',
        ])->validate();
    }


    public function activeCompany($companyId)
    {
        $result = $this->companyRepository->activeCompany($companyId);
        $result
            ?
            $this->setMessage(__('public.activeCompany'))
            : $this->setMessage(__('public.fialedMessage'), 'error');
    }

    public function edit(company $company)
    {
        $this->state=$company->toArray();
        $this->updateCompany=true;
    }

    public function update()
    {
        $validateData = $this->validateCompany();
        $result = $this->companyRepository->update($this->state['id'], $validateData);
        $result ?
            $this->setMessage(__('public.updateCompany'))
            : $this->setMessage(__('public.fialedMessage'), 'error');
        $this->refresh();
    }

    public function showMessage($companyId)
    {
        $this->companyMessage=$this->companyRepository->getMessage($companyId);
        $this->emit("setAlerts",$this->companyMessage,$companyId);
    }
    public function render()
    {
        return view('livewire.admin.company.company-managment');
    }
}
