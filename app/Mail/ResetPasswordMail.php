<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $receiver, $token, $resetUrl;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($receiver, $token)
    {
        $this->receiver = $receiver;
        $this->token = $token;
        $this->resetUrl = route('resetPasswordPage',[$receiver->email, $token]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@car-app.com')
        ->markdown('mail.reset_password');
    }
}
