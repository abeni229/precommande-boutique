@extends('layouts.app')

@section('title', 'Notifications - ViteCom')
@section('body-class', 'bg-[#fff4e8] text-[#2b170c]')

@section('content')
<div class="mx-auto max-w-5xl px-6 py-10 sm:px-8 lg:px-10">
    <div class="rounded-[2rem] border border-white/80 bg-white/95 p-8 shadow-xl shadow-[#a84d05]/10">
        <div class="mb-8">
            <p class="text-sm uppercase tracking-[0.35em] text-[#b45309]/90">Notifications</p>
            <h1 class="mt-3 text-3xl font-semibold text-[#2b170c]">Vos notifications récentes</h1>
            <p class="mt-3 text-sm leading-6 text-[#5f4330]">Suivez les alertes de commande et les mises à jour de votre boutique.</p>
        </div>
        @if($notifications->count() > 0)
            <div class="space-y-4">
                @foreach($notifications as $notification)
                    <div class="rounded-[1.75rem] border border-[#f3e0cc] bg-[#fff7ed] p-5 shadow-sm">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-[#5f4330]">{{ $notification->message }}</p>
                                @if($notification->is_viewed)
                                    <span class="mt-2 inline-flex rounded-full bg-[#dcfce7] px-3 py-1 text-xs font-semibold uppercase tracking-[0.24em] text-[#166534]">Lue</span>
                                @else
                                    <span class="mt-2 inline-flex rounded-full bg-[#fef3c7] px-3 py-1 text-xs font-semibold uppercase tracking-[0.24em] text-[#92400e]">Nouvelle</span>
                                @endif
                            </div>
                            <form method="POST" action="{{ route('notification.markAsRead', $notification->id) }}" class="shrink-0">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-[#d97706] px-4 py-2 text-sm font-semibold text-white transition hover:bg-[#f59e0b]" {{ $notification->is_viewed ? 'disabled' : '' }}>
                                    Marquer comme lue
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-sm leading-7 text-[#5f4330]">Aucune notification pour le moment. Revenez bientôt pour suivre les dernières actualités.</p>
        @endif
    </div>
</div>
@endsection
