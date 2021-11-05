<?php

namespace App\Listeners;

use App\Models\Number;
use App\Events\SendNote;
use App\Mail\sendReportToAdmin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use IWasHereFirst2\LaravelMultiMail\Facades\MultiMail;

class SendNoteListener
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
     * @param  SendNote  $event
     * @return void
     */
    public function handle(SendNote $note)
    {
        $number=Number::find($note->data['number_id']);
        $note->data['magazine']=$number->folder->magazine->name;
        $note->data['folder']=$number->folder->folder_number;
        $note->data['number']=$number->number;

        MultiMail::to('ala96ala96@gmail.com')->from('report@al-mjala.com')->
        send(new sendReportToAdmin($note->data));
        // send('emails.send_report', $note->data, function($message) use ($note) {
        //         // $message->to(env('MAIL_USERNAME'));
        //         $message->subject($this->subject($note->data['title']));
        //     });
        // send(new \App\Mail\Invitation($user));
        
    }
   
}
