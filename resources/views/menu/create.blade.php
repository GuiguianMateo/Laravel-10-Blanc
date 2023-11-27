@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('menu.store') }}" method="post">
        @csrf
        @method("post")

        <div class="mb-3">
            <x-input-text property="{{ __('Titre') }}" label="{{ __('Titre') }}" max-lenght="150"/>
        </div>

        <div class="mb-3">
            <x-input-text property="{{ __('Lien') }}" label="{{ __('Lien') }}" max-lenght="200"/>
        </div>

        <div class="mb-3">
            <label class="form-check-label" for="visible">{{ __('Voulez-vous afficher le menu?')}}</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="afficher" id="oui" value="1">
                <label class="form-check-label" for="oui">{{ __('Oui')}}</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="afficher" id="non" value="0">
                <label class="form-check-label" for="non">{{ __('Non')}}</label>
            </div>
            @error('afficher')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Crée')}}</button>
    </form>
</div>
@endsection
