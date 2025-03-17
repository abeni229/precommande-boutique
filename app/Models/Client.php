<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Client extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait, Notifiable;

    protected $fillable = ['nom', 'email', 'mot_de_passe','role','adresse'];
    protected $hidden = ['mot_de_passe', 'remember_token']; // Cache le mot de passe


    // Relation avec les commandes
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    // Relation avec les notifications
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getRememberToken()
    {
        return $this->remember_token ?? '';
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Laravel en a besoin pour "se souvenir de moi"
    }
}
