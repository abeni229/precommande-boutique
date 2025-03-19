@extends('layouts.app')

@section('content')
    <div class="big">
        <h1>Détails de la commande</h1><br><br>

        <div class="commande-details">
            <h2>Commande n°{{ $commande->id }}</h2>
            
            <p><strong>Nom :</strong> {{ $commande->nom }}</p>
            <p><strong>Email :</strong> {{ $commande->email }}</p>
            <p><strong>Adresse :</strong> {{ $commande->adresse }}</p>
            <p><strong>Produit :</strong> {{ $commande->produit->nom }}</p>
            <p><strong>Prix :</strong> {{ $commande->produit->prix }}€</p>
            <p><strong>Statut de la commande :</strong> {{ $commande->etat }}</p>
            <p><strong>Date de commande :</strong> {{ $commande->created_at }}</p>
            <p><strong>Disponibilité prévue :</strong> {{ $commande->date_disponibilite }}</p>
        </div><br>

        <a href="{{ route('commande.historique') }}" class="btn btn-secondary">Retour à l'historique des commandes</a>
    </div>
@endsection
