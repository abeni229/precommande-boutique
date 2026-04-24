@extends('layouts.app')

@section('title', 'ViteCom')
@section('body-class', 'relative min-h-screen bg-[#fff5eb] text-[#2b170c]')

@section('content')
<div class="relative min-h-screen" id="home">
    <div class="hero-bg"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-[#fff4e1]/80 via-[#fffaf4]/70 to-[#fff2e2]/95"></div>
    <div class="relative z-10 px-6 py-16 lg:px-10 lg:py-24">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-16 lg:grid-cols-[1.2fr_0.8fr] lg:items-center">
                <div class="space-y-8">
                    <div class="inline-flex items-center gap-3 rounded-full bg-white/90 px-4 py-2 text-sm font-semibold tracking-[0.28em] text-[#c1620f] shadow-sm shadow-[#c1620f]/10">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#f97316] text-white">V</span>
                        ViteCom
                    </div>
                    <div class="space-y-6">
                        <h1 class="text-4xl font-semibold tracking-tight text-[#2b170c] sm:text-5xl lg:text-6xl">Vendez mieux. Précommandez plus vite. Brillez plus fort.</h1>
                        <p class="max-w-2xl text-lg leading-8 text-[#5f4330]/90">ViteCom transforme votre boutique de précommande avec une identité premium, des parcours clairs et une expérience visuelle engageante.</p>
                    </div>
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                        <a href="{{ route('produits.index') }}" class="inline-flex items-center justify-center rounded-full bg-[#d97706] px-7 py-3 text-sm font-semibold text-white shadow-lg shadow-[#c2410c]/30 transition hover:bg-[#f59e0b]">Voir les produits</a>
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-full border border-[#d97706] bg-white/95 px-7 py-3 text-sm font-semibold text-[#92400e] transition hover:border-[#ea8a0e] hover:bg-[#fff7ed]">Créer un compte</a>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-3">
                        <a href="{{ url('/#about') }}" class="group rounded-[2rem] border border-white/70 bg-white/80 p-6 shadow-xl shadow-[#a84d05]/10 transition hover:-translate-y-1 hover:bg-[#fff7ed]/95">
                            <p class="text-sm font-semibold text-[#9a4b0b]">À propos</p>
                            <p class="mt-3 text-sm leading-6 text-[#5f4330]">Découvrez pourquoi ViteCom est conçu pour les marques qui veulent un lancement rapide et élégant.</p>
                        </a>
                        <a href="{{ url('/#services') }}" class="group rounded-[2rem] border border-white/70 bg-white/80 p-6 shadow-xl shadow-[#a84d05]/10 transition hover:-translate-y-1 hover:bg-[#fff7ed]/95">
                            <p class="text-sm font-semibold text-[#9a4b0b]">Services</p>
                            <p class="mt-3 text-sm leading-6 text-[#5f4330]">Voyez nos services pensés pour gérer vos précommandes, vos ventes et votre image de marque.</p>
                        </a>
                        <a href="{{ route('produits.index') }}" class="group rounded-[2rem] border border-white/70 bg-white/80 p-6 shadow-xl shadow-[#a84d05]/10 transition hover:-translate-y-1 hover:bg-[#fff7ed]/95">
                            <p class="text-sm font-semibold text-[#9a4b0b]">Produits</p>
                            <p class="mt-3 text-sm leading-6 text-[#5f4330]">Parcourez les dernières précommandes et inspirez-vous pour votre prochaine collection.</p>
                        </a>
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

            <section id="about" class="mt-20 rounded-[2rem] border border-white/80 bg-white/90 p-10 shadow-xl shadow-[#a84d05]/10 backdrop-blur-xl">
                <div class="grid gap-10 lg:grid-cols-[0.9fr_0.7fr] lg:items-center">
                    <div class="space-y-6">
                        <span class="inline-flex rounded-full bg-[#fef3c7] px-4 py-2 text-sm font-semibold text-[#b45309]">À propos</span>
                        <h2 class="text-3xl font-semibold text-[#2b170c]">ViteCom : l’univers chaleureux de la précommande</h2>
                        <p class="max-w-2xl text-base leading-8 text-[#5f4330]">Nous aidons les créateurs et les marques à lancer des collections en précommande avec un design premium, une navigation claire et une conversion optimisée.</p>
                        <div class="space-y-3 text-sm leading-7 text-[#5f4330]/90">
                            <p><strong class="text-[#9a4b0b]">Vision :</strong> faire de chaque page de précommande un moment d’envie et de confiance.</p>
                            <p><strong class="text-[#9a4b0b]">Valeur :</strong> authenticité, rapidité et élégance.</p>
                        </div>
                    </div>
                    <div class="rounded-[2rem] bg-[#fff7ed]/95 p-8 shadow-inner shadow-[#fbbf24]/10">
                        <div class="text-sm uppercase tracking-[0.3em] text-[#c1620f]/80">Notre promesse</div>
                        <h3 class="mt-4 text-2xl font-semibold text-[#2b170c]">Des pages qui inspirent l’achat dès le premier regard.</h3>
                        <p class="mt-4 text-sm leading-7 text-[#5f4330]">Avec ViteCom, votre boutique en ligne respire la qualité et la confiance. Les visiteurs trouvent rapidement les informations, les produits et le bouton d’action.</p>
                    </div>
                </div>
            </section>

            <section id="services" class="mt-16 grid gap-8 lg:grid-cols-3">
                <div class="rounded-[2rem] border border-white/80 bg-[#fff7ed]/90 p-8 shadow-xl shadow-[#a84d05]/10">
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-[#9a4b0b]">Services</p>
                    <h3 class="mt-4 text-2xl font-semibold text-[#2b170c]">Stratégie précommande</h3>
                    <p class="mt-4 text-sm leading-7 text-[#5f4330]">Nous positionnons vos offres comme des événements exclusifs pour susciter l’enthousiasme avant le lancement.</p>
                </div>
                <div class="rounded-[2rem] border border-white/80 bg-[#fff7ed]/90 p-8 shadow-xl shadow-[#a84d05]/10">
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-[#9a4b0b]">Design</p>
                    <h3 class="mt-4 text-2xl font-semibold text-[#2b170c]">Visuels premium</h3>
                    <p class="mt-4 text-sm leading-7 text-[#5f4330]">Des présentations produits soignées et une mise en page qui rassure le client à chaque étape.</p>
                </div>
                <div class="rounded-[2rem] border border-white/80 bg-[#fff7ed]/90 p-8 shadow-xl shadow-[#a84d05]/10">
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-[#9a4b0b]">Support</p>
                    <h3 class="mt-4 text-2xl font-semibold text-[#2b170c]">Accompagnement</h3>
                    <p class="mt-4 text-sm leading-7 text-[#5f4330]">Un support clair pour gérer les commandes, les notifications et les mises à jour de produits.</p>
                </div>
            </section>

            <section class="mt-16 rounded-[2rem] border border-white/80 bg-white/95 p-10 shadow-xl shadow-[#a84d05]/10">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <p class="text-sm uppercase tracking-[0.3em] text-[#9a4b0b]">Produits</p>
                        <h3 class="mt-4 text-3xl font-semibold text-[#2b170c]">Explorez nos collections en précommande</h3>
                        <p class="mt-4 max-w-2xl text-base leading-7 text-[#5f4330]">Un parcours produit clair pour les clients, avec des visuels qui donnent envie et des fiches simples à consulter.</p>
                    </div>
                    <a href="{{ route('produits.index') }}" class="inline-flex items-center justify-center rounded-full bg-[#d97706] px-7 py-3 text-sm font-semibold text-white shadow-lg shadow-[#c2410c]/25 transition hover:bg-[#f59e0b]">Voir tous les produits</a>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
