<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ViteCom')</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @endif
</head>
<body class="@yield('body-class')">
    <header class="sticky top-0 z-30 border-b border-white/70 bg-white/95 backdrop-blur-md">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-6 py-3 lg:px-10 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-center justify-between gap-3">
                <a href="{{ url('/') }}" class="flex items-center gap-3 text-sm font-semibold text-[#2b170c] transition hover:text-[#c1620f]">
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-[#fb923c] to-[#f97316] text-white shadow-lg shadow-[#f97316]/20">
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2l8 14H4L12 2z" />
                            <path d="M12 22V8" />
                        </svg>
                    </span>
                    <span>
                        <div class="text-lg font-semibold">ViteCom</div>
                        <div class="text-xs text-[#7c4a16]">Énergie & précommande</div>
                    </span>
                </a>
                <div class="flex items-center gap-3 lg:hidden">
                    <a href="{{ route('login') }}" class="rounded-full border border-[#f97316] bg-[#fff7ed] px-3 py-2 text-xs font-semibold text-[#c1620f] transition hover:bg-[#f97316] hover:text-white">Connexion</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="rounded-full bg-[#f97316] px-3 py-2 text-xs font-semibold text-white transition hover:bg-[#ea580c]">Inscription</a>
                    @endif
                </div>
            </div>
            <div class="flex flex-col gap-3 text-sm font-medium text-[#5f4330] md:flex-row md:items-center md:gap-8">
                <a href="{{ url('/') }}#home" class="transition hover:text-[#c1620f]">Accueil</a>
                <a href="{{ url('/') }}#about" class="transition hover:text-[#c1620f]">À propos</a>
                <a href="{{ url('/') }}#services" class="transition hover:text-[#c1620f]">Services</a>
                <a href="{{ route('produits.index') }}" class="transition hover:text-[#c1620f]">Produits</a>
                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('login') }}" class="rounded-full border border-[#f97316] bg-[#fff7ed] px-4 py-2 text-sm font-semibold text-[#c1620f] transition hover:bg-[#f97316] hover:text-white">Connexion</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="rounded-full bg-[#f97316] px-4 py-2 text-sm font-semibold text-white transition hover:bg-[#ea580c]">Inscription</a>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <div id="top"></div>
    @yield('content')
    <footer class="border-t border-white/70 bg-white/90 py-10 text-[#5f4330] backdrop-blur-md">
        <div class="mx-auto flex max-w-7xl flex-col gap-8 px-6 lg:flex-row lg:items-start lg:justify-between lg:px-10">
            <div class="max-w-xl space-y-4">
                <div class="flex items-center gap-3">
                    <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-[#fb923c] to-[#f97316] text-white shadow-lg shadow-[#f97316]/20">
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2l8 14H4L12 2z" />
                            <path d="M12 22V8" />
                        </svg>
                    </span>
                    <div>
                        <div class="text-lg font-semibold text-[#2b170c]">ViteCom</div>
                        <div class="text-sm text-[#7c4a16]">Énergie & précommande</div>
                    </div>
                </div>
                <p class="text-sm leading-7 text-[#5f4330]/90">ViteCom offre une expérience premium à chaque visiteur. Nos pages sont conçues pour inspirer confiance et encourager les précommandes.</p>
            </div>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-[0.3em] text-[#9a4b0b]">Liens utiles</h3>
                    <ul class="mt-4 space-y-3 text-sm leading-7">
                        <li><a href="{{ url('/') }}#home" class="transition hover:text-[#c1620f]">Accueil</a></li>
                        <li><a href="{{ url('/') }}#about" class="transition hover:text-[#c1620f]">À propos</a></li>
                        <li><a href="{{ url('/') }}#services" class="transition hover:text-[#c1620f]">Services</a></li>
                        <li><a href="{{ route('produits.index') }}" class="transition hover:text-[#c1620f]">Produits</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-[0.3em] text-[#9a4b0b]">Contacts</h3>
                    <ul class="mt-4 space-y-3 text-sm leading-7">
                        <li>Email : <a href="mailto:contact@vitecom.com" class="font-semibold text-[#c1620f]">contact@vitecom.com</a></li>
                        <li>Téléphone : <span class="font-semibold text-[#2b170c]">+229 0150434710</span></li>
                        <li>Paris, France</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-[0.3em] text-[#9a4b0b]">Restez informé</h3>
                    <p class="mt-4 text-sm leading-7 text-[#5f4330]/90">Inscrivez-vous pour recevoir nos nouveautés et nos offres dédiées aux boutiques de précommande.</p>
                </div>
            </div>
        </div>
        <div class="mx-auto mt-10 max-w-7xl border-t border-white/70 px-6 pt-6 text-center text-sm text-[#7c4a16] lg:px-10">© {{ date('Y') }} ViteCom. Tous droits réservés.</div>
    </footer>
    <a href="#top" class="fixed bottom-5 right-5 z-40 inline-flex items-center gap-2 rounded-full bg-[#f97316] px-4 py-3 text-sm font-semibold text-white shadow-xl shadow-[#f97316]/30 transition hover:bg-[#ea580c]">
        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 15l7-7 7 7" /></svg>
        Retour en haut
    </a>
</body>
</html>
