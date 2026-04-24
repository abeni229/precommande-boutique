<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $produit = new Produit();
    $produit->nom = $request->input('nom');
    $produit->prix = $request->input('prix');
    $produit->quantite = $request->input('quantite');
    $produit->statut = $request->input('statut');
    $produit->admin_id = Auth::guard('admin')->id();  // Associer l'admin connecté

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $destination = public_path('images/produits');
        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }
        $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\.\-]/', '_', $image->getClientOriginalName());
        $image->move($destination, $filename);
        $produit->image = 'images/produits/' . $filename;
    }

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
        $request->validate([
            'nom' => 'required|string',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer',
            'statut' => 'required|string|in:en stock,rupture',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $produit = Produit::findOrFail($id);
        $data = $request->only(['nom', 'prix', 'quantite', 'statut']);

        if ($request->hasFile('image')) {
            if ($produit->image && File::exists(public_path($produit->image))) {
                File::delete(public_path($produit->image));
            }
            $image = $request->file('image');
            $destination = public_path('images/produits');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\.\-]/', '_', $image->getClientOriginalName());
            $image->move($destination, $filename);
            $data['image'] = 'images/produits/' . $filename;
        }

        $produit->update($data);

        return redirect()->route('admin.produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

        public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->route('admin.produits.index')->with('success', 'Produit supprimé avec succès.');
    }

   

    
}
