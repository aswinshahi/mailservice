<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected  $mail_info;
    public function __construct($mail_info)
    {
        $this->mail_info = $mail_info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->mail_info["subject"])->markdown('email.user_mail')->from($this->mail_info["from_email"],$this->mail_info["sender_name"])->with('mail',$this->mail_info);
    }
}
