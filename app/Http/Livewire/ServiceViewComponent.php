<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use App\Models\SubCategory;

class ServiceViewComponent extends Component
{
    public $category_slug;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
    }

    public function render()
    {
        $category = SubCategory::where(['subCategory_slug'=>$this->category_slug])->first();

        $allServices = Service::where(['category_id'=>$category['id']])->get();
        return view('livewire.service-view-component', compact('category', 'allServices'))->layout('layouts.base_layout');
    }
}
