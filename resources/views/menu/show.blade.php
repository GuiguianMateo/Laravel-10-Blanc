@extends('layouts.app')

@section('content')

    <ul>
        <li>
            <div>
            Titre : {{ $menu->titre }}<br>
            Lien : {{ $menu->lien }}<br>
            Il est : {{ $menu->afficher ? 'Afficher' : 'Pas Afficher' }}<br>
            <a href="{{ route('menu.index', $menu->id) }}">Retour</a>

            </div>
        </li>
    </ul>

@endsection
