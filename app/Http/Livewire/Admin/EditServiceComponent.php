<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use App\Models\SubCategory;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditServiceComponent extends Component
{
    use WithFileUploads;
    public $service_id;
    public $category_id;
    public $service_name;
    public $service_slug ;
    public $tagline;
    public $description;
    public $price;
    public $discount;
    public $discount_type;
    public $service_image;
    public $thumbnail;
    public $inclusion;
    public $exclusion;
    public $newImage;
    public $newThumbnail;

    public function mount($service_id)
    {
        $getServices = Service::find($service_id);

        $this->service_id = $getServices->id;
        $this->category_id = $getServices->category_id;
        $this->service_name = $getServices->service_name;
        $this->service_slug = $getServices->service_slug;
        $this->tagline = $getServices->tagline;
        $this->description = $getServices->description;
        $this->price = $getServices->price;
        $this->discount = $getServices->discount;
        $this->discount_type = $getServices->discount_type;
        $this->service_image = $getServices->service_image;
        $this->thumbnail = $getServices->thumbnail;
        $this->inclusion = $getServices->inclusion;
        $this->exclusion = $getServices->exclusion;

    }

    public function generateSlug()
    {
        $this->service_slug = Str::slug($this->service_name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [   
            'category_id' => 'required',
            'service_name' => 'required',
            'service_slug' => 'required|unique:services',
            'price' => 'required',
            // 'service_image' => 'required|mimes:jpg,jpeg,png',
        ]);

        if ($this->newImage) {
            $this->validateOnly($fields, [   
                'newImage' => 'required|mimes:jpg,jpeg,png',
            ]);
        }

    }

    public function editServices()
    {
        $this->validate([
            'category_id' => 'required',
            'service_name' => 'required',
            'service_slug' => 'required|unique:services',
            'price' => 'required',
            // 'service_image' => 'required|mimes:jpg,jpeg,png',
        ]);

        if ($this->newImage) {
            $this->validate([
                'newImage' => 'required|mimes:jpg,jpeg,png',
            ]);
        }

        $serviceModel = Service::find($this->service_id);

        $serviceModel->category_id = $this->category_id;
        $serviceModel->service_name = $this->service_name;
        $serviceModel->service_slug = $this->service_slug;
        $serviceModel->tagline = $this->tagline;
        $serviceModel->description = $this->description;
        $serviceModel->price = $this->price;
        $serviceModel->discount = $this->discount;
        $serviceModel->discount_type = $this->discount_type;
        $serviceModel->inclusion = str_replace("\n", '|', trim($this->inclusion));
        $serviceModel->exclusion = str_replace("\n", '|', trim($this->exclusion));

        if ($this->newImage) {
            unlink('assets/services/'.$serviceModel->service_image);
            $fileName = time().'.'.$this->service_image->extension();
            $this->service_image->storeAs('services', $fileName);
            $serviceModel->service_image = $fileName;
        }

        if ($this->newThumbnail) {
            unlink('assets/thumbnails/'.$serviceModel->thumbnail);
            $fileName = time().'.'.$this->thumbnail->extension();
            $this->thumbnail->storeAs('thumbnails', $fileName);
            $serviceModel->thumbnail = $fileName;
        }
    

        if ($serviceModel->save()) {
            // session()->flash('message', "New category has been added successfully.");
            return redirect('/admin/services')->with('message','Service updated successfully');
        } else {
            // session()->flash('message', "Somethingwent wrong");
            return redirect('/admin/addServices')->with('message','Somethingwent wrong');
        }
        
        
    }

    public function render()
    {
        $allCategory = SubCategory::where('status', 1)->get();

        return view('livewire.admin.edit-service-component', compact('allCategory'))->layout('layouts.admin_layout');
    }
}
