<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendVerifiedCodeToUser extends Mailable
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
        $this->subject=$this->subject($this->data['type']);;
        return $this->view('emails.'.$this->data['type'], $this->data);
    }
    public function subject($page)
    {
       switch ($page) {
           case 'sendCodeToEmail':
              return 'رمز التأكيد لتطبيق المجلة';
               break;
           case 'sendCodeToResetPassword':
              return 'كلمة المرور الجديدة';
               break;
           default:
               # code...
               break;
       }
    }
}
