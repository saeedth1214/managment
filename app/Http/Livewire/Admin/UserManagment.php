<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Repositories\UserRepository;
use Livewire\WithPagination;
use App\Models\User;
use App\Http\traits\message;

class UserManagment extends Component
{
    use WithPagination;
    use message;
    public $state=[];
    public $users=[];
    private $userRepository;
    public $listeners=[
        'delete'=>'deleteUser',
        "refresh",
        "activeUser"
    ];

    public function __construct()
    {
        parent::__construct(null);
        $this->userRepository=resolve(UserRepository::class);
    }
    protected $paginationTheme = 'bootstrap';
    public function mount ()
    {
        $this->users=$this->userRepository->all()->toArray();

    }

    public function refresh()
    {
        $this->mount();
    }

    public function edit(User $user)
    {
        $this->emit('edit', $user);
    }

    public function deleteConfrimed($userId)
    {
        $this->dispatchBrowserEvent('swal:userConfrim', [
            'type' => 'warning',
            'message' => __( 'public.sureMessage'),
            'id'=>$userId
        ]);

    }
    public function deleteUser($id)
    {
        $user=User::query()->find($id);
        $user->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => __( 'public.deleteUser'),
        ]);
        $this->mount();
    }
    public function activeUser($userId)
    {
        $result=$this->userRepository->activeUser($userId);
        $result
        ?
            $this->setMessage(__('public.activeUser'))
        :
            $this->setMessage(__('public.failedMessage'),'error');
    }
    public function render()
    {
        return view('livewire.admin.user-managment');
    }
}
