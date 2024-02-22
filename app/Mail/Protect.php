<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Protect extends Mailable
{
    use Queueable, SerializesModels;

/**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($design)
    {
        $this->name = $design['name'];
        $this->email = $design['email'];
        $this->id = $design['id'];
        $this->artist_id = $design['artist_id'];
        $this->artist_name = $design['artist_name'];

    }
/**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function build()
    {
        

        return  $this
        ->from('info@itcha50.com')
        ->to('hntake@gmail.com')
        ->subject('お守りバッジのデザイン提供')
        ->view('emails.protect')
        ->with([
            'name' => $this->name,
            'email' => $this->email,
            'id'  => $this->id,
            'artist_id'  => $this->artist_id,
            'artist_name'  => $this->artist_name,

        ]);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'お守りバッジ',
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
