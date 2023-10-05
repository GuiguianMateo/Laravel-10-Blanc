@extends('layouts.app')

@section('content')

<a href="{{ route('menu.create') }}">Ajouter</a>

    <ul>
        @forelse ($menus as $menu)
        <li>
            <div>
            {{ $menu->titre }} [{{ $menu->afficher ? 'Afficher' : 'Pas Afficher' }}]
            </div>
        </li>
        @empty
        <li>
            Aucun menu connu
        </li>
        @endforelse
    </ul>

@endsection
