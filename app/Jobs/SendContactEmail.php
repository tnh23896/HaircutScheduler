<?php

namespace App\Jobs;

use App\Mail\ContactMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendContactEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $message;
    protected $phone;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $message, $phone)
    {
        $this->email = $email;
        $this->message = $message;
        $this->phone = $phone;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Gửi email
        Mail::to('dtbarber@gmail.com')->send(new ContactMail($this->email, $this->message, $this->phone));
    }
}
