@extends('layouts.app')

@section('content')

    <ul>
        @forelse ($sousmenus as $sousmenu)
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
