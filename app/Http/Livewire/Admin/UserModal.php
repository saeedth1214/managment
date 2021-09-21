<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UserModal extends Component
{

    public function render()
    {
        return view('livewire.admin.user-modal');
    }
}
