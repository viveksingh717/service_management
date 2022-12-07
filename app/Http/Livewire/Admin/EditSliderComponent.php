<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $slider_image;
    public $featured;
    public $status;
    public $newImage;

    public function mount($slide_id)
    {
        $getSlider = Slider::find($slide_id);

        $this->slide_id = $getSlider->id;
        $this->title = $getSlider->title;
        $this->description = $getSlider->description;
        $this->slider_image = $getSlider->slider_image;
        $this->featured = $getSlider->featured;
        $this->status = $getSlider->status;

    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [   
            'title' => 'required',
        ]);

        if ($this->newImage) {
            $this->validateOnly($fields, [   
                'newImage' => 'required|mimes:jpg,jpeg,png',
            ]);
        }
    }

    public function editSlider()
    {
        $this->validate([
            'title' => 'required',
        ]);

        if ($this->newImage) {
            $this->validate([
                'newImage' => 'required|mimes:jpg,jpeg,png',
            ]);
        }

        $sliderModel = Slider::find($this->slide_id);

        $sliderModel->title = $this->title;
        $sliderModel->description = $this->description;
        $sliderModel->featured = $this->featured;
        $sliderModel->status = $this->status;

        if ($this->newImage) {
            unlink('assets/slide/'.$sliderModel['slider_image']);
            $fileName = time().'.'.$this->newImage->extension();
            $this->newImage->storeAs('slide', $fileName);
            $sliderModel->slider_image = $fileName;
        }

        if ($sliderModel->save()) {
            // session()->flash('message', "New category has been added successfully.");
            return redirect('/admin/slider')->with('message','Slider updated successfully');
        } else {
            // session()->flash('message', "Somethingwent wrong");
            return redirect('/admin/addSlider')->with('message','Somethingwent wrong');
        }
        
    }


    public function render()
    {
        return view('livewire.admin.edit-slider-component')->layout('layouts.admin_layout');
    }
}
