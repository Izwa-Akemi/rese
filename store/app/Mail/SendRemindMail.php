<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendRemindMail extends Mailable
{
    use Queueable, SerializesModels;
    private $reserve;//予約情報
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reserve)
    {
        $this->reserve = $reserve;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('【前日予約確認】')
        ->view('contact.remindmail')
        ->with(['reserve'=>$this->reserve]);
    }
}
