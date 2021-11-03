<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAdminMail extends Mailable
{
    use Queueable, SerializesModels;
    private $data;//予約情報
    private $users;//ユーザー情報
    private $stores;//店舗情報（店舗名）を取得
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$users,$stores)
    {
        $this->data = $data;
        $this->users = $users;
        $this->stores = $stores;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('【予約完了】')
        ->view('contact.adminmail')
        ->with(['data'=>$this->data,'users'=>$this->users,'stores'=>$this->stores]);
    }
}
