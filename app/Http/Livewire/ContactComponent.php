<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use Livewire\Component;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $msg;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name'=>'required',
            'email'=>'required|email',
            'msg'=>'required',
        ]);
    }

    public function sendMail()
    {
        $this->validate([
            'name'=>'required',
            'email'=>'required|email',
            'msg'=>'required',
        ]);

        $contactModel = new ContactUs();

        $contactModel->name = $this->name;
        $contactModel->email = $this->email;
        $contactModel->phone = $this->phone;
        $contactModel->msg = $this->msg;

        if ($contactModel->save()) {
            session()->flash('message', 'Thankyou! your message has been sent, we will get back to you');

            // Mail::send('emails.contact', $contactModel, function ($message) {
            //     $message->from($this->email, $this->name);
            //     $message->sender($this->email, $this->name);
            //     $message->to('vs4092344@gmail.com', 'Vivek-Admin');
            //     // $message->cc('john@johndoe.com', 'John Doe');
            //     // $message->bcc('john@johndoe.com', 'John Doe');
            //     // $message->replyTo('john@johndoe.com', 'John Doe');
            //     $message->subject('Feedback');
            //     // $message->priority(3);
            //     // $message->attach('pathToFile');
            // });

            Mail::to('vs4092344@gmail.com')->send(new ContactMail($contactModel));

            $this->name = '';
            $this->email = '';
            $this->phone = '';
            $this->msg = '';
        }else{
            return redirect()->back();
        }

        
    }

    public function render()
    {
        return view('livewire.contact-component')->layout('layouts.base_layout');
    }
}
