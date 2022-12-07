<?php

namespace App\Http\Livewire\Service;

use Livewire\Component;

class ServiceComponent extends Component
{
    public function render()
    {
        return view('livewire.service.service-component')->layout('layouts.base_layout');
    }
}
