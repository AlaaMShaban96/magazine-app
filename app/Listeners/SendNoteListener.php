<?php

namespace App\Listeners;

use App\Models\Number;
use App\Events\SendNote;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        // dd(env('MAIL_USERNAME'));
        $note->data['magazine']=$number->folder->magazine->name;
        $note->data['folder']=$number->folder->folder_number;
        $note->data['number']=$number->number;
        Mail::send('emails.send_report', $note->data, function($message) use ($note) {
            $message->to(env('MAIL_USERNAME'));
            $message->subject($this->subject($note->data['title']));
        });
        
    }
    private function subject($page)
    {
       switch ($page) {
           case 'not_working':
              return 'بلاغ النظام لا يعمل جيدا';
               break;
           case 'incomplete':
              return 'غير مكتمل';
               break;
           case 'wrong_info':
              return 'بلاغ عن معلومات غير صحيحة  ';
               break;
           case 'other':
              return 'بلاغ عن اخرا ';
               break;
           default:
               # code...
               break;
       }
    }
}
