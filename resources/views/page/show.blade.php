@extends('layouts.app')

@section('content')


    <div>
        Titre : {{ $page->titre }}<br>
        Message : {{ $page->message }}<br>
        Il est : {{ $page->publier ? 'Publier' : 'Non Publier' }}<br>
        Rélier au sous-menu : {{ $page->sousmenu->titre}}<br>
        <a href="{{ route('page.edit', $page->id) }}">Modifier</a>
        <form action="{{ route('page.destroy', $page->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    </div>

@endsection
