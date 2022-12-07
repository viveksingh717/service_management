<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminOrderDetail extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-order-detail')->layout('layouts.admin_layout');
    }
}
