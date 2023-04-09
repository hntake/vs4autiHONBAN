<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Lost;

class CallMail extends Mailable
{
    use Queueable, SerializesModels;

    private $email,$lost_id,$tel_id,$name,$date;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$call)
    {
        $this->email = $user['email'];
        $this->tel_id = $call['tel1'];
        $this->name = $user['name'];
        $this->date =  $call['created_at'];
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
        ->subject('電話が入りました')
        ->view('lost.auto')
        ->with([
            'email' => $this->email,
            'tel_id' => $this->tel_id,
            'name' => $this->name,
            'date' => $this->date,
        ]);    }
}
