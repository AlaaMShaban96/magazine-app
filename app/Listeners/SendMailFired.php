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
        $user['user'] = User::where('email', $event->email)->get()->toArray();
        Mail::send('emails.sendCodeToEmail', $user, function($message) use ($user) {
            $message->to($user['user'][0]['email']);
            $message->subject('Event Testing');
        });
    }
}
