<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReceiptMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdf)
    {
        $this->pdf = $pdf;
    }
/**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function build()
    {
        $pdfContent = $this->pdf->output();

    // 一時的なファイルを作成
    $tempFilePath = tempnam(sys_get_temp_dir(), 'pdf_');
    file_put_contents($tempFilePath, $pdfContent);

        return  $this
        ->from('info@itcha50.com')
        ->subject('ダウンドードが完了しました')
        ->view('emails.receipt')
        ->with([
            ])
            // 一時的なファイルを添付
        ->attach($tempFilePath, [
            'as' => 'design.pdf',
            'mime' => 'application/pdf',
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
            subject: 'Receipt Mail',
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
            view: 'emails.receipt',
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
