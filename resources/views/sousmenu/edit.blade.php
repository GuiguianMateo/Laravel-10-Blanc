@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier Sous-Menu</h1>
    <form action="{{ route('sousmenu.update', $sousmenu->id) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="titre">Titre du sous-menu</label>
            <input type="text" class="form-control" name="titre" value="{{ $sousmenu->titre }}">
        </div>
        <div class="mb-3">
            <label for="lien">Lien du sous-menu</label>
            <input type="text" class="form-control" name="lien" value="{{ $sousmenu->lien }}">
        </div>
        <div class="mb-3">
            <label for="visible">Voulez-vous afficher le sous-menu?</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="afficher" id="oui" value="1"
                    {{ $sousmenu->afficher ? 'checked' : '' }}>
                <label class="form-check-label" for="oui">Oui</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="afficher" id="non" value="0"
                    {{ !$sousmenu->afficher ? 'checked' : '' }}>
                <label class="form-check-label" for="non">Non</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="menu_id">Choisir un Menu</label>
            <select class="form-select" name="menu_id" id="menu_id">
                <option value="menu">Veuillez choisir un Menu</option>
                @foreach ($menus as $menu)
                    <option value="{{ $menu->id }}"
                        {{ $menu->id == $sousmenu->menu_id ? 'selected' : '' }}>{{ $menu->titre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection
