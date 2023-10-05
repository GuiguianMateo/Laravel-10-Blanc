@extends('layouts.app')

@section('content')

    <ul>
        @forelse ($pages as $page)
        <li>
            <div>
            {{ $page->titre }} [{{ $page->afficher }}]
            </div>
        </li>
        @empty
        <li>
            Aucune Page connu
        </li>
        @endforelse
    </ul>

@endsection
