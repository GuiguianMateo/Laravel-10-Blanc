@extends('layouts.app')

@section('content')

<a href="{{ route('page.create') }}">Ajouter</a>

    <ul>
        @forelse ($pages as $page)
        <li>
            <div>
            {{ $page->titre }} [{{ $page->publier ? 'Publier' : 'Non Publier' }}]
            </div>
        </li>
        @empty
        <li>
            Aucune page connue
        </li>
        @endforelse
    </ul>

@endsection
