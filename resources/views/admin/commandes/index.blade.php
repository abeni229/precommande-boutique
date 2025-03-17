@extends('layouts.app')

@section('content')
    <h1>Commandes</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Produit</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->client ? $commande->client->nom : 'Client non trouvé' }}</td>
                    <td>{{ $commande->produit->nom }}</td>
                    <td>{{ ucfirst($commande->etat) }}</td>
                    <td>
                        @if($commande->etat === 'en_attente')
                            <form action="{{ route('admin.commande.valider', $commande->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn-valider" onclick="return confirm('Voulez-vous vraiment valider cette commande ?')">Valider</button>
                            </form>

                            <form action="{{ route('admin.commande.refuser', $commande->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn-refuser" onclick="return confirm('Voulez-vous vraiment refuser cette commande ?')">Refuser</button>
                            </form>
                        @else
                            <span>{{ ucfirst($commande->etat) }}</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection