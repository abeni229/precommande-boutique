@extends('layouts.app')

@section('title', 'Détails de la commande - ViteCom')
@section('body-class', 'bg-[#fff4e8] text-[#2b170c]')

@section('content')
<div class="mx-auto max-w-4xl px-6 py-10 sm:px-8 lg:px-10">
    <div class="rounded-[2rem] border border-white/80 bg-white/95 p-8 shadow-xl shadow-[#a84d05]/10">
        <div class="mb-8">
            <p class="text-sm uppercase tracking-[0.35em] text-[#b45309]/90">Commande</p>
            <h1 class="mt-3 text-3xl font-semibold text-[#2b170c]">Détails de la commande</h1>
            <p class="mt-3 text-sm leading-6 text-[#5f4330]">Toutes les informations de votre commande sont disponibles ci-dessous.</p>
        </div>

        <div class="grid gap-6 rounded-[1.75rem] border border-[#f3e0cc] bg-[#fff7ed] p-6 text-sm text-[#5f4330]">
            <div>
                <p class="text-xs uppercase tracking-[0.3em] text-[#9a4b0b]">Commande</p>
                <h2 class="mt-2 text-xl font-semibold text-[#2b170c]">Commande n°{{ $commande->id }}</h2>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                <div class="space-y-2">
                    <p><span class="font-semibold text-[#2b170c]">Nom :</span> {{ $commande->nom }}</p>
                    <p><span class="font-semibold text-[#2b170c]">Email :</span> {{ $commande->email }}</p>
                    <p><span class="font-semibold text-[#2b170c]">Adresse :</span> {{ $commande->adresse }}</p>
                </div>
                <div class="space-y-2">
                    <p><span class="font-semibold text-[#2b170c]">Produit :</span> {{ $commande->produit->nom }}</p>
                    <p><span class="font-semibold text-[#2b170c]">Prix :</span> {{ number_format($commande->produit->prix, 2, ',', ' ') }} €</p>
                    <p><span class="font-semibold text-[#2b170c]">Statut :</span> {{ ucfirst($commande->etat) }}</p>
                </div>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                <p><span class="font-semibold text-[#2b170c]">Date de commande :</span> {{ $commande->created_at }}</p>
                <p><span class="font-semibold text-[#2b170c]">Disponibilité prévue :</span> {{ $commande->date_disponibilite }}</p>
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('commande.historique') }}" class="inline-flex rounded-full bg-[#d97706] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-[#c2410c]/25 transition hover:bg-[#f59e0b]">Retour à l'historique</a>
        </div>
    </div>
</div>
@endsection
