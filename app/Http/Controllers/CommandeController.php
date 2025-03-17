<?php
namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\Client;  // Import du modèle Client
use App\Notifications\PrecommandeNotification;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Afficher l'historique des commandes d'un client inscrit.
     */
    public function historique(Request $request)
    {
        // Vérifier si un email est fourni
        $request->validate([
            'email' => 'required|email|exists:clients,email'
        ]);

        // Récupérer le client par son email
        $client = Client::where('email', $request->email)->first();

        // Récupérer ses commandes
        $commandes = Commande::where('client_id', $client->id)->get();

        return view('commande.historique', compact('commandes'));
    }

    /**
     * Enregistrer une nouvelle commande pour un client inscrit.
     */
    public function store(Request $request)
    {
        // Validation des champs
        $request->validate([
            'nom' => 'required|string',
            'email' => 'required|email|exists:clients,email',
            'adresse' => 'required|string',
            'produit_id' => 'required|exists:produits,id',
        ]);

        // Récupérer le client avec cet email
        $client = Client::where('email', $request->email)->firstOrFail();

        // Créer la commande
        $commande = new Commande();
        $commande->produit_id = $request->produit_id;
        $commande->client_id = $client->id; // Associer le client à la commande
        $commande->etat = 'en_attente'; // État de la commande
        $commande->date_disponibilite = now(); // Définit la date actuelle
        $commande->nom = $client->nom;
        $commande->email = $client->email;
        $commande->adresse = $request->adresse;
        $commande->save();

           // Récupérer le produit
        $produit = Produit::find($request->produit_id);

        // Vérifier si le produit est disponible
        if ($produit->statut == 'disponible') {
            $commande->etat = 'confirmé'; // Commande confirmée si produit disponible
        } else {
            $commande->etat = 'en_attente'; // Commande en attente si produit en rupture
        }

        $commande->save();

        // Rediriger avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Commande enregistrée.');
        }

        public function precommander($id)
        {
            // Récupérer le produit par son ID
            $produit = Produit::findOrFail($id);
        
        // Vérifier si le produit est en rupture de stock
        if ($produit->statut !== 'rupture') {
            return redirect()->route('produits.index')->with('error', 'Ce produit est disponible, vous pouvez directement passer commande.');
        }

            // Retourner la vue avec les détails du produit
            return view('precommande.form', compact('produit'));
        }
    

    /**
     * Notifier un client quand son produit devient disponible.
     */
    public function envoyerNotificationDisponibilite($commandeId)
    {
        $commande = Commande::findOrFail($commandeId);
        $produit = $commande->produit; // Récupérer le produit de la commande

        // Vérifier si le produit est disponible
        if ($produit->statut == 'disponible') {
            // Récupérer le client
            $client = $commande->client;

            // Créer la notification
            Notification::create([
                'client_id' => $client->id,
                'produit_id' => $produit->id,
                'commande_id' => $commande->id,
                'message' => "Le produit '{$produit->nom}' dans votre commande est maintenant disponible.",
                'date_envoi' => now(),
            ]);
        }

        return redirect()->route('commande.index')->with('message', 'Le client a été notifié de la disponibilité du produit.');
    }
}
