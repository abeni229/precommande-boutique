@extends('layouts.app')

@section('title', 'Produits - ViteCom')
@section('body-class', 'bg-[#fff5eb] text-[#2b170c]')

@section('content')
<div class="relative bg-[#fff5eb] pb-20">
    <div class="hero-bg"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-[#fff4e1]/90 via-[#fffaf4]/80 to-[#fff2e2]/95"></div>
    <div class="relative z-10 px-6 py-16 lg:px-10 lg:py-20">
        <div class="mx-auto max-w-7xl space-y-14">
            <section class="rounded-[2rem] border border-white/80 bg-white/90 p-10 shadow-xl shadow-[#a84d05]/10 backdrop-blur-xl">
                <div class="grid gap-8 lg:grid-cols-[1.3fr_0.9fr] lg:items-start">
                    <div class="space-y-3">
                        <p class="text-sm uppercase tracking-[0.32em] text-[#c1620f]/90">Produits</p>
                        <h1 class="text-4xl font-semibold tracking-tight text-[#2b170c] sm:text-5xl">Découvrez les collections ViteCom en précommande</h1>
                        <p class="max-w-2xl text-lg leading-8 text-[#5f4330]/90">Parcourez les produits disponibles, repérez les exclusivités et lancez votre précommande en quelques clics. La recherche est là pour vous faire gagner du temps.</p>
                    </div>
                    <div class="space-y-6">
                        <div class="rounded-[2rem] bg-[#fff7ed]/90 p-6 shadow-inner shadow-[#fbbf24]/10">
                            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-[#9a4b0b]">Statut actuel</p>
                            <p class="mt-4 text-3xl font-semibold text-[#2b170c]">{{ $produits->count() }} articles</p>
                            <p class="mt-3 text-sm leading-7 text-[#5f4330]">Une sélection mise à jour pour vos précommandes les plus rapides.</p>
                        </div>
                        <div class="rounded-[2rem] bg-[#fffaf1]/95 p-6 shadow-xl shadow-[#f3c16b]/10">
                            <p class="text-sm uppercase tracking-[0.3em] text-[#c1620f]">Recherche rapide</p>
                            <form method="GET" action="{{ route('produits.index') }}" class="mt-5 grid gap-4">
                                <label class="sr-only" for="search">Rechercher un produit</label>
                                <input id="search" name="search" type="text" value="{{ request()->query('search') }}" placeholder="Rechercher un produit" class="w-full rounded-3xl border border-[#f3e3d0] bg-white px-5 py-4 text-sm text-[#4c3520] shadow-sm outline-none transition focus:border-[#f97316] focus:ring-4 focus:ring-[#f97316]/10" />
                                <button type="submit" class="inline-flex w-full items-center justify-center rounded-full bg-[#f97316] px-6 py-4 text-sm font-semibold text-white shadow-lg shadow-[#f97316]/25 transition hover:bg-[#ea580c]">Rechercher</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section class="masonry-grid">
                @if($produits->isEmpty())
                    <div class="col-span-full rounded-[2rem] border border-white/80 bg-[#fff7ed]/90 p-10 text-center shadow-xl shadow-[#a84d05]/10">
                        <h2 class="text-2xl font-semibold text-[#2b170c]">Aucun produit trouvé</h2>
                        <p class="mt-4 text-sm leading-7 text-[#5f4330]">Essayez un autre mot clé ou revenez bientôt pour découvrir de nouvelles exclusivités.</p>
                    </div>
                @else
                    @foreach ($produits as $produit)
                        <article class="masonry-item group overflow-hidden rounded-[2rem] bg-white/95 shadow-xl shadow-[#a84d05]/10 transition duration-300 hover:-translate-y-1 hover:shadow-2xl">
                            <div class="relative overflow-hidden rounded-[2rem] bg-[#f5ebdd]">
                                <img src="{{ $produit->image_url }}" alt="{{ $produit->nom }}" class="w-full object-cover transition duration-500 group-hover:scale-105" style="aspect-ratio: 4 / 5;" />
                                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 to-transparent px-5 py-5">
                                    <p class="text-xs uppercase tracking-[0.3em] text-white/80">Produit</p>
                                    <h3 class="mt-2 text-xl font-semibold text-white">{{ $produit->nom }}</h3>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex flex-wrap items-center justify-between gap-3">
                                    <span class="rounded-full bg-[#fde68a]/90 px-3 py-1 text-xs font-semibold uppercase tracking-[0.24em] text-[#92400e]">Prix</span>
                                    <span class="text-xs uppercase tracking-[0.3em] text-[#7c4a16]">{{ ucfirst($produit->statut) }}</span>
                                </div>
                                <p class="mt-4 text-3xl font-semibold text-[#2b170c]">{{ number_format($produit->prix, 2, ',', ' ') }} €</p>
                                <p class="mt-4 text-sm leading-7 text-[#5f4330]">{{ Str::limit($produit->description ?? 'Précommande disponible, stock limité.', 100) }}</p>
                                <form action="{{ route('precommande', $produit->id) }}" method="POST" class="mt-6">
                                    @csrf
                                    <button type="submit" class="inline-flex w-full items-center justify-center rounded-full bg-[#d97706] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-[#c2410c]/25 transition hover:bg-[#f59e0b]">Précommander</button>
                                </form>
                            </div>
                        </article>
                    @endforeach
                @endif
            </section>

            @if(method_exists($produits, 'links'))
                <div class="mt-8 rounded-[2rem] border border-white/80 bg-white/90 p-6 text-center shadow-xl shadow-[#a84d05]/10">
                    {{ $produits->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
