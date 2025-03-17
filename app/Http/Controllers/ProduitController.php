<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    if ($search) {
        $produits = Produit::where('nom', 'like', '%' . $search . '%')->get();
    } else {
        $produits = Produit::all();
    }

    return view('produits.index', compact('produits'));
}


    public function adminIndex()
    {
       // Récupérer tous les produits
        $produits = Produit::all();

        return view('admin.produits.index', compact('produits'));
    }
    
    public function precommander($id)
{
    // Vérifie si le produit existe et est en rupture de stock
    $produit = Produit::findOrFail($id);

    if ($produit->statut === 'rupture') {
        return view('precommande.form', compact('produit'));
    }

    return redirect()->route('produits.index')->with('error', 'Ce produit n\'est pas en rupture.');
}


    
        public function create()
    {
        return view('admin.produits.create');
    }

    public function store(Request $request)
   {
    // Validation des données
    $request->validate([
        'nom' => 'required|string',
        'prix' => 'required|numeric',
        'quantite' => 'required|integer',
        'statut' => 'required|string|in:en stock,rupture',
    ]);

    // Création du produit
    $produit = new Produit();
    $produit->nom = $request->input('nom');
    $produit->prix = $request->input('prix');
    $produit->quantite = $request->input('quantite');
    $produit->statut = $request->input('statut');
    $produit->admin_id = Auth::guard('admin')->id();  // Associer l'admin connecté
    $produit->save();

    return redirect()->route('admin.produits.index')->with('success', 'Produit ajouté avec succès.');
   }

        public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        return view('admin.produits.edit', compact('produit'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer',
            'statut' => 'required|string|in:en stock,rupture',
        ]);

        $produit = Produit::findOrFail($id);
        $produit->update($request->all());

        return redirect()->route('admin.produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

        public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->route('admin.produits.index')->with('success', 'Produit supprimé avec succès.');
    }

   

    
}
