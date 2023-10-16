@extends('layouts.app')

@section('content')


    <div>
        Titre : {{ $menu->titre }}<br>
        Lien : {{ $menu->lien }}<br>
        Il est : {{ $menu->afficher ? 'Afficher' : 'Pas Afficher' }}<br>
        <a href="{{ route('menu.edit', $menu->id) }}">Modifier</a>
        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>

    </div>

@endsection
