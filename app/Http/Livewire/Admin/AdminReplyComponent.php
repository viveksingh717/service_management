<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ContactUs;
use App\Models\AdminReply;
use App\Mail\Admin\AdminContactMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminReplyComponent extends Component
{
    public $email;
    public $contId;

    public $replyId;
    public $userEmail;
    public $msg;
    public $userName;


    public function mount($contId)
    {
        $contactModel = ContactUs::find($contId);
        $this->email = $contactModel->email;
        $this->userName = $contactModel->name;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [   
            'msg' => 'required',
        ]);
    }

    public function sendReply()
    {
        $this->validate([
            'msg' => 'required',
        ]);

        $adminReply = new AdminReply();

        $adminReply->replyId = Auth::user()->id;
        $adminReply->userEmail = $this->email;
        $adminReply->msg = $this->msg;

        if ($adminReply->save()) {
            session()->flash('message', "Reply has been sent");
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

            Mail::to($this->email)->send(new AdminContactMail($adminReply, $this->userName));

            $changeStatus = ContactUs::where('id', $this->contId);
            $changeStatus->update([
                'status'=>0,
            ]);

            // echo '<pre>';print_r($changeStatus);echo '</pre>'; exit();

            $this->msg = '';
        } else {
            session()->flash('message', "Somethingwent wrong");
        }
        
        
    }

    public function render()
    {
        return view('livewire.admin.admin-reply-component')->layout('layouts.admin_layout');
    }
}
