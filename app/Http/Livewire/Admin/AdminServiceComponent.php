<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;

class AdminServiceComponent extends Component
{
    public function render()
    {
        $services = Service::where('status', 1)->get();

        return view('livewire.admin.admin-service-component', compact('services'))->layout('layouts.admin_layout');
    }

    public function deleteService($id)
    {
        $serviceModel = Service::find($id);

        if ($serviceModel) {
            if ($serviceModel['service_image']) {
                unlink('assets/services/'.$serviceModel['service_image']);
            }

            $serviceModel->delete();

            session()->flash('message', "Service deleted successfully");
        }else{
            session()->flash('message', "Something went wrong");
        }
    }
}
