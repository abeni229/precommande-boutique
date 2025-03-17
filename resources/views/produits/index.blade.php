<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produits</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<!-- Formulaire de recherche -->
<form  method="GET" action="{{ route('produits.index') }}">
    <input type="text" name="search" placeholder="Rechercher un produit" value="{{ request()->query('search') }}">
    <button type="submit">Rechercher</button>
</form>
<br><strong>Liste des produits en rupture</strong><br>
<!-- Affichage des produits -->
@if($produits->isEmpty())
    <p>Aucun produit trouvé.</p>
@else
    @foreach ($produits as $produit)
        <div class="produit">
            <h3>{{ $produit->nom }}</h3>
            <p>{{ $produit->prix }}€</p>
            <p>Statut : {{ $produit->statut }}</p>

            <form action="{{ route('precommande', $produit->id) }}" method="POST">
                @csrf
                <button type="submit">Précommander</button>
            </form>
        </div>
    @endforeach
@endif

</body>
</html>
