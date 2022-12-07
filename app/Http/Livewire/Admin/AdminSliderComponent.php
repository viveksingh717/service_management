<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;

class AdminSliderComponent extends Component
{
    public function render()
    {
        $sliders = Slider::where('status', 1)->get();

        return view('livewire.admin.slider-component', compact('sliders'))->layout('layouts.admin_layout');
    }

    public function deleteSlider($id)
    {
        $slideModel = Slider::find($id);

        if ($slideModel) {
            if ($slideModel['slider_image']) {
                unlink('assets/slide/'.$slideModel['slider_image']);
            }

            $slideModel->delete();

            session()->flash('message', "Slider deleted successfully");
        }else{
            session()->flash('message', "Something went wrong");
        }
    }
}
