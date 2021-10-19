<?php

namespace App\Http\Livewire\Admin\Alert;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Http\traits\message;
use Livewire\WithPagination;
use App\Repositories\alertRepository;
use App\Models\alert;
use App\Repositories\companyRepository;
use Illuminate\Validation\Rule;

class AlertManagment extends Component
{
    use message;
    use WithPagination;
    private $alertRepository;
    private $companyRepository;
    public $state=[];
    public $companies=[];
    public $alerts=[];
    public $alertToCompany=[];
    public $validateData=[];
    public $update=false;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'deleteConfimed',
        "createAlertToCompany"
    ];

    public function __construct()
    {
        parent::__construct(null);
        $this->alertRepository = resolve(alertRepository::class);
        $this->companyRepository = resolve(companyRepository::class);
    }
    public function mount ()
    {
        $this->companies=$this->companyRepository->getCompanyForCreateAlert();
        $this->alerts=$this->alertRepository->all();
    }
    public function setAlertToCompnay ()
    {
        $this->validateData=$this->validateAlertToCompany();
        $this->checkAlertIds();
    }

    public function createAlertToCompany()
    {

        $result=$this->companyRepository->setAlerts($this->validateData,$this->alertToCompany);
        $result ?
            $this->setMessage(__('public.createAlert'))
            : $this->setMessage(__('public.fialedMessage'), 'error');
        $this->resetFileds();
        $this->refresh();
    }

    public function checkAlertIds ()
    {
        if (empty($this->alertToCompany)) {
            $this->setMessage(__('public.setConfirmed'), 'warning');
        } else {
            $this->confirmedMessage(__('public.sureMessage'), 'setAlertToCompanyConfrim', 'warning');
        }
    }

    private function validateAlertToCompany()
    {
        return Validator::make($this->state,[
            'company_id'=>[
                'required',
                Rule::in(array_keys($this->companies))
            ],
            "delivered_at"=>"required"
        ])->validate();
    }
    public function create()
    {
        $validateData=$this->validateAlert();
        $result= $this->alertRepository->create($validateData);
        $result ?
            $this->setMessage(__('public.createAlert'))
            : $this->setMessage(__('public.fialedMessage'), 'error');
        $this->resetFileds();
        $this->refresh();
    }
    public function addAlertTocompany($alertId)
    {
        $result = $this->hasAlertId($alertId);

        $result ? $this->filterId($alertId) : $this->addToAlertsArray($alertId);
    }
    private function addToAlertsArray($alertId)
    {
        $this->alertToCompany[] = $alertId;
    }
    private function hasAlertId($alertId)
    {
        return in_array($alertId, $this->alertToCompany);
    }

    private function filterId( $alertId)
    {
        $this->alertToCompany = array_filter($this->alertToCompany, function ($id) use ($alertId) {
            return $alertId !== $id;
        });
    }
    private function refresh()
    {
        $this->mount();
        $this->render();
    }
    public function resetFileds()
    {
        $this->state = [];
        $this->alertToCompany=[];
        $this->dispatchBrowserEvent("resetDatePickerInput");
        $this->dispatchBrowserEvent( "checkFalse");
    }

    private function validateAlert()
    {
        return Validator::make($this->state, [

            'title'=>'required|string|max:255',
            'message'=>'required|string|max:255',
        ])->validate();
    }

    public function edit(alert $alert)
    {
        $this->state=$alert->toArray();
        $this->update=true;
    }

    public function update()
    {
        $validateData = $this->validateAlert();
        $result = $this->alertRepository->update($this->state['id'], $validateData);
        $result ?
            $this->setMessage(__('public.updateAlert'))
            : $this->setMessage(__('public.fialedMessage'), 'error');
        $this->resetFileds();
        $this->refresh();
    }

    public function deleteAlert($id)
    {
        $this->confirmedMessage(__('public.deleteConfirmed'), 'alertConfrim', 'warning',$id);
    }
    public function deleteConfimed($id)
    {
        // dd($id);
        $result=$this->alertRepository->delete($id);
        $result
        ?
            $this->setMessage(__("public.deleteAlert")) 
            : 
            $this->setMessage(__('public.fialedMessage'), 'error');
            $this->refresh();
    }
    public function render()
    {
        return view('livewire.admin.alert.alert-managment');
    }
}
