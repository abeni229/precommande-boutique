<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements Authenticatable
{
    use HasFactory;

    protected $fillable = ['nom', 'email', 'mot_de_passe'];

    // Relation avec les produits
    public function produits()
    {
        return $this->hasMany(Produit::class);
    }

    // Relation avec les commandes
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    public function getAuthIdentifierName()
    {
        return 'id';  // ou 'email' si tu préfères utiliser l'email comme identifiant
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->mot_de_passe;  // Mot de passe
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getAuthPasswordName()
    {
        return 'mot_de_passe';  // Le nom de la colonne pour le mot de passe
    }
}
