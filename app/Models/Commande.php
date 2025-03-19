<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;
use App\Models\Notification;


class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'produit_id', 'etat', 'date_disponibilite', 'admin_id', 'nom', 'email', 'adresse'];

    // Relation avec le client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Relation avec le produit
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    // Relation avec l'admin
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    // Relation avec la notification
    public function notification()
    {
        return $this->hasOne(Notification::class);
    }

    protected static function booted()
    {
        static::created(function ($commande) {
            Notification::create([
                'client_id' => $commande->client_id,
                'produit_id' => $commande->produit_id,
                'commande_id' => $commande->id,
                'message' => 'Votre commande pour ' . $commande->produit->nom . ' a été enregistrée.',
                'date_envoi' => now(),
                'is_viewed' => false,
            ]);
        });
    }
}
