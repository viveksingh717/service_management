<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class CategoryComponent extends Component
{
    public function render()
    {
        $getCategory = Category::get();
        $getSubCategory = SubCategory::get();

        return view('livewire.category-component', compact('getSubCategory', 'getCategory'))->layout('layouts.base_layout');
    }
}
