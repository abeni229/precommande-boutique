@extends('layouts.app')

@section('title', 'Tableau de bord Admin - ViteCom')
@section('body-class', 'bg-[#fff4e8] text-[#2b170c]')

@section('content')
<div class="mx-auto max-w-6xl px-6 py-10 sm:px-8 lg:px-10">
    <div class="rounded-[2rem] border border-white/80 bg-white/95 p-8 shadow-xl shadow-[#a84d05]/10">
        <div class="mb-8 flex flex-col gap-6 rounded-[1.75rem] border border-[#f3e0cc] bg-[#fff7ed] p-6 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.35em] text-[#b45309]/90">Tableau de bord</p>
                <h1 class="mt-3 text-3xl font-semibold text-[#2b170c]">Bienvenue, administrateur</h1>
                <p class="mt-2 text-sm leading-6 text-[#5f4330]">Gérez vos produits, vos commandes et vos notifications en toute sécurité.</p>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="rounded-full bg-[#d97706] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-[#f97316]/20 transition hover:bg-[#f59e0b]">Se déconnecter</button>
            </form>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <a href="{{ route('admin.commandes') }}" class="rounded-[1.75rem] border border-[#f7d6ab] bg-[#fff7ed] p-6 transition hover:bg-[#fdf1e1]">
                <p class="text-xs uppercase tracking-[0.3em] text-[#9a4b0b]">Commandes</p>
                <h2 class="mt-4 text-xl font-semibold text-[#2b170c]">Gérer les commandes</h2>
                <p class="mt-3 text-sm leading-6 text-[#6b4b32]">Validez, refusez et suivez chaque précommande depuis un espace clair.</p>
            </a>
            <a href="{{ route('admin.produits') }}" class="rounded-[1.75rem] border border-[#f7d6ab] bg-[#fff7ed] p-6 transition hover:bg-[#fdf1e1]">
                <p class="text-xs uppercase tracking-[0.3em] text-[#9a4b0b]">Produits</p>
                <h2 class="mt-4 text-xl font-semibold text-[#2b170c]">Gérer les produits</h2>
                <p class="mt-3 text-sm leading-6 text-[#6b4b32]">Ajoutez, modifiez ou supprimez rapidement les offres visibles sur votre boutique.</p>
            </a>
        </div>
    </div>
</div>
@endsection
