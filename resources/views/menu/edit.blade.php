@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('menu.update', $menu->id ) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <x-input-text property="titre" label="{{ __('Titre') }}"/>
        </div>

        <div class="mb-3">
            <x-input-text property="lien" label="{{ __('Lien') }}"/>
        </div>

        <div class="mb-3">
            <x-input-radio property="afficher" label="{{ __('Voulez-vous afficher le menu?') }}"/>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Modifier')}}</button>
    </form>
</div>
@endsection
