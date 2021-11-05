<?php

namespace App\Listeners;

use App\Models\User;
use App\Mail\sendEmail;
use App\Events\SendMail;
use App\Mail\sendVerifiedCodeToUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use IWasHereFirst2\LaravelMultiMail\Facades\MultiMail;

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
        $user['type']=$event->type; 
        $user['user'] = User::where('email', $event->email)->get()->toArray();
        MultiMail::to($user['user'][0]['email'])->from('no-reply@al-mjala.com')
        ->send(new sendVerifiedCodeToUser($user));
    }
   
}
