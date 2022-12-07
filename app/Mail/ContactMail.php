<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable implements ShouldQueue
{
    public $contactModel;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contactModel)
    {
        $this->contactModel = $contactModel;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->contactModel['email'])->subject('User Feedback')->view('emails.contact')->with([
            'userName'=>$this->contactModel['name'],
            'userEmail'=>$this->contactModel['email'],
            'userMsg'=>$this->contactModel['msg'],
        ]);
    }
}
