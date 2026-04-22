@extends('layouts.app')

@section('title', 'Connexion - Boutique Précommande')
@section('body-class', 'relative min-h-screen overflow-hidden bg-[#fff3e4] text-[#2b170c]')

@section('content')
<div class="relative min-h-screen overflow-hidden">
    <div class="auth-bg"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-[#fff7f0]/90 via-[#fff0e1]/85 to-[#ffeed8]/95"></div>
    <div class="relative z-10 flex min-h-screen items-center justify-center px-4 py-12">
        <div class="w-full max-w-md rounded-[2rem] border border-white/75 bg-white/90 p-8 auth-panel">
            <div class="mb-8 text-center">
                <p class="text-sm uppercase tracking-[0.35em] text-[#b45309]/90">Connexion</p>
                <h1 class="mt-4 text-3xl font-semibold text-[#2b170c]">Bienvenue de retour</h1>
                <p class="mt-3 text-sm leading-6 text-[#6b4b32]">Connectez-vous pour accéder à vos précommandes et suivre votre espace client.</p>
            </div>
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-[#5f4330]">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required class="mt-2 block w-full rounded-2xl border border-[#d1b29d] bg-[#fff6f0] px-4 py-3 text-sm text-[#2b170c] shadow-sm focus:border-[#d97706] focus:outline-none focus:ring-2 focus:ring-[#fbbf24]/30" />
                    @error('email')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="mot_de_passe" class="block text-sm font-medium text-[#5f4330]">Mot de passe</label>
                    <input id="mot_de_passe" name="mot_de_passe" type="password" required class="mt-2 block w-full rounded-2xl border border-[#d1b29d] bg-[#fff6f0] px-4 py-3 text-sm text-[#2b170c] shadow-sm focus:border-[#d97706] focus:outline-none focus:ring-2 focus:ring-[#fbbf24]/30" />
                    @error('mot_de_passe')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <button type="submit" class="w-full rounded-full bg-[#d97706] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-[#c2410c]/30 transition hover:bg-[#f59e0b]">Se connecter</button>
            </form>
            <p class="mt-6 text-center text-sm text-[#5f4330]">Vous n’avez pas de compte ? <a href="{{ route('register') }}" class="font-semibold text-[#c2410c] hover:text-[#ad3d0d]">Créer un compte</a></p>
        </div>
    </div>
</div>
@endsection
