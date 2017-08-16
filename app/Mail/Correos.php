<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Correos extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$empresa)
    {
        $this->content = $content;
        $this->empresa = $empresa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->content['title'];
        $name = $this->content['name'];
        $address = $this->content['address'];
        $address_reply = $this->empresa['mail'];
        return $this->view('mails.mail')
        ->with(['content'=>$this->content,'empresa'=>$this->empresa])
        ->cc($address, $name)
        ->bcc($address, $name)
        ->replyTo($address_reply, $name)
        ->subject($subject);
        //->to('andrescondo17@gmail.com');
        /*$address = 'ignore@batcave.io';
        $name = 'Ignore Me';
        $subject = 'Krytonite Found';

        return $this->view('emails.kryptonite-found')
        ->from($address, $name)
        ->cc($address, $name)
        ->bcc($address, $name)
        ->replyTo($address, $name)
        ->subject($subject);*/
    }
}
