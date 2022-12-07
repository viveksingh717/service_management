<?php

namespace App\Http\Livewire\Admin;

use App\Models\ContactUs;
use Livewire\Component;

class AdminContactComponent extends Component
{
    public function render()
    {
        $allContact = ContactUs::where('status', 1)->orderBy('id', 'desc')->get();

        return view('livewire.admin.admin-contact-component', compact('allContact'))->layout('layouts.admin_layout');
    }

    public function deleteContact($id)
    {
        $contactModel = ContactUs::find($id);

        if ($contactModel) {            
            $contactModel->delete();
            session()->flash('message', "Contact deleted successfully");
        }else{
            session()->flash('message', "Something went wrong");
        }
    }
}
