<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddServiceCategory extends Component
{
    use WithFileUploads;
    public $parentCategory_id;
    public $subCategory_name;
    public $subCategory_slug;
    public $subCategory_image;
    public $subCategory_desc;

    public function generateSlug()
    {
        $this->subCategory_slug = Str::slug($this->subCategory_name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [   
            'parentCategory_id' => 'required',
            'subCategory_name' => 'required',
            'subCategory_slug' => 'required|unique:sub_categories',
            // 'subCategory_image' => 'required|mimes:jpg,jpeg,png',
        ]);
    }

    public function createCategory()
    {
        $this->validate([
            'parentCategory_id' => 'required',
            'subCategory_name' => 'required',
            'subCategory_slug' => 'required|unique:sub_categories',
            // 'subCategory_image' => 'required|mime:jpg,jpeg,png',
        ]);

        $categoryModel = new SubCategory();

        $categoryModel->parentCategory_id = $this->parentCategory_id;
        $categoryModel->subCategory_name = $this->subCategory_name;
        $categoryModel->subCategory_slug = $this->subCategory_slug;
        $categoryModel->subCategory_desc = $this->subCategory_desc;

        $fileName = time().'.'.$this->subCategory_image->extension();
        $this->subCategory_image->storeAs('categories', $fileName);
        $categoryModel->subCategory_image = $fileName;

        if ($categoryModel->save()) {
            // session()->flash('message', "New category has been added successfully.");
            return redirect('/admin/category')->with('message','Category added successfully');
        } else {
            // session()->flash('message', "Somethingwent wrong");
            return redirect('/admin/add_category')->with('message','Somethingwent wrong');
        }
        
        
    }

    public function render()
    {
        $parentCategory = Category::get();

        return view('livewire.admin.add-service-category', compact('parentCategory'))->layout('layouts.admin_layout');
    }
}
