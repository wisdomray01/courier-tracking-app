<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TrackingDetails extends Mailable
{
    use Queueable, SerializesModels;

    public $trackers;
    public $tracking_events;

    public function __construct($trackers, $tracking_events)
    {
        $this->trackers = $trackers;
        $this->tracking_events = $tracking_events;
    }

    public function build()
    {
        return $this->subject('Your Package Tracking Details')
                    ->view('emails.tracking_details');
    }
}
