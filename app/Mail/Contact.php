<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $subject;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $subject, $message)
    {
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $sender_name = (Auth::guard('web')->check() ? Auth::user()->name : $this->email);
        return $this->markdown('emails.contact')
                    ->from($this->email, $sender_name)
                    ->subject($this->subject);
    }
}
