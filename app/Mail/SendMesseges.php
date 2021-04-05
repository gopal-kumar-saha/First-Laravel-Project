<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMesseges extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $messege_data = " ";

    public function __construct($messge_data_form_con)
    {
        $this->messege_data = $messge_data_form_con;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $messege_data_final = $this->messege_data;
        return $this->view('mail.sendmessegs', compact('messege_data_final'));
    }
}
