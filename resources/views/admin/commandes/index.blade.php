@extends('layouts.app')

@section('title', 'Commandes - Admin ViteCom')
@section('body-class', 'bg-[#fff4e8] text-[#2b170c]')

@section('content')
<div class="mx-auto max-w-6xl px-6 py-10 sm:px-8 lg:px-10">
    <div class="rounded-[2rem] border border-white/80 bg-white/95 p-8 shadow-xl shadow-[#a84d05]/10">
        <div class="mb-8">
            <p class="text-sm uppercase tracking-[0.35em] text-[#b45309]/90">Commandes</p>
            <h1 class="mt-3 text-3xl font-semibold text-[#2b170c]">Gestion des commandes</h1>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-3xl border border-[#d1fae5] bg-[#ecfdf5] px-4 py-4 text-sm text-[#166534]">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="mb-6 rounded-3xl border border-[#fee2e2] bg-[#fef2f2] px-4 py-4 text-sm text-[#991b1b]">{{ session('error') }}</div>
        @endif

        <div class="overflow-hidden rounded-[1.75rem] border border-[#f3e0cc] bg-[#fff7ed]">
            <table class="min-w-full divide-y divide-[#f3e3d0] text-sm text-[#5f4330]">
                <thead class="bg-[#fff2e8] text-left text-xs uppercase tracking-[0.3em] text-[#9a4b0b]">
                    <tr>
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Client</th>
                        <th class="px-6 py-4">Produit</th>
                        <th class="px-6 py-4">Statut</th>
                        <th class="px-6 py-4">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#f3e3d0] bg-white">
                    @foreach($commandes as $commande)
                        <tr>
                            <td class="px-6 py-4">{{ $commande->id }}</td>
                            <td class="px-6 py-4">{{ $commande->client ? $commande->client->nom : 'Client non trouvé' }}</td>
                            <td class="px-6 py-4">{{ $commande->produit->nom }}</td>
                            <td class="px-6 py-4">{{ ucfirst($commande->etat) }}</td>
                            <td class="px-6 py-4 space-x-2">
                                @if($commande->etat === 'en_attente')
                                    <form action="{{ route('admin.commande.valider', $commande->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="inline-flex rounded-full px-4 py-2 text-sm font-semibold text-white transition" style="background-color:#f97316; box-shadow: 0 10px 24px rgba(249,115,22,0.25);" onclick="return confirm('Voulez-vous vraiment valider cette commande ?')">Valider</button>
                                    </form>
                                    <form action="{{ route('admin.commande.refuser', $commande->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="inline-flex rounded-full px-4 py-2 text-sm font-semibold text-white transition" style="background-color:#ef4444; box-shadow: 0 10px 24px rgba(239,68,68,0.25);" onclick="return confirm('Voulez-vous vraiment refuser cette commande ?')">Refuser</button>
                                    </form>
                                @else
                                    <span class="inline-flex rounded-full bg-[#f3f4f6] px-3 py-2 text-xs font-semibold text-[#374151]">{{ ucfirst($commande->etat) }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection