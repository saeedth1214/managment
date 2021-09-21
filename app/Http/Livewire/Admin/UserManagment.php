<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Repositories\UserRepository;
use Livewire\WithPagination;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserManagment extends Component
{
    use WithPagination;

    public $state=[];
    public $listeners=[
        'delete'=>'deleteUser',
        "refresh",
    ];

    protected $paginationTheme = 'bootstrap';

    public function refresh()
    {
        $this->mount();
        $this->render();
    }

    public function edit(User $user)
    {
        $this->emit('edit', $user);
    }

    public function deleteConfrimed($userId)
    {

        // dd($userId);
        $this->dispatchBrowserEvent('swal:confrim', [
            'type' => 'warning',
            'message' => 'آیا مطمعن هستید؟',
            'id'=>$userId
        ]);
    }
    public function deleteUser($id)
    {
        $user=User::query()->find($id);
        $user->delete();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'یک کاربر با موفقیت حذف شد',
        ]);
    }
    public function render()
    {
        return view('livewire.admin.user-managment', ['users'=>User::paginate(3)]);
    }
}
