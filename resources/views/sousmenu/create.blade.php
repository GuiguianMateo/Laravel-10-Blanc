@extends('layouts.app')

@section('content')

    <form action="{{ route('sousmenu.store') }}" method="post"><br>
        @csrf
        @method("post")
        <input type='text' id='titre' placeholder='Titre du sous-menu' name='titre'><br>
        <input type='text' id='lien' placeholder='lien du sous-menu ' name='lien'><br>
        <div>
                <label for="visible">Voulez-vous afficher le menu?</label>
                <input type="radio" name="afficher" id="oui" value="1"><label for="oui">Oui</label>
                <input type="radio" name="afficher" id="non" value="0"><label for="non">Non</label><br/>
        </div>

        <select name="menu_id" id="menu_id">
            <option value="menu">Veuillez choisir un Menu</option>

            @foreach ($menus as $menu)
                <option value="{{ $menu->id }}">{{ $menu->titre }}</option>
            @endforeach
        </select><br>

        <input type='submit' value='Créer'>
    </form>

@endsection
