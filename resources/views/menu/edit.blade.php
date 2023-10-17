@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('menu.update', $menu->id ) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="titre" class="form-label">{{ __('Titre du menu')}}</label>
            <input type="text" class="form-control" name="titre" value="{{ $menu->titre }}">
            @error('titre')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="lien" class="form-label">{{ __('Lien du menu')}}</label>
            <input type="text" class="form-control" name="lien" value="{{ $menu->lien }}">
            @error('lien')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-check-label" for="visible">{{ __('Voulez-vous afficher le menu?')}}</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="afficher" id="oui" value="1" {{ $menu->afficher ? 'checked' : '' }}>
                <label class="form-check-label" for="oui">{{ __('Oui')}}</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="afficher" id="non" value="0" {{ !$menu->afficher ? 'checked' : '' }}>
                <label class="form-check-label" for="non">{{ __('Non')}}</label>
            </div>
            @error('afficher')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Modifier')}}</button>
    </form>
</div>
@endsection
