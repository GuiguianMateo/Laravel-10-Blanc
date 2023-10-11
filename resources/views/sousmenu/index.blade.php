@extends('layouts.app')

@section('content')

<a href="{{ route('sousmenu.create') }}">Ajouter</a>

    <ul>
        @forelse ($sous_menus as $sousmenu)
        <li>
            <div>
            {{ $sousmenu->titre }} [{{ $sousmenu->afficher ? 'Afficher' : 'Pas Afficher' }}]
            </div>
        </li>
        @empty
        <li>
            Aucun Sous-Menu connu
        </li>
        @endforelse
    </ul>

@endsection
