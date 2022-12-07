<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use App\Models\SubCategory;
use Livewire\Component;

class ServicesByCategoryComponent extends Component
{
    public $category_slug;
    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
    }

    public function render()
    {
        $category = SubCategory::where('subCategory_slug', $this->category_slug)->first();

        $services = Service::where('category_id', $category['id'])->get();
        return view('livewire.admin.services-by-category-component', compact('category', 'services'))->layout('layouts.admin_layout');
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
