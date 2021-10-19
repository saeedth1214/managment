<?php

namespace App\Http\Livewire\Admin\Package;

use Livewire\Component;
use App\Repositories\packageRepository;
use App\Http\traits\message;
use App\Models\package;
use Livewire\WithPagination;
use App\Repositories\companyRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Rules\AfterLastDate;

class PackageManagment extends Component
{
    use message;
    use WithPagination;
    private $companyRepository;
    private $packageRepository;
    public $deletedIds=[];
    public $state=[];
    public $packages=[];
    public $updatePackage = false;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
            'refreshParent',
            'deletePackages',
            "activeSalary",
            "activeConnected"
        ];
    public $companies=[];


    public function __construct()
    {
        parent::__construct(null);
        $this->companyRepository = resolve(companyRepository::class);
        $this->packageRepository = resolve(packageRepository::class);
    }
    
    public function mount()
    {
        $this->packages=$this->packageRepository->all();
        $this->companies=$this->companyRepository->getCompanyForPackages();
        $this->resetFields();
    }


    public function resetFields()
    {
        $this->companies ?
        $this->state['company_id']= array_keys($this->companies)[0]
        :null;

        $this->packages->isNotEmpty() ?
            $this->state['package_id'] = array_values($this->packages->pluck('id')->toArray())[0]
            : null;
    }

    public function createPackageForCompany()
    {
        $validateData=$this->validatePackageForCompany();
        $result=$this->companyRepository->setPackagesForCompany($validateData);
        $result
        ?
        $this->setMessage(__('public.createCompany'))
        :
         $this->setMessage(__('public.failedMessage'), 'error');
        
        $this->refreshParent();
    }

    public function validatePackageForCompany()
    {
        return Validator::make($this->state, [
            'company_id'=>[
                'required',
                Rule::in(array_keys($this->companies)),
            ],
            'start_at'=>[
                'required',
                new AfterLastDate($this->state['company_id']),
            ],
            'end_at'=>[
                'required',
                new AfterLastDate($this->state['company_id']),

            ],
            'package_id'=>[
                "required",
                Rule::in(array_values($this->packages->pluck('id')->toArray())),
            ]
        ])->validate();
    }

    public function deletePackages()
    {
        $result=$this->packageRepository->delete($this->deletedIds);
        $result
        ?
        $this->setMessage(__( 'public.deletePackage'))
        :
        $this->setMessage(__('public.failedMessage'), 'error');

        $this->refreshParent();
    }
    public function refreshParent()
    {
        $this->mount();
        $this->dispatchBrowserEvent("resetDatePickerInput");
    }
    public function activeSalary($packageId)
    {
        $result = $this->packageRepository->activeSalary($packageId);
        $result
            ?
              $this->setMessage(__('public.activeSalary'))
            :
            $this->setMessage(__('public.failedMessage'), 'error');

        $this->refreshParent();
    }
    
    public function activeConnected($packageId)
    {
        $result = $this->packageRepository->activeOnlineConnect($packageId);
        $result
            ?
            $this->setMessage(__('public.activeConnect'))
            : $this->setMessage(__('public.failedMessage'), 'error');
             $this->refreshParent();
    }

    
    public function addTodelete($packageId)
    {
        $result=$this->hasPackageid($packageId);
        $result ? $this->filterId($packageId) : $this->addToDeletedArray($packageId);
    }
    private function addToDeletedArray($packageId)
    {
        $this->deletedIds[]=$packageId;
    }
    private function hasPackageid($packageId)
    {
        return in_array($packageId, $this->deletedIds);
    }

    private function filterId($packageId)
    {
        $this->deletedIds=array_filter($this->deletedIds, function ($id) use ($packageId) {
            return $packageId !== $id;
        });
    }

    public function editPackage(package $package)
    {
        $this->emit('edit', $package);
    }

    public function deleteConfimed()
    {
        if (empty($this->deletedIds)) {
            $this->setMessage(__( 'public.deleteConfirmed'), 'warning');
        } else {
            $this->confirmedMessage(__('public.sureMessage'), 'packageConfrim', 'warning');
        }
    }

    public function render()
    {
        return view('livewire.admin.package.package-managment');
    }
}
