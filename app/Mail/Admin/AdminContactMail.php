<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $adminReply;
    public $userName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($adminReply, $userName)
    {
        $this->adminReply = $adminReply;
        $this->userName = $userName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->subject('Admin Reply')->view('emails.admin_email.admin_contact')->with([
            'userName'=>$this->userName,
            'userEmail'=>$this->adminReply['email'],
            'adminMsg'=>$this->adminReply['msg'],
        ]);
    }
}
