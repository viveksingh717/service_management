<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $slider_image;
    public $featured;
    public $status;

    public function updated($fields)
    {
        $this->validateOnly($fields, [   
            'title' => 'required',
            'slider_image' => 'required|mimes:jpg,jpeg,png',
        ]);
    }

    public function createSlider()
    {
        $this->validate([
            'title' => 'required',
            'slider_image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $sliderModel = new Slider();

        $sliderModel->title = $this->title;
        $sliderModel->description = $this->description;
        $sliderModel->featured = $this->featured;
        $sliderModel->status = $this->status;

        $fileName = time().'.'.$this->slider_image->extension();
        $this->slider_image->storeAs('slide', $fileName);
        $sliderModel->slider_image = $fileName;

        if ($sliderModel->save()) {
            // session()->flash('message', "New category has been added successfully.");
            return redirect('/admin/slider')->with('message','Slider added successfully');
        } else {
            // session()->flash('message', "Somethingwent wrong");
            return redirect('/admin/addSlider')->with('message','Somethingwent wrong');
        }
        
    }

    public function render()
    {
        return view('livewire.admin.add-slider-component')->layout('layouts.admin_layout');
    }
}
