@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('page.update', $page->id) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <x-input-text property="titre" label="{{ __('Titre') }}"/>
        </div>

        <div class="mb-3">
            <x-input-text property="message" label="{{ __('Message') }}"/>
        </div>

        <div class="mb-3">
            <x-input-radio property="publier" label="{{ __('Voulez-vous publier la page?') }}"/>
        </div>

        <div class="mb-3">
            <x-input-select-page :sousmenus="$sousmenus" property="sousmenu_id" label="{{ __('Veuillez choisir un Sous-menu')}}" />
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Modifier')}}</button>
    </form>
</div>
@endsection
