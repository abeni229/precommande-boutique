<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    // Constantes pour les états
    const ETAT_EN_ATTENTE = 'en_attente';
    const ETAT_VALIDEE = 'validee';
    const ETAT_ANNULEE = 'annulee';
    const ETAT_LIVREE = 'livree';

    const ETATS = [
        self::ETAT_EN_ATTENTE => 'En attente',
        self::ETAT_VALIDEE => 'Validée',
        self::ETAT_ANNULEE => 'Annulée',
        self::ETAT_LIVREE => 'Livrée',
    ];

    protected $fillable = [
        'client_id',
        'produit_id',
        'etat',
        'date_disponibilite',
        'admin_id',
        'nom',
        'email',
        'adresse'
    ];

    protected $casts = [
        'date_disponibilite' => 'datetime',
    ];

    /**
     * Vérifier si la commande peut être validée
     */
    public function peutEtreValidee(): bool
    {
        return $this->etat === self::ETAT_EN_ATTENTE;
    }

    /**
     * Vérifier si la commande peut être annulée
     */
    public function peutEtreAnnulee(): bool
    {
        return in_array($this->etat, [self::ETAT_EN_ATTENTE, self::ETAT_VALIDEE]);
    }

    /**
     * Obtenir le badge de couleur selon l'état
     */
    public function getBadgeClassAttribute(): string
    {
        return match($this->etat) {
            self::ETAT_EN_ATTENTE => 'bg-yellow-100 text-yellow-800',
            self::ETAT_VALIDEE => 'bg-green-100 text-green-800',
            self::ETAT_ANNULEE => 'bg-red-100 text-red-800',
            self::ETAT_LIVREE => 'bg-blue-100 text-blue-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    // Relations
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function notification()
    {
        return $this->hasOne(Notification::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    // Scopes
    public function scopeEnAttente($query)
    {
        return $query->where('etat', self::ETAT_EN_ATTENTE);
    }

    public function scopeValidees($query)
    {
        return $query->where('etat', self::ETAT_VALIDEE);
    }

    public function scopeAnnulees($query)
    {
        return $query->where('etat', self::ETAT_ANNULEE);
    }
}

