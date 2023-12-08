<?php

namespace App\Listeners;

use App\Mail\ForgotPasswordEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\SendEmailForgotPasswordEvent;

class SendEmailForgotPasswordListener
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
    public function handle(SendEmailForgotPasswordEvent $event): void
    {
        $token = $event->token;
        $email = $event->email;
        Mail::to($email)->send(new ForgotPasswordEmail( $token, $email ));

    }
}
