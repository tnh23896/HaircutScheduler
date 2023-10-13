<?php

namespace App\Jobs;

use App\Mail\ForgotPasswordEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendForgotPasswordEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $email;
    protected $token;

    public function __construct( $token, $email )
    {
        $this->email = $email;
        $this->token = $token;
    }

    /**
     * Execute the job.
     */

    public function handle()
    {

        Mail::to($this->email)->send(new ForgotPasswordEmail( $this->token, $this->email ));
    }
}
