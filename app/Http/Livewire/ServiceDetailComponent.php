<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\SubCategory;
use Livewire\Component;

class ServiceDetailComponent extends Component
{
    public $service_slug;

    public function mount($service_slug)
    {
        $this->service_slug = $service_slug;
    }

    public function render()
    {
        $serviceDetails =  Service::where(['service_slug'=>$this->service_slug])->first();
        $relatedService =  Service::where('category_id', $serviceDetails['sub_category']['id'])->where('service_slug', '!=', $this->service_slug)->inRandomOrder()->first();

        return view('livewire.service-detail-component', compact('serviceDetails', 'relatedService'))->layout('layouts.base_layout');
    }
}
