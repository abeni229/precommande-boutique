@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mes Commandes</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>État</th>
                <th>Date de disponibilité</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
                <tr>
                    <td>{{ $commande->produit->nom }}</td>
                    <td>{{ $commande->etat }}</td>
                    <td>{{ $commande->date_disponibilite }}</td>
                    <td>
                        <a href="{{ route('commande.show', $commande->id) }}" class="btn btn-info">Détails</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
