<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChangeLocationComponent extends Component
{
    public $street_name;
    public $landmark;
    public $city;
    public $state;
    public $country;
    public $pincode;

    public function changeLocation()
    {
        session()->put('street_name', $this->street_name);
        session()->put('landmark', $this->landmark);
        session()->put('city', $this->city);
        session()->put('state', $this->state);
        session()->put('country', $this->country);
        session()->put('pincode', $this->pincode);

        $this->emitTo('location-component', 'refreshComponent');

        session()->flash('message', 'Location has been changed');
    }
    public function render()
    {
        return view('livewire.change-location-component')->layout('layouts.base_layout');
    }
}
