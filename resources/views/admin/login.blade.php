@extends('layouts.app')

@section('title', 'Connexion Admin - ViteCom')
@section('body-class', 'relative min-h-screen overflow-hidden bg-[#fff3e4] text-[#2b170c]')

@section('content')
<div class="relative min-h-screen overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-[#fff7f0]/90 via-[#fff0e1]/85 to-[#ffeed8]/95"></div>
    <div class="relative z-10 flex min-h-screen items-center justify-center px-4 py-10">
        <div class="w-full max-w-md rounded-[2rem] border border-white/80 bg-white/95 p-8 shadow-xl shadow-[#d97706]/10">
            <div class="mb-8 text-center">
                <p class="text-sm uppercase tracking-[0.35em] text-[#b45309]/90">Espace administrateur</p>
                <h1 class="mt-4 text-3xl font-semibold text-[#2b170c]">Connexion Admin</h1>
                <p class="mt-3 text-sm leading-6 text-[#6b4b32]">Accédez à votre interface sécurisée pour gérer produits et commandes.</p>
            </div>
            @if(session('error'))
                <div class="mb-6 rounded-3xl border border-[#fbbf24]/40 bg-[#fee2b3] px-4 py-3 text-sm text-[#92400e]">{{ session('error') }}</div>
            @endif
            <form action="{{ route('admin.login') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-[#5f4330]">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required class="mt-2 w-full rounded-2xl border border-[#d1b29d] bg-[#fff6f0] px-4 py-3 text-sm text-[#2b170c] shadow-sm focus:border-[#d97706] focus:outline-none focus:ring-2 focus:ring-[#fbbf24]/30" />
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-[#5f4330]">Mot de passe</label>
                    <input type="password" name="password" id="password" required class="mt-2 w-full rounded-2xl border border-[#d1b29d] bg-[#fff6f0] px-4 py-3 text-sm text-[#2b170c] shadow-sm focus:border-[#d97706] focus:outline-none focus:ring-2 focus:ring-[#fbbf24]/30" />
                </div>
                <button type="submit" class="w-full rounded-full bg-[#d97706] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-[#c2410c]/25 transition hover:bg-[#f59e0b]">Se connecter</button>
            </form>
        </div>
    </div>
</div>
@endsection
