@extends('layouts.app')

@section('content')

    <form action="{{ route('sousmenu.store') }}" method="post"><br>
        @csrf
        @method("post")
        <input type='text' id='titre' placeholder='Titre du menu' name='titre'><br>
        <input type='text' id='lien' placeholder='lien du menu ' name='lien'><br>

        <div>
                <label for="visible">Voulez-vous afficher le menu?</label>
                <input type="radio" name="afficher" id="oui" value="1"><label for="oui">Oui</label>
                <input type="radio" name="afficher" id="non" value="0"><label for="non">Non</label><br/>
        </div>
        <input type='submit' value='Créer'>
    </form>

@endsection
$
