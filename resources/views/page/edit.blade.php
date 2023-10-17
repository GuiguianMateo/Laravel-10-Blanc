@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('page.update', $page->id) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="titre">Titre de la page</label>
            <input type="text" class="form-control" name="titre" value="{{ $page->titre }}">
            @error('titre')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="message">Message de la page</label>
            <input type="text" class="form-control" name="message" value="{{ $page->message }}">
            @error('message')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="publier">Voulez-vous publier la page?</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="publier" id="oui" value="1"
                    {{ $page->publier ? 'checked' : '' }}>
                <label class="form-check-label" for="oui">Oui</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="publier" id="non" value="0"
                    {{ !$page->publier ? 'checked' : '' }}>
                <label class="form-check-label" for="non">Non</label>
            </div>
            @error('publier')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sousmenu_id">Choisir un Sous-Menu</label>
            <select class="form-select" name="sousmenu_id" id="sousmenu_id">
                <option value="sousmenu">Veuillez choisir un Sous-Menu</option>
                @foreach ($sousmenus as $sousmenu)
                    <option value="{{ $sousmenu->id }}"
                        {{ $sousmenu->id == $page->sousmenu_id ? 'selected' : '' }}>{{ $sousmenu->titre }}
                    </option>
                @endforeach
            </select>
            @error('sousmenu_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection
