<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MairieArrahMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $subject;
    public $fromEmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $subject)
    {
        $this->data = $data;
        $this->subject = $subject;
        $this->fromEmail = env('MAIL_FROM_ADDRESS');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->fromEmail )
        ->subject($this->subject)
        ->view('mails.mail');
    }
}
