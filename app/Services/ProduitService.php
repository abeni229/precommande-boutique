<?php

namespace App\Services;

use App\Models\Produit;
use Illuminate\Support\Facades\Cache;

class ProduitService
{
    /**
     * Obtenir tous les produits (avec cache)
     */
    public function getTousProduits()
    {
        return Cache::remember('produits.all', 3600, function () {
            return Produit::with('admin')->get();
        });
    }

    /**
     * Obtenir les produits en stock (avec cache)
     */
    public function getProduitsEnStock()
    {
        return Cache::remember('produits.en_stock', 1800, function () {
            return Produit::enStock()->with('admin')->get();
        });
    }

    /**
     * Invalider le cache des produits
     */
    public function invalidateCache(): void
    {
        Cache::forget('produits.all');
        Cache::forget('produits.en_stock');
        Cache::forget('produits.en_rupture');
    }

    /**
     * Observer pour invalider automatiquement
     */
    public static function clearCacheOnUpdate(): void
    {
        Produit::updated(function () {
            (new self())->invalidateCache();
        });

        Produit::created(function () {
            (new self())->invalidateCache();
        });

        Produit::deleted(function () {
            (new self())->invalidateCache();
        });
    }
}
