@extends('layouts.app')

@section('title', 'Précommande - ViteCom')
@section('body-class', 'bg-[#fff4e8] text-[#2b170c]')

@section('content')
<div class="mx-auto max-w-3xl px-6 py-12 sm:px-8 lg:px-10">
    <div class="rounded-[2rem] border border-white/80 bg-white/95 p-8 shadow-xl shadow-[#a84d05]/10">
        <div class="mb-8 text-center">
            <p class="text-sm uppercase tracking-[0.35em] text-[#b45309]/90">Précommande</p>
            <h1 class="mt-3 text-3xl font-semibold text-[#2b170c]">Confirmez votre précommande</h1>
            <p class="mt-3 text-sm leading-6 text-[#5f4330]">Donnez-nous vos informations pour finaliser la commande du produit sélectionné.</p>
        </div>

        <div class="rounded-[1.75rem] border border-[#f3e0cc] bg-[#fff7ed] p-6">
            <h2 class="text-xl font-semibold text-[#2b170c]">{{ $produit->nom }}</h2>
            <p class="mt-2 text-sm text-[#6b4b32]">Prix : <span class="font-semibold text-[#2b170c]">{{ number_format($produit->prix, 2, ',', ' ') }} €</span></p>
            <p class="mt-1 text-sm text-[#5f4330]">Statut : <span class="font-semibold text-[#92400e]">{{ ucfirst($produit->statut) }}</span></p>
        </div>

        <form action="{{ route('commande.store') }}" method="POST" class="mt-8 grid gap-6">
            @csrf
            <input type="hidden" name="produit_id" value="{{ $produit->id }}">

            <div>
                <label for="nom" class="block text-sm font-medium text-[#5f4330]">Nom</label>
                <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required class="mt-2 w-full rounded-2xl border border-[#d1b29d] bg-[#fff6f0] px-4 py-3 text-sm text-[#2b170c] shadow-sm focus:border-[#d97706] focus:outline-none focus:ring-2 focus:ring-[#fbbf24]/30" />
                @error('nom')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-[#5f4330]">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="mt-2 w-full rounded-2xl border border-[#d1b29d] bg-[#fff6f0] px-4 py-3 text-sm text-[#2b170c] shadow-sm focus:border-[#d97706] focus:outline-none focus:ring-2 focus:ring-[#fbbf24]/30" />
                @error('email')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="adresse" class="block text-sm font-medium text-[#5f4330]">Adresse</label>
                <input type="text" name="adresse" id="adresse" value="{{ old('adresse') }}" required class="mt-2 w-full rounded-2xl border border-[#d1b29d] bg-[#fff6f0] px-4 py-3 text-sm text-[#2b170c] shadow-sm focus:border-[#d97706] focus:outline-none focus:ring-2 focus:ring-[#fbbf24]/30" />
                @error('adresse')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <button type="submit" class="w-full rounded-full bg-[#d97706] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-[#c2410c]/25 transition hover:bg-[#f59e0b]">Passer la commande</button>
        </form>

        <div class="mt-8 flex flex-col gap-3 text-sm text-[#5f4330] sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('commande.index') }}" class="inline-flex items-center justify-center rounded-full border border-[#d97706] px-5 py-3 text-sm font-semibold text-[#c1620f] transition hover:bg-[#fff4df]">Voir mes commandes</a>
            <a href="{{ route('notifications.index') }}" class="inline-flex items-center justify-center rounded-full border border-[#d97706] px-5 py-3 text-sm font-semibold text-[#c1620f] transition hover:bg-[#fff4df]">Voir mes notifications</a>
        </div>
    </div>
</div>
@endsection
