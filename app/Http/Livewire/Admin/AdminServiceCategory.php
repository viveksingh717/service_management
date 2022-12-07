<?php

namespace App\Http\Livewire\Admin;

use App\Models\SubCategory;
use Livewire\Component;

class AdminServiceCategory extends Component
{
    public function render()
    {
        $categories = SubCategory::orderBy('id', 'desc')->get();
        return view('livewire.admin.service-category', compact('categories'))->layout('layouts.admin_layout');
    }

    public function deleteCategory($id)
    {
        $categoryModel = SubCategory::find($id);

        if ($categoryModel) {
            if ($categoryModel['subCategory_image']) {
                unlink('assets/categories/'.$categoryModel['subCategory_image']);
            }

            $categoryModel->delete();

            session()->flash('message', "Category deleted successfully");
        }else{
            session()->flash('message', "Something went wrong");
        }
    }
}
