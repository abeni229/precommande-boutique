@extends('layouts.app')

@section('content')
    

    <form class="big" action="{{ route('admin.produits.update', $produit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h4>Modifier le produit</h4><br>
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ $produit->nom }}" required>
        </div><br>
        <div>
            <label for="prix">Prix</label>
            <input type="number" name="prix" id="prix" value="{{ $produit->prix }}" required>
        </div><br>
        <div>
            <label for="quantite">Quantité</label>
            <input type="number" name="quantite" id="quantite" value="{{ $produit->quantite }}" required>
        </div><br>
        <div>
            <label for="statut">Statut</label>
            <select name="statut" id="statut" required>
                <option value="en stock" {{ $produit->statut === 'en stock' ? 'selected' : '' }}>En stock</option>
                <option value="rupture" {{ $produit->statut === 'rupture' ? 'selected' : '' }}>Rupture</option>
            </select>
        </div><br>
        <button type="submit">Mettre à jour le produit</button>
    </form>
@endsection
