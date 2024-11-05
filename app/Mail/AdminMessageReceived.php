<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminMessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $phone;
    public $email;
    public $content;

    public function __construct($name, $phone, $email, $content)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->content = $content;
    }

    public function build()
    {
        return $this->subject('New Message Received')
                    ->view('emails.admin_message_received');
    }
}
