@extends('layouts.app')

@section('content')
    <h1>Liste des produits</h1><br>

    @if(session('success'))
        <div class="mb-6 rounded-3xl border border-[#d1fae5] bg-[#ecfdf5] px-4 py-4 text-sm text-[#166534]">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.produits.create') }}" class="inline-flex rounded-full bg-[#f97316] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-[#f97316]/20 transition hover:bg-[#ea580c]">Ajouter un produit</a>

    <div class="mt-8 overflow-hidden rounded-[2rem] border border-white/80 bg-white/90 shadow-xl shadow-[#a84d05]/10">
        <table class="min-w-full divide-y divide-[#f3e3d0]">
            <thead class="bg-[#fff7ed]">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.3em] text-[#9a4b0b]">Image</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.3em] text-[#9a4b0b]">Nom</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.3em] text-[#9a4b0b]">Prix</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.3em] text-[#9a4b0b]">Quantité</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.3em] text-[#9a4b0b]">Statut</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-[0.3em] text-[#9a4b0b]">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#f3e3d0] bg-white">
                @foreach($produits as $produit)
                    <tr>
                        <td class="px-6 py-4 align-top">
                            @if($produit->image)
                                <img src="{{ asset($produit->image) }}" alt="{{ $produit->nom }}" class="h-16 w-16 rounded-xl object-cover" />
                            @else
                                <div class="flex h-16 w-16 items-center justify-center rounded-xl bg-[#f3e3d0] text-xs text-[#7c4a16]">Aucune</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 align-top">{{ $produit->nom }}</td>
                        <td class="px-6 py-4 align-top">{{ $produit->prix }} €</td>
                        <td class="px-6 py-4 align-top">{{ $produit->quantite }}</td>
                        <td class="px-6 py-4 align-top">{{ ucfirst($produit->statut) }}</td>
                        <td class="px-6 py-4 align-top space-x-2">
                            <a href="{{ route('admin.produits.edit', $produit->id) }}" class="text-[#f97316] hover:text-[#d97706]">Modifier</a>
                            <form action="{{ route('admin.produits.destroy', $produit->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[#c2410c] hover:text-[#b45309]">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection