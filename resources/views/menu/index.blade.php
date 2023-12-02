@extends('layouts.app')

@section('content')
<div class="container"><br>
    @can('menu-create')
        <a href="{{ route('menu.create') }}" class="btn btn-primary mb-3">{{ __('Ajouter')}}</a>
    @endcan
    <ul class="list-group">
        @forelse ($menus as $menu)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    {{ $menu->titre }} [{{ $menu->afficher ?  __('Afficher') : __('Non Afficher') }}]
                </div>
                <div>
                    @can('menu-show')
                        <x-button-show property="menu" :model="$menu" label="{{ __('Details')}}" />
                    @endcan
                </div>
            </div>
        </li>
        @empty
        <li class="list-group-item">
            {{ __('Aucun menu connu')}}
        </li>
        @endforelse
    </ul>
</div>
@endsection
