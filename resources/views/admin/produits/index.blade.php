@extends('layouts.app')

@section('content')
    <h1>Liste des produits</h1><br>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.produits.create') }}"><h4>Ajouter un produit</h4></a><br>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produits as $produit)
                <tr>
                    <td>{{ $produit->nom }}</td>
                    <td>{{ $produit->prix }}</td>
                    <td>{{ $produit->quantite }}</td>
                    <td>{{ $produit->statut }}</td>
                    <td>
                        <a href="{{ route('admin.produits.edit', $produit->id) }}">Modifier</a>
                        <form action="{{ route('admin.produits.destroy', $produit->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection