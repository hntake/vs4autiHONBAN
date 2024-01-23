<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Pay extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($artist,$price)
    {
        $this->name = $artist['name'];
        $this->price = $price;
        $this->bank_name  = $artist['bank_name'];    
        $this->bank_branch  = $artist['bank_branch'];    
        $this->account_number  = $artist['account_number'];    

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
        ->subject('送金申請がありました')
        ->view('emails.pay')
        ->with([
            'name' => $this->name,
            'price' => $this->price,
            'bank_name'  => $this->bank_name,
            'bank_branch'  => $this->bank_branch,
            'account_number'  => $this->account_number,

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
            subject: 'Pay',
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
