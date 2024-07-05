<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ShipMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($design, $buyer, $date)
{
    $this->email = $design['email'];
    $this->artist_name = $design['artist_name'];
    $this->name = $design['name'];
    $this->id = $design['id'];
    $this->buyer_name = $buyer->name;
    $this->tel = $buyer->tel;
    $this->postal = $buyer->postal;
    $this->address = $buyer->address;
    $this->design = $design['id'];
    $this->date = $date;
}

    
    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: '作品の発送をお願い致します',
        );
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
        ->subject('作品の発送をお願い致します')
        ->view('emails.ship')
        ->with([
            'name' => $this->name,
            'buyer_name'=> $this->buyer_name,
            'design'=>$this->design,
            'postal'=>$this->postal,
            'address'=>$this->address,
            'tel'=> $this->tel,
            'artist_name'=> $this->artist_name,
            'date'=> $this->date,
            'id'=> $this->id,
        ]);
    }
    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.ship',
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
