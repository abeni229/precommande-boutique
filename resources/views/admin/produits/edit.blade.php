@extends('layouts.app')

@section('title', 'Modifier un produit - ViteCom')
@section('body-class', 'bg-[#fff4e8] text-[#2b170c]')

@section('content')
<div class="mx-auto max-w-4xl px-6 py-10 sm:px-8 lg:px-10">
    <div class="rounded-[2rem] border border-white/80 bg-white/95 p-8 shadow-xl shadow-[#a84d05]/10">
        <div class="mb-8">
            <p class="text-sm uppercase tracking-[0.35em] text-[#b45309]/90">Produit</p>
            <h1 class="mt-3 text-3xl font-semibold text-[#2b170c]">Modifier le produit</h1>
            <p class="mt-3 text-sm leading-6 text-[#5f4330]">Mettez à jour les détails du produit en quelques clics.</p>
        </div>
        <form action="{{ route('admin.produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data" class="grid gap-6">
            @csrf
            @method('PUT')
            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label for="nom" class="block text-sm font-medium text-[#5f4330]">Nom du produit</label>
                    <input type="text" name="nom" id="nom" value="{{ $produit->nom }}" required class="mt-2 w-full rounded-2xl border border-[#d1b29d] bg-[#fff6f0] px-4 py-3 text-sm text-[#2b170c] shadow-sm focus:border-[#d97706] focus:outline-none focus:ring-2 focus:ring-[#fbbf24]/30" />
                    @error('nom')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="prix" class="block text-sm font-medium text-[#5f4330]">Prix (€)</label>
                    <input type="number" name="prix" id="prix" step="0.01" value="{{ $produit->prix }}" required class="mt-2 w-full rounded-2xl border border-[#d1b29d] bg-[#fff6f0] px-4 py-3 text-sm text-[#2b170c] shadow-sm focus:border-[#d97706] focus:outline-none focus:ring-2 focus:ring-[#fbbf24]/30" />
                    @error('prix')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label for="quantite" class="block text-sm font-medium text-[#5f4330]">Quantité</label>
                    <input type="number" name="quantite" id="quantite" value="{{ $produit->quantite }}" required class="mt-2 w-full rounded-2xl border border-[#d1b29d] bg-[#fff6f0] px-4 py-3 text-sm text-[#2b170c] shadow-sm focus:border-[#d97706] focus:outline-none focus:ring-2 focus:ring-[#fbbf24]/30" />
                    @error('quantite')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="statut" class="block text-sm font-medium text-[#5f4330]">Statut</label>
                    <select name="statut" id="statut" required class="mt-2 w-full rounded-2xl border border-[#d1b29d] bg-[#fff6f0] px-4 py-3 text-sm text-[#2b170c] shadow-sm focus:border-[#d97706] focus:outline-none focus:ring-2 focus:ring-[#fbbf24]/30">
                        <option value="en stock" {{ $produit->statut === 'en stock' ? 'selected' : '' }}>En stock</option>
                        <option value="rupture" {{ $produit->statut === 'rupture' ? 'selected' : '' }}>Rupture</option>
                    </select>
                    @error('statut')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-[#5f4330]">Photo du produit</label>
                <input type="file" name="image" id="image" accept="image/*" class="mt-2 w-full rounded-2xl border border-[#d1b29d] bg-[#fff6f0] px-4 py-3 text-sm text-[#2b170c] shadow-sm focus:border-[#d97706] focus:outline-none focus:ring-2 focus:ring-[#fbbf24]/30" />
                @error('image')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            @if($produit->image)
                <div class="rounded-[1.5rem] border border-[#f3e0cc] bg-[#fff7ed] p-4">
                    <p class="text-sm font-medium text-[#5f4330]">Image actuelle</p>
                    <img src="{{ asset($produit->image) }}" alt="{{ $produit->nom }}" class="mt-3 h-28 w-28 rounded-xl object-cover" />
                </div>
            @endif
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('admin.produits') }}" class="inline-flex items-center justify-center rounded-full border border-[#d97706] px-5 py-3 text-sm font-semibold text-[#c1620f] transition hover:bg-[#fff4df]">Retour à la liste</a>
                <button type="submit" class="inline-flex rounded-full bg-[#d97706] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-[#f97316]/20 transition hover:bg-[#f59e0b]">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>
@endsection
