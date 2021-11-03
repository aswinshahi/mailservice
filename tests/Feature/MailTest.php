<?php

namespace Tests\Feature;

use App\Jobs\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class MailTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testQueueTest()
    {
        $mail_bodies = array(
            'sender_name' => 'test user',
            'subject' => 'abcd',
            'to_email' => 'abcd',
            'body' => 'abcd'
        );

        Queue::fake();

        SendMail::dispatch($mail_bodies);

        Queue::assertPushed(SendMail::class);
    }

    public function testMailTest()
    {

        Mail::fake();

        Mail::assertNotQueued(SendMail::class);
//
        Mail::assertNothingQueued();
    }
}
