<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   
    public function index()
    {
        return view('admin.dashboard');
    }

        public function produitsDashboard()
    {
        // Récupérer tous les produits
        $produits = Produit::all();

        // Retourner la vue avec les produits
        return view('admin.produits.index', compact('produits'));
    }

    public function commandesDashboard()
    {
        // Récupérer toutes les commandes
        $commandes = Commande::all();

        // Retourner la vue avec les commandes
        return view('admin.commandes.index', compact('commandes'));
    }



    public function commandes()
    {
        // Récupérer toutes les commandes en attente
        $commandes = Commande::with(['client', 'produit'])->where('etat', 'en_attente')->get();

        // Retourner la vue avec les commandes
        return view('admin.commandes.index', compact('commandes'));
    }

    public function produits()
    {
        $produits = Produit::all();
        return view('admin.produits.index', compact('produits'));
    }

    public function validerCommande($id)
{
    $commande = Commande::find($id);

    if ($commande) {
        $commande->etat = 'validée';
        $commande->save();
        return redirect()->back()->with('success', 'Commande validée avec succès.');
    }

    return redirect()->back()->with('error', 'Commande introuvable.');
}

public function refuserCommande($id)
{
    $commande = Commande::find($id);

    if ($commande) {
        $commande->etat = 'refusée';
        $commande->save();
        return redirect()->back()->with('error', 'Commande refusée.');
    }

    return redirect()->back()->with('error', 'Commande introuvable.');
}

}
