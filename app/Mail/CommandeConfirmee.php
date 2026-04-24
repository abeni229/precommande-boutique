<?php

namespace App\Mail;

use App\Models\Commande;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommandeConfirmee extends Mailable
{
    use Queueable, SerializesModels;

    public Commande $commande;

    public function __construct(Commande $commande)
    {
        $this->commande = $commande;
    }

    public function build()
    {
        return $this->subject('Confirmation de votre commande #' . $this->commande->id)
                    ->view('emails.commande.confirmee')
                    ->with([
                        'commande' => $this->commande,
                        'client' => $this->commande->client,
                        'produit' => $this->commande->produit,
                    ]);
    }
}

