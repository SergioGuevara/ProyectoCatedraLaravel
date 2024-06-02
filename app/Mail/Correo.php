<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Correo extends Mailable
{
    use Queueable, SerializesModels;
    public $contraseña;

    
    public function __construct($contraseña)
    {
        $this->contraseña = $contraseña;
    }

    public function build()
    {
        return $this->view('emails.contenidoCorreo')
        ->subject('Envio de credenciales para login de la cuponera')
        ->with(['contraseña'=>$this->contraseña]);
    }

}
