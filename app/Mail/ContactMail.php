<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $datalis;

    public function __construct($datalis)
    {
        $this->datalis=$datalis;

    }


    public function build()
    {
        return $this->subject('Contact Message')->view('email.contactMail');
    }
}
