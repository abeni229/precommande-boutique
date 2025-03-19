@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Vos notifications</h2>

    @if($notifications->count() > 0)
        <ul class="list-group">
            @foreach($notifications as $notification)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        {{ $notification->message }}  
                        @if($notification->is_viewed)
                            <span class="badge bg-success ms-2">Lue</span>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('notification.markAsRead', $notification->id) }}">
                        @csrf
                        @method('PATCH') 
                        <button type="submit" class="btn btn-sm btn-success" 
                            {{ $notification->is_viewed ? 'disabled' : '' }}>
                            Marquer comme lue
                        </button>
                    </form>
                    
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">Aucune notification.</p>
    @endif
</div>
@endsection
