<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditServiceCategory extends Component
{
    use WithFileUploads;
    public $categoryId;
    public $parentCategory_id;
    public $subCategory_name;
    public $subCategory_slug;
    public $subCategory_image;
    public $subCategory_desc;
    public $newImage;

    public function mount($categoryId)
    {
        $getCategory = SubCategory::find($categoryId);

        $this->categoryId = $getCategory->id;
        $this->parentCategory_id = $getCategory->parentCategory_id;
        $this->subCategory_name = $getCategory->subCategory_name;
        $this->subCategory_slug = $getCategory->subCategory_slug;
        $this->subCategory_desc = $getCategory->subCategory_desc;
        $this->subCategory_image = $getCategory->subCategory_image;

    }

    public function generateSlug()
    {
        $this->subCategory_slug = Str::slug($this->subCategory_name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [   
            'parentCategory_id' => 'required',
            'subCategory_name' => 'required',
            'subCategory_slug' => 'required',
        ]);

        if ($this->newImage) {
            $this->validateOnly($fields, [   
                'newImage' => 'required|mimes:jpg,jpeg,png',
            ]);
        }
    }

    public function updateCategory()
    {
        $this->validate([
            'parentCategory_id' => 'required',
            'subCategory_name' => 'required',
            'subCategory_slug' => 'required',
        ]);

        if ($this->newImage) {
            $this->validate([
                'newImage' => 'required|mimes:jpg,jpeg,png',
            ]);
        }

        $getCategory = SubCategory::find($this->categoryId);

        $getCategory->parentCategory_id = $this->parentCategory_id;
        $getCategory->subCategory_name = $this->subCategory_name;
        $getCategory->subCategory_slug = $this->subCategory_slug;
        $getCategory->subCategory_desc = $this->subCategory_desc;

        if ($this->newImage) {
            unlink('assets/categories/'.$getCategory['subCategory_image']);
            $fileName = time().'.'.$this->newImage->extension();
            $this->newImage->storeAs('categories', $fileName);
            $getCategory->subCategory_image = $fileName;
        }

        if ($getCategory->save()) {
            session()->flash('message', "Category has been updated successfully.");
            // return redirect('/admin/category')->with('message','Category added successfully');
        } else {
            session()->flash('message', "Somethingwent wrong");
            // return redirect('/admin/add_category')->with('message','Somethingwent wrong');
        }
        
        
    }

    public function render()
    {
        $parentCategory = Category::get();
        return view('livewire.admin.edit-service-category', compact('parentCategory'))->layout('layouts.admin_layout');
    }
}
