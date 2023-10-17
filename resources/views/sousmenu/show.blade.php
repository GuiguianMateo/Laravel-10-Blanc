@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
        <strong>Titre :</strong> {{ $sousmenu->titre }}
    </div>
    <div class="mb-3">
        <strong>Lien :</strong> {{ $sousmenu->lien }}
    </div>
    <div class="mb-3">
        <strong>Statut :</strong> {{ $sousmenu->afficher ? 'Afficher' : 'Non Afficher' }}
    </div>
    <div class="mb-3">
        <strong>Lié au menu :</strong> {{ $sousmenu->menu->titre }}
    </div>
    <a href="{{ route('sousmenu.edit', $sousmenu->id) }}" class="btn btn-primary">Modifier</a>
    <form action="{{ route('sousmenu.destroy', $sousmenu->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>
@endsection
