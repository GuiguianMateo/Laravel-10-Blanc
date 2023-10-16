@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Page Details</h1>
    <div class="mb-3">
        <strong>Titre :</strong> {{ $page->titre }}
    </div>
    <div class="mb-3">
        <strong>Message :</strong> {{ $page->message }}
    </div>
    <div class="mb-3">
        <strong>Statut :</strong> {{ $page->publier ? 'Publier' : 'Non Publier' }}
    </div>
    <div class="mb-3">
        <strong>Lié au sous-menu :</strong> {{ $page->sousmenu->titre }}
    </div>
    <a href="{{ route('page.edit', $page->id) }}" class="btn btn-primary">Modifier</a>
    <form action="{{ route('page.destroy', $page->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>
@endsection
