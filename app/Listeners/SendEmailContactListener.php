<?php

namespace App\Listeners;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Events\SendEmailContactEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailContactListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendEmailContactEvent $event): void
    {
        $email = $event->email;
        $message = $event->message;
        $phone = $event->phone;
        Mail::to('thangcx2810@gmail.com')->send(new ContactMail($email, $message, $phone));

    }
}
