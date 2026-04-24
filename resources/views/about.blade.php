@extends('layouts.app')

@section('title', 'À propos - ViteCom')
@section('body-class', 'min-h-screen bg-[#fff5eb] text-[#2b170c]')

@section('content')
<div class="relative min-h-screen">
    <div class="hero-bg"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-[#fff4e1]/80 via-[#fffaf4]/70 to-[#fff2e2]/95"></div>
    <div class="relative z-10 px-6 py-16 lg:px-10 lg:py-24">
        <div class="mx-auto max-w-6xl space-y-12">
            <div class="rounded-[2rem] border border-white/80 bg-white/95 p-10 shadow-xl shadow-[#a84d05]/10">
                <span class="inline-flex rounded-full bg-[#fef3c7] px-4 py-2 text-xs font-semibold uppercase tracking-[0.3em] text-[#c1620f]">À propos</span>
                <h1 class="mt-6 text-4xl font-semibold tracking-tight text-[#2b170c] sm:text-5xl">Bienvenue chez ViteCom</h1>
                <p class="mt-6 max-w-3xl text-lg leading-8 text-[#5f4330]">ViteCom est une boutique dédiée aux précommandes premium, conçue pour les marques qui veulent un lancement élégant, rapide et rassurant. Notre approche combine une expérience visuelle chaleureuse et des parcours clients fluides pour booster vos conversions.</p>
                <div class="mt-8 grid gap-6 sm:grid-cols-2">
                    <div class="rounded-[1.75rem] border border-[#f7c16c]/30 bg-[#fff7ed]/90 p-6 shadow-lg shadow-[#f7a82c]/10">
                        <h2 class="text-xl font-semibold text-[#2b170c]">Notre mission</h2>
                        <p class="mt-3 text-sm leading-7 text-[#5f4330]">Permettre à chaque créateur de proposer une collection en précommande avec un design premium et une narration engageante.</p>
                    </div>
                    <div class="rounded-[1.75rem] border border-[#f7c16c]/30 bg-[#fff7ed]/90 p-6 shadow-lg shadow-[#f7a82c]/10">
                        <h2 class="text-xl font-semibold text-[#2b170c]">Notre promesse</h2>
                        <p class="mt-3 text-sm leading-7 text-[#5f4330]">Créer un espace vendeur chaleureux où vos produits sont perçus comme uniques, exclusifs et désirables.</p>
                    </div>
                </div>
                <div class="mt-8 flex flex-col gap-4 sm:flex-row sm:items-center">
                    <a href="{{ route('services') }}" class="inline-flex items-center justify-center rounded-full bg-[#d97706] px-7 py-3 text-sm font-semibold text-white shadow-lg shadow-[#c2410c]/30 transition hover:bg-[#f59e0b]">Nos services</a>
                    <a href="{{ route('produits.index') }}" class="inline-flex items-center justify-center rounded-full border border-[#d97706] bg-white px-7 py-3 text-sm font-semibold text-[#92400e] transition hover:border-[#ea8a0e] hover:bg-[#fff7ed]">Voir les produits</a>
                </div>
            </div>
            <div class="grid gap-6 lg:grid-cols-3">
                <div class="rounded-[2rem] border border-white/80 bg-[#fffaf1]/90 p-8 shadow-xl shadow-[#a84d05]/10">
                    <h3 class="text-xl font-semibold text-[#2b170c]">Design d’impact</h3>
                    <p class="mt-4 text-sm leading-7 text-[#5f4330]">Chaque page est créée pour inspirer la confiance et stimuler l’engagement dès le premier regard.</p>
                </div>
                <div class="rounded-[2rem] border border-white/80 bg-[#fffaf1]/90 p-8 shadow-xl shadow-[#a84d05]/10">
                    <h3 class="text-xl font-semibold text-[#2b170c]">Stratégie de précommande</h3>
                    <p class="mt-4 text-sm leading-7 text-[#5f4330]">Nous aidons à positionner les offres comme des opportunités limitées, parfaites pour les campagnes de lancement.</p>
                </div>
                <div class="rounded-[2rem] border border-white/80 bg-[#fffaf1]/90 p-8 shadow-xl shadow-[#a84d05]/10">
                    <h3 class="text-xl font-semibold text-[#2b170c]">Support dédié</h3>
                    <p class="mt-4 text-sm leading-7 text-[#5f4330]">Un accompagnement clair pour gérer vos produits, vos commandes et votre image de marque.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
