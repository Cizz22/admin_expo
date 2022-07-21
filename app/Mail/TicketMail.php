<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketMail extends Mailable
{
    protected $nama;
    protected $tickets = [];
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama, $tickets)
    {
        $this->nama = $nama;
        $this->tickets = $tickets;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->view('vendor.mail.ticket-email', ['name' => $this->nama])->subject("Tiket UKM Expo 2022!");
        foreach($this->tickets as $ticket){
            $this->attach(public_path() . '/' . $ticket);
        }

        return $this;
    }
}
