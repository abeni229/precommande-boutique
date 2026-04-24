<?php

namespace App\Observers;

use App\Models\Produit;
use App\Services\CommandeService;

class ProduitObserver
{
    protected CommandeService $commandeService;

    public function __construct(CommandeService $commandeService)
    {
        $this->commandeService = $commandeService;
    }

    /**
     * Déclenché après la mise à jour d'un produit
     */
    public function updated(Produit $produit)
    {
        // Si le produit passe en stock
        if ($produit->isDirty('statut') && $produit->statut === Produit::STATUT_EN_STOCK) {
            // Notifier tous les clients en attente
            $this->commandeService->notifierDisponibilite($produit);
        }

        // Si la quantité augmente et passe au-dessus de 0
        if ($produit->isDirty('quantite') && $produit->quantite > 0 && $produit->getOriginal('quantite') <= 0) {
            $produit->update(['statut' => Produit::STATUT_EN_STOCK]);
        }
    }
}
