@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
        <strong>{{ __('Titre')}} :</strong> {{ $page->titre }}
    </div>
    <div class="mb-3">
        <strong>{{ __('Message')}} :</strong> {{ $page->message }}
    </div>
    <div class="mb-3">
        <strong>{{ __('Statut')}} :</strong> {{ $page->publier ? 'Publier' : 'Non Publier' }}
    </div>
    <div class="mb-3">
        <strong>{{ __('Liée au Sous-menu')}} :</strong> {{ $page->sousmenu->titre }}
    </div>
    @can('page-edit')
        <a href="{{ route('page.edit', $page->id) }}" class="btn btn-primary">{{ __('Modifier')}}</a>
    @endcan
    <form action="{{ route('page.destroy', $page->id) }}" method="POST">
        @csrf
        @method('DELETE')
        @can('page-delete')
            <button type="submit" class="btn btn-danger">{{ __('Supprimer')}}</button>
        @endcan
    </form>
</div>
@endsection
