<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConsultationUser extends Mailable
{
    use Queueable, SerializesModels;

    public $meet;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($meet)
    {
        $this->meet = $meet;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.consultation');
    }
}
