<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RestablecerPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $id_user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.paswords')
            ->subject('Restablecer Contraseña')
            ->with([
                'id_user' => $this->id_user,
            ]);
    }
}
