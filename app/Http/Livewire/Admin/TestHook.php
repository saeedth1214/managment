<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class TestHook extends Component
{
    public $email;
    public $password;


    // public $state=[];

    protected $rules=[
        'email' => 'required|email',
        'password' => 'required|min:10',
    ];


    public function login()
    {
        $this->validate();

        // Validator::make($this->state,[

        //     'email'=>'required|email',
        //     'password'=>'required|min:10',
        // ])->validate();
        dd($this->state);
    }

    public function render()
    {
        return view('livewire.admin.test-hook');
    }
}
