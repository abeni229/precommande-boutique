<?php

namespace App\Services;

use App\Models\Commande;
use App\Models\Client;
use App\Models\Produit;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Mail\CommandeConfirmee;
use Illuminate\Support\Facades\Mail;

class CommandeService
{
    /**
     * Créer une nouvelle commande
     */
    public function creerCommande(Client $client, Produit $produit, array $data): Commande
    {
        return DB::transaction(function () use ($client, $produit, $data) {
            // Vérifier la disponibilité du produit
            if ($produit->estEnStock()) {
                $etat = Commande::ETAT_VALIDEE;
                
                // Décrémenter le stock
                if (!$produit->decrementerStock()) {
                    throw new \Exception('Stock insuffisant pour ce produit.');
                }
            } else {
                $etat = Commande::ETAT_EN_ATTENTE;
            }

            // Créer la commande
            $commande = Commande::create([
                'client_id' => $client->id,
                'produit_id' => $produit->id,
                'etat' => $etat,
                'date_disponibilite' => $etat === Commande::ETAT_VALIDEE ? now() : null,
                'nom' => $client->nom,
                'email' => $client->email,
                'adresse' => $data['adresse'] ?? $client->adresse,
            ]);

            // Logger l'action
            Log::info('Nouvelle commande créée', [
                'commande_id' => $commande->id,
                'client_id' => $client->id,
                'produit_id' => $produit->id,
                'etat' => $etat,
            ]);

            // Créer la notification
            $this->creerNotification($commande);

            return $commande;
        });

        Mail::to($client->email)->queue(new CommandeConfirmee($commande));
    }

    /**
     * Valider une commande
     */
    public function validerCommande(Commande $commande): bool
    {
        return DB::transaction(function () use ($commande) {
            $produit = $commande->produit;

            // Vérifier le stock
            if (!$produit->estEnStock()) {
                throw new \Exception('Le produit n\'est plus en stock.');
            }

            // Décrémenter le stock
            if (!$produit->decrementerStock()) {
                throw new \Exception('Stock insuffisant.');
            }

            // Mettre à jour la commande
            $commande->update([
                'etat' => Commande::ETAT_VALIDEE,
                'date_disponibilite' => now(),
            ]);

            // Créer une notification
            Notification::create([
                'client_id' => $commande->client_id,
                'produit_id' => $commande->produit_id,
                'commande_id' => $commande->id,
                'message' => "Votre commande #{$commande->id} a été validée et sera bientôt expédiée.",
                'date_envoi' => now(),
                'is_viewed' => false,
            ]);

            Log::info('Commande validée', ['commande_id' => $commande->id]);

            return true;
        });
    }

    /**
     * Annuler une commande
     */
    public function annulerCommande(Commande $commande, ?string $raison = null): bool
    {
        return DB::transaction(function () use ($commande, $raison) {
            // Si la commande était validée, remettre le stock
            if ($commande->etat === Commande::ETAT_VALIDEE) {
                $commande->produit->incrementerStock();
            }

            $commande->update([
                'etat' => Commande::ETAT_ANNULEE,
            ]);

            // Créer une notification
            $message = "Votre commande #{$commande->id} a été annulée.";
            if ($raison) {
                $message .= " Raison : {$raison}";
            }

            Notification::create([
                'client_id' => $commande->client_id,
                'produit_id' => $commande->produit_id,
                'commande_id' => $commande->id,
                'message' => $message,
                'date_envoi' => now(),
                'is_viewed' => false,
            ]);

            Log::info('Commande annulée', [
                'commande_id' => $commande->id,
                'raison' => $raison,
            ]);

            return true;
        });
    }

    /**
     * Notifier les clients en attente quand un produit devient disponible
     */
    public function notifierDisponibilite(Produit $produit): int
    {
        $commandesEnAttente = Commande::where('produit_id', $produit->id)
            ->where('etat', Commande::ETAT_EN_ATTENTE)
            ->with('client')
            ->get();

        $count = 0;

        foreach ($commandesEnAttente as $commande) {
            Notification::create([
                'client_id' => $commande->client_id,
                'produit_id' => $produit->id,
                'commande_id' => $commande->id,
                'message' => "Bonne nouvelle ! Le produit '{$produit->nom}' est de nouveau disponible. Passez commande rapidement !",
                'date_envoi' => now(),
                'is_viewed' => false,
            ]);

            $count++;
        }

        Log::info('Notifications de disponibilité envoyées', [
            'produit_id' => $produit->id,
            'nombre_notifications' => $count,
        ]);

        return $count;
    }

    /**
     * Créer une notification pour une nouvelle commande
     */
    private function creerNotification(Commande $commande): void
    {
        $message = $commande->etat === Commande::ETAT_VALIDEE
            ? "Votre commande pour '{$commande->produit->nom}' a été confirmée."
            : "Votre précommande pour '{$commande->produit->nom}' a été enregistrée. Nous vous notifierons dès que le produit sera disponible.";

        Notification::create([
            'client_id' => $commande->client_id,
            'produit_id' => $commande->produit_id,
            'commande_id' => $commande->id,
            'message' => $message,
            'date_envoi' => now(),
            'is_viewed' => false,
        ]);
    }
}


