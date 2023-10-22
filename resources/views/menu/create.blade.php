@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('menu.store') }}" method="post">
        @csrf
        @method("post")

        <div class="mb-3">
            <label for="titre" class="form-label">{{ __('Titre du menu')}}</label>
            <input type="text" class="form-control" id="titre" name="titre" placeholder="{{ __('Titre du menu')}}">
            @error('titre')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="lien" class="form-label">{{ __('Lien du menu')}}</label>
            <input type="text" class="form-control" id="lien" name="lien" placeholder="{{ __('Lien du menu')}}">
            @error('lien')
                <p class="text-danger">{{ $message }}</p>
            @enderror
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
