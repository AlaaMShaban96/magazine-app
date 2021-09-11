<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        $user['data']=$event->data; 
        $user['user'] = User::where('email', $event->email)->get()->toArray();
        Mail::send('emails.'.$event->type, $user, function($message) use ($user,$event) {
            $message->to($user['user'][0]['email']);
            $message->subject($this->subject($event->type));
        });
    }
    private function subject($page)
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
