<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class UserComponent extends Component
{
    public function render()
    {
        return view('livewire.users.user-component')->layout('layouts.base_layout');
    }
}
