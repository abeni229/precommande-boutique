@extends('layouts.app')

@section('content')
    

    <form class="big" action="{{ route('admin.produits.store') }}" method="POST">
        @csrf
        <h3>Ajouter un nouveau produit</h3><br>
        <br>
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" required>
        </div><br>

        <div>
            <label for="prix">Prix</label>
            <input type="number" name="prix" id="prix" required>
        </div><br>
        <div>
            <label for="quantite">Quantité</label>
            <input type="number" name="quantite" id="quantite" required>
        </div><br>

        <div>
            <label for="statut">Statut</label>
            <select name="statut" id="statut" required>
                <option value="en stock">En stock</option>
                <option value="rupture">Rupture</option>
            </select>
        </div><br>

        <button type="submit">Ajouter le produit</button>
    </form>
@endsection
