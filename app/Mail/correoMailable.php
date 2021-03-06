<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\App;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class correoMailable extends Mailable
{
    use Queueable, SerializesModels;


    public $subject = "Felicitación de cumpleaños";
    public $msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre)
    {
        $this->msg = $nombre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->view('emails.message-received');
    }
}
