<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $allCategory = Category::get();
        $allSubCategory = SubCategory::get();

        return view('layouts.base_layout', compact('allCategory', 'allSubCategory'));
    }
}
