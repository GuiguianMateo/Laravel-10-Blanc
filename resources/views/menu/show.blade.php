@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
        <strong>{{ __('Titre')}} :</strong> {{ $menu->titre }}
    </div>
    <div class="mb-3">
        <strong>{{ __('Lien')}} :</strong> {{ $menu->lien }}
    </div>
    <div class="mb-3">
        <strong>{{ __('Statut')}} :</strong> {{ $menu->afficher ?  __('Afficher') : __('Non Afficher') }}
    </div>
    @can('menu-edit')
        <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-primary">{{ __('Modifier')}}</a>
    @endcan
    <form action="{{ route('menu.destroy', $menu->id) }}" method="POST">
        @csrf
        @method('DELETE')
        @can('menu-delete')
            <button type="submit" class="btn btn-danger">{{ __('Supprimer')}}</button>
        @endcan
    </form>
</div>
@endsection
