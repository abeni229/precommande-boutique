@extends('layouts.app')

@section('title', 'Services - ViteCom')
@section('body-class', 'min-h-screen bg-[#fff5eb] text-[#2b170c]')

@section('content')
<div class="relative min-h-screen">
    <div class="hero-bg"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-[#fff4e1]/80 via-[#fffaf4]/70 to-[#fff2e2]/95"></div>
    <div class="relative z-10 px-6 py-16 lg:px-10 lg:py-24">
        <div class="mx-auto max-w-6xl space-y-12">
            <div class="rounded-[2rem] border border-white/80 bg-white/95 p-10 shadow-xl shadow-[#a84d05]/10">
                <span class="inline-flex rounded-full bg-[#fef3c7] px-4 py-2 text-xs font-semibold uppercase tracking-[0.3em] text-[#c1620f]">Services</span>
                <h1 class="mt-6 text-4xl font-semibold tracking-tight text-[#2b170c] sm:text-5xl">Services sur mesure pour votre boutique de précommande</h1>
                <p class="mt-6 max-w-3xl text-lg leading-8 text-[#5f4330]">ViteCom propose des services pensés pour accompagner votre marque à chaque étape : du concept produit à la gestion de vos commandes, en passant par un design attractif.</p>
            </div>
            <div class="grid gap-8 lg:grid-cols-3">
                <div class="rounded-[2rem] border border-white/80 bg-[#fff7ed]/90 p-8 shadow-xl shadow-[#a84d05]/10">
                    <h3 class="text-xl font-semibold text-[#2b170c]">Lancement express</h3>
                    <p class="mt-4 text-sm leading-7 text-[#5f4330]">Préparez votre page de précommande rapidement avec un design professionnel et un message clair.</p>
                </div>
                <div class="rounded-[2rem] border border-white/80 bg-[#fff7ed]/90 p-8 shadow-xl shadow-[#a84d05]/10">
                    <h3 class="text-xl font-semibold text-[#2b170c]">Optimisation conversion</h3>
                    <p class="mt-4 text-sm leading-7 text-[#5f4330]">Nous concevons des parcours visuels qui facilitent l’achat et renforcent la confiance de vos visiteurs.</p>
                </div>
                <div class="rounded-[2rem] border border-white/80 bg-[#fff7ed]/90 p-8 shadow-xl shadow-[#a84d05]/10">
                    <h3 class="text-xl font-semibold text-[#2b170c]">Support produit</h3>
                    <p class="mt-4 text-sm leading-7 text-[#5f4330]">Simplifiez la gestion de vos produits et suivez les précommandes avec des outils clairs et intuitifs.</p>
                </div>
            </div>
            <div class="rounded-[2rem] border border-white/80 bg-[#fffaf1]/90 p-10 shadow-xl shadow-[#a84d05]/10">
                <h2 class="text-3xl font-semibold text-[#2b170c]">Ce que ViteCom apporte à votre marque</h2>
                <ul class="mt-6 space-y-4 text-sm leading-7 text-[#5f4330]">
                    <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-[#f97316]/10 text-[#d97706]">✓</span>Une présence de marque chaleureuse et professionnelle.</li>
                    <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-[#f97316]/10 text-[#d97706]">✓</span>Une expérience claire pour convertir vos visiteurs en acheteurs.</li>
                    <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-[#f97316]/10 text-[#d97706]">✓</span>Un accompagnement adapté à vos précommandes, du lancement aux notifications.</li>
                </ul>
                <div class="mt-8 flex flex-col gap-4 sm:flex-row sm:items-center">
                    <a href="{{ url('/') }}#services" class="inline-flex items-center justify-center rounded-full border border-[#d97706] bg-white px-6 py-3 text-sm font-semibold text-[#92400e] transition hover:bg-[#fff7ed]">Retour aux services</a>
                    <a href="{{ route('produits.index') }}" class="inline-flex items-center justify-center rounded-full bg-[#d97706] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#f59e0b]">Voir les produits</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
