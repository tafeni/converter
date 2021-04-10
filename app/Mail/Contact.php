<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;


    public $email,$name,$msg,$subject;

    public function __construct($name,$email,$msg,$subject)
    {
        $this->email = $email;
        $this->name = $name;
        $this->msg = $msg;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject($this->subject)
            ->from($this->email, $this->name)
            ->view('email.contact');
    }
}
