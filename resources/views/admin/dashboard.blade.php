@extends('layouts.app')

@section('content')
    <div class="big">
       <div class="look"> <h4>Bienvenue, Admin</h4><br><br></div>

        <div class="look"><p>Vous êtes connecté en tant qu'administrateur.</p><br><br></div>

        <div class="look">
        <strong>Tableau de Bord Admin</strong><br>
        <ul>
            <a href="{{ route('admin.commandes') }}">Gérer les Commandes</a><br>
            <a href="{{ route('admin.produits') }}">Gérer les Produits</a>
        </ul>
        </div>
    </div><br>
    <br>

    <form  action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Se déconnecter</button>
    </form>
@endsection
