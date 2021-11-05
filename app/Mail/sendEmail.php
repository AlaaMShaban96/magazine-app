<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data=null)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.'.$this->data['type'], $this->data);
        $this->subject=$this->subject($this->data['type']);

    }
    public function subject($page)
    {
       switch ($page) {
           case 'sendCodeToEmail':
              return 'verifie your email';
               break;
           case 'sendCodeToResetPassword':
              return 'reset your password ';
               break;
           default:
               # code...
               break;
       }
    }
}
