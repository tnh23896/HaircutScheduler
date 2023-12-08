<?php

namespace App\Listeners;

use App\Mail\Mail_bill;
use App\Events\SendEmailBillEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailBillListener
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
    public function handle(SendEmailBillEvent $event): void
    {
        $bill = $event->bill;
        $bill_detail = $event->bill_detail;
        Mail::to($bill->email)->send(new Mail_bill($bill,$bill_detail));
    }
}
