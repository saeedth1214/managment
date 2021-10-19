<?php

namespace App\Http\Livewire\Admin\Device;

use Livewire\Component;
use App\Repositories\deviceRepository;
use App\Repositories\companyRepository;
use App\Widgets\deviceName;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\traits\message;
use App\Models\fetch_device;
use App\Rules\DeviceUniqueKeys;

class FetchDevicesManagment extends Component
{
    use message;
    public $state=[];
    private $deviceRepository;
    private $companyRepository;
    public $companies=[];
    public $devices=[];
    public $fetchdevices=[];

    public $deleteIds=[];

    public $updateDevice=false;

    protected $listeners=[

        "deleteDeviecs"
    ];
    public function __construct()
    {
        parent::__construct(null);
        $this->deviceRepository=resolve(deviceRepository::class);
        $this->companyRepository=resolve(companyRepository::class);
    }

    public function mount()
    {
        $this->devices=deviceName::DEVICES;
        $this->companies=$this->companyRepository->companyNameForfetchDevice();
        $this->fetchdevices =$this->deviceRepository->all();
        $this->resetFileds();
    }


    public function deleteConfimed()
    {
        if (empty($this->deleteIds)) {
            $this->setMessage(__('public.deleteConfirmed'), 'warning');
        } else {
            $this->confirmedMessage(__('public.sureMessage'), 'deviceConfrim', 'warning');
        }
    }


    public function edit(fetch_device $device)
    {
        $this->state= $device->toArray();
        $this->state['device_id'] = array_search($this->state['device_id'], $this->devices);
        $this->state['last_request_at'] ='';

        $this->updateDevice=true;
    }

    public function update()
    {
        $validateData=$this->validateCreateDevice();   
        $result= $this->deviceRepository->update($this->state['id'], $validateData);
        $result
        ?
        $this->setMessage(__('public.updateInvoice'))
        :
        $this->setMessage(__('public.failedMessage'), 'error');

        $this->resetFileds();
        $this->refresh();
    }
    public function deleteDeviecs()
    {
        $result = $this->deviceRepository->delete($this->deleteIds);
        $result
            ?
            $this->setMessage(__('public.deleteInvoice'), 'success')
            : $this->setMessage(__('public.failedMessage'), 'error');
        $this->refresh();
    }
    public function addTodelete($deviceId)
    {
        $result = $this->hasDeveiceId($deviceId);

        $result ? $this->filterId($deviceId) : $this->addToDeletedArray($deviceId);
    }
    private function addToDeletedArray($deviceId)
    {
        $this->deleteIds[] = $deviceId;
    }
    private function hasDeveiceId($deviceId)
    {
        return in_array($deviceId, $this->deleteIds);
    }

    private function filterId($deviceId)
    {
        $this->deleteIds = array_filter($this->deleteIds, function ($id) use ($deviceId) {
            return $deviceId !== $id;
        });
    }

    public function create()
    {
        $validateData=$this->validateCreateDevice();
        $result=$this->deviceRepository->create($validateData);
        $result?
        $this->setMessage(__('public.createInvoice'))
        :
            $this->setMessage(__('public.failedMessage'), 'error');
        
        $this->resetFileds();
        $this->refresh();
    }
    public function refresh()
    {
        $this->mount();
    }
    public function resetFileds()
    {
        count($this->companies) >0
        ?
        $this->state['company_id']= array_keys($this->companies)[0]:null;

        count($this->devices) > 0
            ?
            $this->state['device_id'] = array_keys($this->devices)[0] : null;
            $this->updateDevice=false;
    }
    private function validateCreateDevice()
    {
        return Validator::make($this->state, [
            'company_id' =>[
                'required',
                $this->updateDevice
                ?
                new DeviceUniqueKeys('device_id', $this->state['device_id'], $this->state['id'])
                :
                new DeviceUniqueKeys('device_id', $this->state['device_id']),
                Rule::in(array_keys($this->companies)),
            ],
            'device_id' =>[
                'required',
                $this->updateDevice
                    ?
                    new DeviceUniqueKeys('company_id', $this->state['company_id'], $this->state['id'])
                    : new DeviceUniqueKeys('company_id', $this->state['company_id']),
                Rule::in(array_keys($this->devices)),
            ],
            'period'=>'required|integer|min:1',
            'last_request_at'=>'required'
        ])->validate();
    }
    public function render()
    {
        return view('livewire.admin.device.fetch-devices-management');
    }
}
