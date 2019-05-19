<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Message extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $mail;
    public $phone;
    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($validated)
    {
        $this->name = $validated["name"];
        $this->mail = $validated["mail"];
        $this->phone = $validated["phone"];
        $this->message = $validated["message"];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->mail)
            ->markdown('emails.message');
    }
}
