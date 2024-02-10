<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;


class ExampleMail extends Mailable
{
    use Queueable, SerializesModels;
    
    // protected $name;

    public function __construct(/*$name*/ public $name)
    {
        // $this->name = $name;
    }
    
    public function envelope()
    {
        return new Envelope(
            subject: 'Example Mail',            
            from: new Address(env('MAIL_FROM_ADDRESS', 'no-reply@gmail.com'), env('MAIL_FROM_NAME', 'No-Reply'))
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.example',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
