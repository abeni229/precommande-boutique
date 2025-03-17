
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Historique de vos commandes</h2>

    <form method="GET" action="{{ route('commande.historique') }}">
        <div class="form-group">
            <label for="email">Votre email :</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Voir l'historique</button>
    </form>

    @if(isset($commandes) && $commandes->count() > 0)
        <h3 class="mt-4">Vos commandes :</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>État</th>
                    <th>Date de disponibilité</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commandes as $commande)
                    <tr>
                        <td>{{ $commande->produit->nom }}</td>
                        <td>{{ $commande->etat }}</td>
                        <td>{{ $commande->date_disponibilite }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucune commande trouvée.</p>
    @endif
</div>
@endsection
