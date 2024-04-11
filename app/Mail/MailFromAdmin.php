<?php

namespace App\Mail;

use Faker\Provider\Text;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailFromAdmin extends Mailable
{
    use Queueable, SerializesModels;
    public $text;

    /**
     * Create a new message instance.
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Уведомление от администратора моирастеньки.рф',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.mailFromAdmin',
            with: [
                'text'=>$this->text
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
