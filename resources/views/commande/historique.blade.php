
@extends('layouts.app')

@section('title', 'Historique des commandes - ViteCom')
@section('body-class', 'bg-[#fff4e8] text-[#2b170c]')

@section('content')
<div class="mx-auto max-w-5xl px-6 py-10 sm:px-8 lg:px-10">
    <div class="rounded-[2rem] border border-white/80 bg-white/95 p-8 shadow-xl shadow-[#a84d05]/10">
        <div class="mb-8">
            <p class="text-sm uppercase tracking-[0.35em] text-[#b45309]/90">Historique</p>
            <h1 class="mt-3 text-3xl font-semibold text-[#2b170c]">Historique de vos commandes</h1>
            <p class="mt-3 text-sm leading-6 text-[#5f4330]">Recherchez vos commandes par email et suivez leur état.</p>
        </div>
        <form method="GET" action="{{ route('commande.historique') }}" class="grid gap-4 sm:grid-cols-[1fr_auto]">
            <div>
                <label for="email" class="block text-sm font-medium text-[#5f4330]">Votre email</label>
                <input type="email" name="email" id="email" class="mt-2 w-full rounded-2xl border border-[#d1b29d] bg-[#fff6f0] px-4 py-3 text-sm text-[#2b170c] shadow-sm focus:border-[#d97706] focus:outline-none focus:ring-2 focus:ring-[#fbbf24]/30" required />
            </div>
            <button type="submit" class="inline-flex items-center justify-center rounded-full bg-[#d97706] px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-[#c2410c]/25 transition hover:bg-[#f59e0b]">Voir l'historique</button>
        </form>

        @if(isset($commandes) && $commandes->count() > 0)
            <div class="mt-8 overflow-hidden rounded-[1.75rem] border border-[#f3e0cc] bg-[#fff7ed]">
                <table class="min-w-full divide-y divide-[#f3e3d0] text-sm text-[#5f4330]">
                    <thead class="bg-[#fff2e8] text-left text-xs uppercase tracking-[0.3em] text-[#9a4b0b]">
                        <tr>
                            <th class="px-6 py-4">Produit</th>
                            <th class="px-6 py-4">État</th>
                            <th class="px-6 py-4">Disponibilité</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#f3e3d0] bg-white">
                        @foreach($commandes as $commande)
                            <tr>
                                <td class="px-6 py-4">{{ $commande->produit->nom }}</td>
                                <td class="px-6 py-4">{{ ucfirst($commande->etat) }}</td>
                                <td class="px-6 py-4">{{ $commande->date_disponibilite }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="mt-8 text-sm leading-7 text-[#5f4330]">Aucune commande trouvée pour cet email. Essayez de vérifier votre saisie ou passez une nouvelle commande.</p>
        @endif
    </div>
</div>
@endsection
