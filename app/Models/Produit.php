<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

    // Constantes pour les statuts
    const STATUT_EN_STOCK = 'en_stock';
    const STATUT_RUPTURE = 'rupture';

    const STATUTS = [
        self::STATUT_EN_STOCK => 'En stock',
        self::STATUT_RUPTURE => 'En rupture',
    ];

    protected $fillable = [
        'nom',
        'prix',
        'quantite',
        'statut',
        'admin_id',
        'image',
        'description',
        'categorie'
    ];

    protected $casts = [
        'prix' => 'decimal:2',
        'quantite' => 'integer',
    ];

    protected static array $defaultImages = [
        'https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=900&q=80',
        'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=900&q=80',
        'https://images.unsplash.com/photo-1503602642458-232111445657?auto=format&fit=crop&w=900&q=80',
        'https://images.unsplash.com/photo-1491553895911-0055eca6402d?auto=format&fit=crop&w=900&q=80',
        'https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=900&q=80',
    ];

    /**
     * Vérifier si le produit est en stock
     */
    public function estEnStock(): bool
    {
        return $this->statut === self::STATUT_EN_STOCK && $this->quantite > 0;
    }

    /**
     * Vérifier si le produit est en rupture
     */
    public function estEnRupture(): bool
    {
        return $this->statut === self::STATUT_RUPTURE || $this->quantite <= 0;
    }

    /**
     * Décrémenter le stock
     */
    public function decrementerStock(int $quantite = 1): bool
    {
        if ($this->quantite < $quantite) {
            return false;
        }

        $this->decrement('quantite', $quantite);

        if ($this->quantite <= 0) {
            $this->update(['statut' => self::STATUT_RUPTURE]);
        }

        return true;
    }

    /**
     * Incrémenter le stock
     */
    public function incrementerStock(int $quantite = 1): void
    {
        $this->increment('quantite', $quantite);

        if ($this->quantite > 0 && $this->statut === self::STATUT_RUPTURE) {
            $this->update(['statut' => self::STATUT_EN_STOCK]);
        }
    }

    /**
     * Obtenir l'URL de l'image
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image && file_exists(public_path($this->image))) {
            return asset($this->image);
        }

        return $this->defaultImageUrl();
    }

    /**
     * Générer une URL d'image par défaut
     */
    protected function defaultImageUrl(): string
    {
        $index = abs((int) crc32($this->nom ?? $this->id)) % count(self::$defaultImages);
        return self::$defaultImages[$index];
    }

    /**
     * Scope pour les produits en stock
     */
    public function scopeEnStock($query)
    {
        return $query->where('statut', self::STATUT_EN_STOCK)
                     ->where('quantite', '>', 0);
    }

    /**
     * Scope pour les produits en rupture
     */
    public function scopeEnRupture($query)
    {
        return $query->where('statut', self::STATUT_RUPTURE)
                     ->orWhere('quantite', '<=', 0);
    }

    // Relations
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
