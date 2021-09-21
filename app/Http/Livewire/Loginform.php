<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Loginform extends Component
{
    public $email;
    public $password;
    public $fullname;
    public $address;
    public $phone;
    public $mobilePhone;
    public $companyName;
    public $password_confirmation;


    public $registerUser=false;

    public function render()
    {
        return view('livewire.loginform');
    }
    public function resetFields()
    {
        $this->email="";
        $this->password="";
        $this->fullname="";
        $this->phone="";
        $this->mobilePhone="";
        $this->companyName="";
        $this->password_confirmation="";
    }
    public function login()
    {
        $this->validate([
            'email'=>"required|email",
            'password'=>"required",
        ]);
        try {
            $res = auth()->attempt(['email' => $this->email, 'password' => $this->password]);
            if ($res) {
                $this->resetFields();
                return back()->with('userLoggedInSuccess', __('auth.userLoggedInSuccess'));
                session()->flash('message', "you are logged in .");
            } else {
                $this->resetFields();
                return back()->with('userLoggedInFailed', __('auth.userLoggedInFailed'));
                session()->flash('error', "email or password are wrong");
            }
        } catch (\Throwable $th) {
            return back()->with('userLoggedInFailed', __('auth.userLoggedInFailed'));
        }
    }

    public function register()
    {
        $this->email="";
        $this->password="";
        $this->registerUser=!$this->registerUser;
    }

    public function registerStore()
    {
        $this->validate([
            'fullname'=>"required|min:3|max:120",
            'email'=> "required|email|unique:users",
            'companyName'=> "required|max:120",
            'password'=> "required|confirmed",
            'phone'=> "required|regex:/(09)[0-9]{9}/",
            'mobilePhone'=>"required|regex:/(09)[0-9]{9}/",
        ]);


        $userDate=[
            'full_name'=>$this->fullname,
            'email'=>$this->email,
            'mobile'=>$this->mobilePhone,
            'phone'=>$this->phone,
            'password'=>$this->password,
            'company_name'=>$this->companyName,
        ];

        try {
            $user = User::query()->create($userDate);

            if ($user instanceof User) {
                $this->resetFields();
                return back()->with('userRegistredSuccess', __('auth.userRegistredSuccess'));
            // session()->flash('message', 'Your register successfully Go to the login page.');
            } else {
                return back()->with('userRegistredFailed', __('auth.userRegistredFailed'));
                session()->flash('error', 'Your register was failed please try again');
            }
        } catch (\Throwable $th) {
            return back()->with('userRegistredFailed', __('auth.userRegistredFailed'));
        }
    }
}
