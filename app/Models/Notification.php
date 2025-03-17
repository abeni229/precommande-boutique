<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'produit_id', 'commande_id', 'message', 'date_envoi'];

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

    // Relation avec la commande
    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
