<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\Slider;
use App\Models\SubCategory;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $serviceCategory = SubCategory::where('status', 1)->inRandomOrder()->get();
        $services = Service::where('status', 1)->take(4)->inRandomOrder()->get();
        $servicesdivercity = Service::where('status', 1)->take(8)->inRandomOrder()->get();

        $sid = SubCategory::whereIn('subCategory_slug', ['ac', 'tv', 'appliances', 'pest_control', 'cars_bikes'])->get()->pluck('id');

        $filterServices = Service::whereIn('id', $sid)->inRandomOrder()->take(5)->get();

        $sliders = Slider::where('status', 1)->get();

        return view('livewire.home-component', compact('serviceCategory', 'services','servicesdivercity', 'filterServices', 'sliders'))->layout('layouts.base_layout');
    }
}
