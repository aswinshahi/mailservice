<?php

namespace Tests\Feature;

use App\Mail\SendMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailContentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMailableContent()
    {
        $mail_bodies = array(
            'sender_name'=>'test user',
            'subject'=>'abcd',
            'to_email'=>'abcd',
            'body'=>'abcd'
        );

        $mailable = new SendMail($mail_bodies);

        $mailable->assertSeeInHtml('Hi, test user');

        $mailable->assertSeeInText('abcd');
    }
}
