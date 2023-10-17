@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
        <strong>Title :</strong> {{ $menu->titre }}
    </div>
    <div class="mb-3">
        <strong>Lien :</strong> {{ $menu->lien }}
    </div>
    <div class="mb-3">
        <strong>Statut :</strong> {{ $menu->afficher ? 'Afficher' : 'Non Afficher' }}
    </div>
    <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-primary">Modifier</a>
    <form action="{{ route('menu.destroy', $menu->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>
@endsection
