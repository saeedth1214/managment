<?php

namespace App\Http\Livewire\Admin\Package;

use Livewire\Component;
use App\Repositories\packageRepository;
use App\Repositories\companyRepository;

class CreatePackageToCompany extends Component
{
    private $packageRepository;
    private $companyRepository;
    public $state=[];


    public function __construct()
    {
        parent::__construct();
        $this->packageRepository=resolve(packageRepository::class);
        $this->companyRepository=resolve(companyRepository::class);
    }


    public function mount()
    {

        $this->packages = $this->packageRepository->all();
        $this->companies = $this->companyRepository->getCompanyForPackages();
    }


    public function createPackageForCompany ()
    {
        dd($this->state);
    }
    public function render()
    {
        $this->dispatchBrowserEvent('rendering');
        return view('livewire.admin.package.create-package-to-company');
    }
}
