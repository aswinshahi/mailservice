<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected  $mail_info;
    public function __construct($mail_info)
    {
        $this->mail_info = $mail_info;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            $this->sendMail("sendgrid");
        }catch (\Swift_TransportException $e){
            echo "mailgun";
            $this->sendMail("mailgun");
        }

    }

    public function sendMail($provider){
        Mail::mailer($provider)->to($this->mail_info["to_email"])->send(new \App\Mail\SendMail($this->mail_info));
    }
}
