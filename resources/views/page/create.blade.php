@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('page.store') }}" method="post">
        @csrf
        @method('post')

        <div class="mb-3">
            <label for="titre">{{ __('Titre de la page')}}</label>
            <input type="text" class="form-control" name="titre" id="titre" placeholder="{{ __('Titre de la page')}}">
            @error('titre')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="message">{{ __('Message de la page')}}</label>
            <input type="text" class="form-control" name="message" id="message" placeholder="{{ __('Message de la page')}}">
            @error('message')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="publier">{{ __('Voulez-vous publier la page?')}}</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="publier" id="oui" value="1">
                <label class="form-check-label" for="oui">{{ __('Oui')}}</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="publier" id="non" value="0">
                <label class="form-check-label" for="non">{{ __('Non')}}</label>
            </div>
            @error('publier')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sousmenu_id">{{ __('Choisir un Sous-menu')}}</label>
            <select class="form-select" name="sousmenu_id" id="sousmenu_id">
                <option value="sousmenu">{{ __('Veuillez choisir un Sous-menu')}}</option>
                @foreach ($sous_menus as $sousmenu)
                    <option value="{{ $sousmenu->id }}">{{ $sousmenu->titre }}</option>
                @endforeach
            </select>
            @error('sousmenu_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
