@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('page.create') }}" class="btn btn-primary mb-3">{{ __('Ajouter')}}</a>
    <ul class="list-group">
        @forelse ($pages as $page)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    {{ $page->titre }} [{{ $page->publier ? 'Publier' : 'Non Publier' }}]
                </div>
                <div>
                    <a href="{{ route('page.show', $page->id) }}" class="btn btn-info">{{ __('Détail')}}</a>
                </div>
            </div>
        </li>
        @empty
        <li class="list-group-item">
            {{ __('Aucune page connu')}}
        </li>
        @endforelse
    </ul>
</div>
@endsection
