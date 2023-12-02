@extends('layouts.app')

@section('content')
<div class="container"><br>
    @can('sousmenu-create')
        <a href="{{ route('sousmenu.create') }}" class="btn btn-primary mb-3">{{ __('Ajouter')}}</a>
    @endcan
    <ul class="list-group">
        @forelse ($sous_menus as $sousmenu)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    {{ $sousmenu->titre }} [{{ $sousmenu->afficher ?  __('Afficher') : __('Non Afficher') }}]
                </div>
                <div>
                    @can('sousmenu-show')
                        <x-button-show property="sousmenu" :model="$sousmenu" label="{{ __('Details')}}" />
                    @endcan
                </div>
            </div>
        </li>
        @empty
        <li class="list-group-item">
            {{ __('Aucun sous-menu connu')}}
        </li>
        @endforelse
    </ul>
</div>
@endsection
