<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class ModalUsersFiltro extends Component
{
    public function render()
    {   
        $user = new User();
        return view('livewire.modal-users-filtro', [
            'users' => $user->scopeUsersModal()
        ]);
    }
}
