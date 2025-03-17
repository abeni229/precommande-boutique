@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Finalisez votre commande</h1>

        <!-- Afficher les informations du produit -->
        @if($produit)
            <div class="produit-details">
                <h2>{{ $produit->nom }}</h2>
                <p>Prix : {{ $produit->prix }}€</p>
                <p>Disponibilité : {{ $produit->statut }}</p>
            </div>

            <!-- Formulaire de commande immédiate -->
            <form action="{{ route('commande.store') }}" method="POST">
                @csrf
                <input type="hidden" name="produit_id" value="{{ $produit->id }}">

                <!-- Nom -->
                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
                    @error('nom')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Adresse -->
                <div class="form-group">
                    <label for="adresse">Adresse :</label>
                    <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse') }}" required>
                    @error('adresse')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bouton de soumission -->
                <button type="submit" class="btn btn-primary">Commander maintenant</button>
            </form>
        @else
            <p>Produit non trouvé.</p>
        @endif
    </div>
@endsection
