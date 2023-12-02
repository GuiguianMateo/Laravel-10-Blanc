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
    @can('menu-delete')
        <x-button-delete label="{{ __('Supprimer')}}" property="menu" :model="$menu" />
    @endcan

</div>
@endsection
