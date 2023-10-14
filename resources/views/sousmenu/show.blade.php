@extends('layouts.app')

@section('content')


    <div>
        Titre : {{ $sousmenu->titre }}<br>
        Lien : {{ $sousmenu->lien }}<br>
        Il est : {{ $sousmenu->afficher ? 'Afficher' : 'Pas Afficher' }}<br>
        Rélier au menu : {{ $sousmenu->menu->titre}}<br>
        <a href="{{ route('sousmenu.edit', $sousmenu->id) }}">Modifier</a>
        <form action="{{ route('sousmenu.destroy', $sousmenu->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    </div>

@endsection
