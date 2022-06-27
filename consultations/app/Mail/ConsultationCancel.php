<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConsultationCancel extends Mailable
{
    use Queueable, SerializesModels;
    public $dateCon ;
    public $subject ;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $dateCon)
    {
        $this->dateCon = $dateCon ;
        $this->subject = $subject ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.consultaions.cancel');
    }
}
