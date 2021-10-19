<?php

namespace App\Http\Livewire\Admin\Package;

use Livewire\Component;
use App\Repositories\packageRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\traits\message;
use App\Models\package;

class PackagePostForm extends Component
{
    use message;
    public $state=[];
    public $updatePackage=false;
    public $message='';
    private $packageRepository;
    protected $listeners=[
        'edit',
        "resetFileds"
    ];

    
    public function __construct()
    {
        parent::__construct(null);
        $this->packageRepository=resolve(packageRepository::class);
    }

    public function edit(package $package)
    {
        $this->state = $package->toArray();
        $this->updatePackage = true;
        $this->message = 'ویرایش با موفقیت انجام شد';
        $this->dispatchBrowserEvent('updatePackage');
    }


    public function update()
    {
        $validateData = $this->ValidatePackage();
        $result = $this->packageRepository->update($this->state['id'], $validateData);
        $result ?
              $this->setMessage($this->message)
            : $this->setMessage('مشکلی در روند ثبت به وجود امد', 'error');
        $this->dispatchBrowserEvent('closePackage');
        $this->refresh();
    }

    public function create()
    {
        $validateData=$this->ValidatePackage();
        $result=$this->packageRepository->create($validateData);
        $result ?
            $this->setMessage('پکیج با موفقیت ثبت شد')
            :
            $this->setMessage('مشکلی در روند ثبت به وجود امد', 'error');
        $this->dispatchBrowserEvent('closePackage');
        $this->refresh();
    }

    private function refresh()
    {
        $this->resetFileds();
        $this->emit('refreshParent');
    }

    public function resetFileds()
    {
        $this->state = [];
        $this->updatePackage = false;
    }


    private function ValidatePackage()
    {
        return Validator::make($this->state, [
                'package_name'=>"required|max:255",
                'persons'=>"required|integer|min:1",
                'shifts'=> "required|integer|min:1",
                'traffics'=> "required|integer|min:1",
                'turn_shift_groups'=> "required|integer|min:1",
                'max_salary_month'=> "required|integer|min:1000",
                'locations'=> "required|integer|min:1",
                'price'=> "required|integer|min:1000",
                'duration'=> "required|integer|min:1",
                'discount'=> "required|integer|min:1",
                'sms_charge'=> "required|integer|min:1000",
            ])->validate();
    }
    public function render()
    {
        return view('livewire.admin.package.package-post-form');
    }
}
