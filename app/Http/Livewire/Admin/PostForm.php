<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\traits\message;

class PostForm extends Component
{
    use message;
    private $userRepository;
    public $updateUser=false;


    public $state=[];
    public $userId;
    public $message;


    public $listeners=[
            'edit',
            "resetState"

        ];
    public function __construct()
    {
        parent::__construct();
        $this->userRepository=resolve(UserRepository::class);
    }

    public function edit($user)
    {
        $this->state=$user;
        $this->userId=$user['id'];
        $this->updateUser=true;
        $this->dispatchBrowserEvent('show-modal');
    }


    // reset state when modal hidden
    
    public function resetFileds()
    {
        $this->state=[];
        $this->updateUser=false;
    }

    public function update()
    {
        $validateData = Validator::make($this->state, [
            'full_name' => 'required|min:5|max:120',
            'email' => 'required|email|unique:users,email,'.$this->userId,
            'company_name' => 'required',
            'password' => 'required|confirmed|min:10|max:120',
            'password_confirmation' => 'required',
            'mobile' => [
                'required','unique:users,mobile,'.$this->userId
            ],
            'phone' => [
                'required',
                "unique:users,mobile,".$this->userId,
            ],
            'address' => 'required',
        ])->validate();
        $result = $this->userRepository->update($this->userId, $validateData);
        $this->dispatchBrowserEvent('closemodal');
        $result
            ?
            $this->setMessage(__('public.updateSuccessUser'))
            :
            $this->setMessage(__('public.failedMessage'), 'error');

        $this->message = "";
        // $this->updateUser =false;
        $this->emit('refresh');
    }

    public function resetState()
    {
        $this->state=[];
        $this->updateUser=false;
    }
    public function create()
    {
        $validateData=$this->validateUser();
        $this->userRepository=resolve(UserRepository::class);
        $result=$this->userRepository->create($validateData);

        $this->dispatchBrowserEvent('closemodal');
        $result
        ?
        $this->setMessage(__('public.createSuccessUser'))
        :
        $this->setMessage(__('public.failedMessage'),'error');
        $this->resetFileds();
        $this->emit('refresh');
    }
    public function validateUser()
    {
        return Validator::make($this->state, [
            'full_name' => 'required|min:5|max:120',
            'email' => 'required|email|unique:users',
            'company_name' => 'required',
            'password' => 'required|confirmed|min:10|max:120',
            'password_confirmation' => 'required',
            'mobile' => [
                'required', 'unique:users'
            ],
            'phone' => [
                'required',
                "unique:users",
            ],
            'address' => 'required',
        ])->validate();
    }
  
    public function render()
    {
        return view('livewire.admin.post-form');
    }
}
