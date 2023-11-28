@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('menu.store') }}" method="post">
        @csrf
        @method("post")

        <div class="mb-3">
            <x-input-text property="titre" label="{{ __('Titre du menu') }}"/>
        </div>

        <div class="mb-3">
            <x-input-text property="lien" label="{{ __('Lien du menu') }}"/>
        </div>

        <div class="mb-3">
            <x-input-radio property="afficher" label="{{ __('Voulez-vous afficher le menu?') }}"/>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Crée')}}</button>
    </form>
</div>
@endsection
