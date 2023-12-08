<?php

namespace App\Listeners;

use App\Mail\Booked;
use App\Events\SendEmailBookedEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailBookedListener
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
    public function handle(SendEmailBookedEvent $event): void
    {
        $booking = $event->booking;
        Mail::to($booking->email)->send(new Booked( $booking ));
    }
}
