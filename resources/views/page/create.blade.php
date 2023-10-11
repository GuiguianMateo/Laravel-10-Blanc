@extends('layouts.app')

@section('content')

    <form action="{{ route('page.store') }}" method="post"><br>
        @csrf
        @method("post")
        <input type='text' id='titre' placeholder='Titre de la page' name='titre'><br>
        <input type='text' id='message' placeholder='message de la page ' name='message'><br>
        <div>
                <label for="visible">Voulez-vous publier le menu?</label>
                <input type="radio" name="publier" id="oui" value="1"><label for="oui">Oui</label>
                <input type="radio" name="publier" id="non" value="0"><label for="non">Non</label><br/>
        </div>

        <select name="sousmenu_id" id="sousmenu_id">
            <option value="sousmenu">Veuillez choisir un Sous-Menu</option>

            @foreach ($sous_menus as $sousmenu)
                <option value="{{ $sousmenu->id }}">{{ $sousmenu->titre }}</option>
            @endforeach
        </select><br>

        <input type='submit' value='Créer'>
    </form>

@endsection
