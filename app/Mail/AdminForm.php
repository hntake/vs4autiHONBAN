<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminForm extends Mailable
{
    use Queueable, SerializesModels;
    private $email;
    private $name;
    private $phone;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        $this->email = $inputs['email'];
        $this->name = $inputs['name'];
        $this->phone  = $inputs['phone'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('info@itcha50.com')
            ->to('hntake@gmail.com')
            ->subject('VS4より自動送信メールです')
            ->view('admin_mail')
            ->with([
                'email' => $this->email,
                'name' => $this->name,
                'phone'  => $this->phone,
            ]);
    }
}
