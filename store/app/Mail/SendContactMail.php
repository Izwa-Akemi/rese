<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactMail extends Mailable
{
    use Queueable, SerializesModels;
    private $owner_mail;//オーナーのメールアドレス
    public $subject;//件名
    private $detail;//メール内容詳細情報
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($owner_mail,$subject,$detail)
    {
        $this->owner_mail = $owner_mail;
        $this->subject = $subject;
        $this->detail = $detail;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from($this->owner_mail)
        ->subject($this->subject)
        ->view('contact.ownermail')
        ->with(['detail'=>$this->detail]);
    }
}
