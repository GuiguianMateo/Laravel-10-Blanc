@extends('layouts.app')

@section('content')

    <form action="{{ route('page.update', $page->id ) }}" method="post"><br>
        @csrf
        @method('put')
            <input type='text' value="{{ $page->titre }}" placeholder='Titre de la page' name='titre'><br>
            <input type='text' value="{{ $page->message }}" placeholder='message de la page ' name='message'><br>
        <div>
                <label for="visible">Voulez-vous publier la page?</label>
                <input type="radio" name="publier" id="oui" value="1"><label for="oui">Oui</label>
                <input type="radio" name="publier" id="non" value="0"><label for="non">Non</label><br/>
        </div>
        <select name="sousmenu_id" id="sousmenu_id">
            <option value="sousmenu">Veuillez choisir un Sous-Menu</option>

            @foreach ($sousmenus as $sousmenu)
            <option value="{{ $sousmenu->id }}" {{ $sousmenu->id == $page->sousmenu_id ? 'selected' : '' }}>
                {{ $sousmenu->titre }}
            @endforeach
        </select><br>
        <input type='submit' value='Modifier'>
    </form>

@endsection
