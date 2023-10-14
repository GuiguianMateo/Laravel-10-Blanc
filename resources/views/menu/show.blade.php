@extends('layouts.app')

@section('content')


    <div>
        Titre : {{ $menu->titre }}<br>
        Lien : {{ $menu->lien }}<br>
        Il est : {{ $menu->afficher ? 'Afficher' : 'Pas Afficher' }}<br>
        <a href="{{ route('menu.edit', $menu->id) }}">Modifier</a>

    </div>

@endsection
