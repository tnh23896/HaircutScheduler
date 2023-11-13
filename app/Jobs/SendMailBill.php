<?php

namespace App\Jobs;
use App\Mail\Mail_bill;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendMailBill implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $bill;
    protected $bill_detail;
    public function __construct($bill,$bill_detail)
    {
        $this->bill = $bill;
        $this->bill_detail = $bill_detail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->bill->email)->send(new Mail_bill($this->bill,$this->bill_detail));
    }
}
