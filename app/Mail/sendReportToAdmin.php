<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendReportToAdmin extends Mailable
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
        $this->subject=$this->subject($this->data['title']);;
        return $this->view('emails.send_report', $this->data);
    }
    public function subject($page)
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
