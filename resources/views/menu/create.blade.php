@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Menu</h1>
    <form action="{{ route('menu.store') }}" method="post">
        @csrf
        @method("post")
        <div class="mb-3">
            <label for="titre" class="form-label">Titre du menu</label>
            <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre du menu">
        </div>
        <div class="mb-3">
            <label for="lien" class="form-label">Lien du menu</label>
            <input type="text" class="form-control" id="lien" name="lien" placeholder="Lien du menu">
        </div>
        <div class="mb-3">
            <label class="form-check-label" for="visible">Voulez-vous afficher le menu?</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="afficher" id="oui" value="1">
                <label class="form-check-label" for="oui">Oui</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="afficher" id="non" value="0">
                <label class="form-check-label" for="non">Non</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
