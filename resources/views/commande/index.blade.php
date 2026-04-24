@extends('layouts.app')

@section('title', 'Mes commandes - ViteCom')
@section('body-class', 'bg-[#fff4e8] text-[#2b170c]')

@section('content')
<div class="mx-auto max-w-5xl px-6 py-10 sm:px-8 lg:px-10">
    <div class="rounded-[2rem] border border-white/80 bg-white/95 p-8 shadow-xl shadow-[#a84d05]/10">
        <div class="mb-8 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.35em] text-[#b45309]/90">Mes commandes</p>
                <h1 class="mt-3 text-3xl font-semibold text-[#2b170c]">Suivi de vos commandes</h1>
            </div>
        </div>

        <div class="overflow-hidden rounded-[1.75rem] border border-[#f3e0cc] bg-[#fff7ed]">
            <table class="min-w-full divide-y divide-[#f3e3d0] text-sm text-[#5f4330]">
                <thead class="bg-[#fff2e8] text-left text-xs uppercase tracking-[0.3em] text-[#9a4b0b]">
                    <tr>
                        <th class="px-6 py-4">Produit</th>
                        <th class="px-6 py-4">État</th>
                        <th class="px-6 py-4">Disponibilité</th>
                        <th class="px-6 py-4">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#f3e3d0] bg-white">
                    @foreach($commandes as $commande)
                        <tr>
                            <td class="px-6 py-4">{{ $commande->produit->nom }}</td>
                            <td class="px-6 py-4">{{ ucfirst($commande->etat) }}</td>
                            <td class="px-6 py-4">{{ $commande->date_disponibilite }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('commande.show', $commande->id) }}" class="inline-flex rounded-full bg-[#d97706] px-4 py-2 text-xs font-semibold text-white transition hover:bg-[#f59e0b]">Détails</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
