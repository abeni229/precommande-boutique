<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;


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
}
