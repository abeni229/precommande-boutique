@extends('layouts.app')

@section('title', 'Boutique Précommande')
@section('body-class', 'relative min-h-screen overflow-hidden bg-[#fff5eb] text-[#2b170c]')

@section('content')
<div class="relative min-h-screen overflow-hidden">
    <div class="hero-bg"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-[#fff4e1]/80 via-[#fffaf4]/70 to-[#fff2e2]/95"></div>
    <div class="relative z-10 px-6 py-16 lg:px-10 lg:py-24">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-16 lg:grid-cols-[1.2fr_0.8fr] lg:items-center">
                <div class="space-y-8">
                    <div class="inline-flex items-center rounded-full bg-white/90 px-4 py-2 text-sm font-semibold tracking-[0.28em] text-[#c1620f] shadow-sm shadow-[#c1620f]/10">
                        Boutique précommande
                    </div>
                    <div class="space-y-6">
                        <h1 class="text-4xl font-semibold tracking-tight text-[#2b170c] sm:text-5xl lg:text-6xl">Un design chaleureux pour vendre en précommande avec style.</h1>
                        <p class="max-w-2xl text-lg leading-8 text-[#5f4330]/90">Des images de fond animées, des couleurs accueillantes et des appels à l’action clairs pour transformer chaque visiteur en client enthousiaste.</p>
                    </div>
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-full bg-[#d97706] px-7 py-3 text-sm font-semibold text-white shadow-lg shadow-[#c2410c]/30 transition hover:bg-[#f59e0b]">Se connecter</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-full border border-[#d97706] bg-white/95 px-7 py-3 text-sm font-semibold text-[#92400e] transition hover:border-[#ea8a0e] hover:bg-[#fff7ed]">Créer un compte</a>
                        @endif
                    </div>
                    <div class="grid gap-4 sm:grid-cols-3">
                        <div class="rounded-[2rem] border border-white/70 bg-white/80 p-6 shadow-xl shadow-[#a84d05]/10">
                            <p class="text-sm font-semibold text-[#9a4b0b]">Ambiance premium</p>
                            <p class="mt-3 text-sm leading-6 text-[#5f4330]">Un environnement visuel chaleureux qui fait rêver vos clients avant l’achat.</p>
                        </div>
                        <div class="rounded-[2rem] border border-white/70 bg-white/80 p-6 shadow-xl shadow-[#a84d05]/10">
                            <p class="text-sm font-semibold text-[#9a4b0b]">Confiance rapide</p>
                            <p class="mt-3 text-sm leading-6 text-[#5f4330]">Présentez vos produits comme des exclusivités et créez un sentiment d’urgence doux.</p>
                        </div>
                        <div class="rounded-[2rem] border border-white/70 bg-white/80 p-6 shadow-xl shadow-[#a84d05]/10">
                            <p class="text-sm font-semibold text-[#9a4b0b]">Navigation fluide</p>
                            <p class="mt-3 text-sm leading-6 text-[#5f4330]">Un parcours simple et agréable pour l’inscription et la découverte produit.</p>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-hidden rounded-[2rem] border border-white/70 bg-white/70 p-6 shadow-2xl shadow-[#a84d05]/20 backdrop-blur-xl sm:p-8 lg:p-10">
                    <div class="absolute inset-x-0 top-0 h-1/2 bg-gradient-to-b from-[#fcd34d]/50 to-transparent"></div>
                    <div class="relative space-y-6">
                        <div class="rounded-[1.75rem] border border-[#fcd34d]/20 bg-[#fff7ed]/90 p-6 shadow-[0_28px_70px_-30px_rgba(168,77,5,0.25)]">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <p class="text-xs uppercase tracking-[0.3em] text-[#92400e]/70">Précommande</p>
                                    <h3 class="mt-3 text-xl font-semibold text-[#2b170c]">Edition limitée</h3>
                                </div>
                                <span class="rounded-full bg-[#f59e0b]/15 px-3 py-1 text-xs font-semibold text-[#b45309]">Bientôt</span>
                            </div>
                            <p class="mt-6 text-sm leading-6 text-[#5f4330]">Créez une collection de précommande belle et rassurante qui met en valeur la rareté de vos produits.</p>
                        </div>
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-[1.75rem] border border-[#f59e0b]/20 bg-[#fff4e1]/90 p-5">
                                <p class="text-sm text-[#7c4a16]">Taux de conversion estimé</p>
                                <p class="mt-4 text-3xl font-semibold text-[#2b170c]">+28%</p>
                            </div>
                            <div class="rounded-[1.75rem] border border-[#f59e0b]/20 bg-[#fff4e1]/90 p-5">
                                <p class="text-sm text-[#7c4a16]">Temps de mise en ligne</p>
                                <p class="mt-4 text-3xl font-semibold text-[#2b170c]">Moins de 10 min</p>
                            </div>
                        </div>
                        <div class="rounded-[2rem] bg-gradient-to-br from-[#fed7aa]/70 via-[#ffffff]/80 to-[#fef3c7]/70 p-4 text-sm text-[#5f4330]">
                            <p class="font-semibold text-[#974a0b]">Une page d’accueil qui rassure et convertit.</p>
                            <p class="mt-3">Des visuels doux, des textures chaleureuses et une mise en page moderne pour renforcer l’envie d’acheter.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
