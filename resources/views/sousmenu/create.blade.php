@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('sousmenu.store') }}" method="post">
        @csrf
        @method('post')

        <div class="mb-3">
            <label for="titre">{{ __('Titre du sous-menu')}}</label>
            <input type="text" class="form-control" name="titre" id="titre" placeholder="Titre du sous-menu">
            @error('titre')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="lien">{{ __('Lien du sous-menu')}}</label>
            <input type="text" class="form-control" name="lien" id="lien" placeholder="Lien du sous-menu">
            @error('lien')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="visible">{{ __('Voulez-vous afficher le sous-menu?')}}</label>
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

        <div class="mb-3">
            <label for="menu_id">{{ __('Choisir un Menu')}}</label>
            <select class="form-select" name="menu_id" id="menu_id">
                <option value="menu">{{ __('Veuillez cjoisir un Menu')}}</option>
                @foreach ($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->titre }}</option>
                @endforeach
            </select>
            @error('menu_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Crée')}}</button>
    </form>
</div>
@endsection
