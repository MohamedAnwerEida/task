<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\phi_settings;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $id;
     public $name;
     public $idcode;
    public function __construct($id, $name, $idcode)
    {
        //
        $this->id = $id;
        $this->name = $name;
        $this->idcode = $idcode;
    }  //


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->view('emails.idcode')->with(['id', 'name', 'idcode']);
    }
}
