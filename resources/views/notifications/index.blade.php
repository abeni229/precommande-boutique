@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Vos notifications</h2>

    @if($notifications->count() > 0)
        <ul class="list-group">
            @foreach($notifications as $notification)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $notification->message }}
                    <form method="POST" action="{{ route('notification.markAsRead', $notification->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success">Marquer comme lue</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucune notification.</p>
    @endif
</div>
@endsection
