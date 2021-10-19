<?php

namespace App\Http\Livewire\Admin\Company;

use Livewire\Component;
use App\Repositories\companyRepository;

class CompanyPackages extends Component
{
    private $companyRepository;
    public $company=null;
    public $package=[];
    public function __construct()
    {
        parent::__construct();
        $this->companyRepository=resolve(companyRepository::class);
    }
    public function mount()
    {
        $data=$this->companyRepository->getPackages(request()->company);
        $this->company=$data[0];
        $this->package=$data[1];
        // dd($this->package);
    }
    public function render()
    {
        return view('livewire.admin.company.company-packages');
    }
}
