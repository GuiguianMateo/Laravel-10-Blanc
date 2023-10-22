@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
        <strong>{{ __('Titre')}} :</strong> {{ $sousmenu->titre }}
    </div>
    <div class="mb-3">
        <strong>{{ __('Lien')}} :</strong> {{ $sousmenu->lien }}
    </div>
    <div class="mb-3">
        <strong>{{ __('Statut')}} :</strong> {{ $sousmenu->afficher ?  __('Afficher') : __('Non Afficher') }}
    </div>
    <div class="mb-3">
        <strong>{{ __('Liée au Menu')}} :</strong> {{ $sousmenu->menu->titre }}
    </div>
    @can('sousmenu-edit')
        <a href="{{ route('sousmenu.edit', $sousmenu->id) }}" class="btn btn-primary">{{ __('Modifier')}}</a>
    @endcan
    <form action="{{ route('sousmenu.destroy', $sousmenu->id) }}" method="POST">
        @csrf
        @method('DELETE')
        @can('sousmenu-delete')
            <button type="submit" class="btn btn-danger">{{ __('Supprimer')}}</button>
        @endcan
    </form>
</div>
@endsection
