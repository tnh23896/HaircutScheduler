<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $message;
    public $phone;

    /**
     * Tạo một phiên bản mới của thông điệp.
     *
     * @param string $email
     * @param string $message
     */
    public function __construct($email, $message, $phone)
    {
        $this->email = $email;
        $this->message = $message;
        $this->phone = $phone;
    }

    /**
     * Xây dựng nội dung của email.
     *
     * @return $this
     */
    public function build()
    { 
        $messages = $this->message;
        $phone = $this->phone;
        return $this
            ->subject('Liên hệ từ khách hàng')
            ->view('client.contact.viewEmail', compact('messages', 'phone'));
    }
}
