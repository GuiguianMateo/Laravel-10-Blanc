@extends('layouts.app')

@section('content')


    <form action="{{ route('sousmenu.update', $sousmenu->id ) }}" method="post"><br>
        @csrf
        @method('put')
            <input type='text' value="{{ $sousmenu->titre }}" placeholder='Titre du sous-menu' name='titre'><br>
            <input type='text' value="{{ $sousmenu->lien }}" placeholder='lien du sous-menu ' name='lien'><br>
        <div>
                <label for="visible">Voulez-vous afficher le sous-menu?</label>
                <input type="radio" name="afficher" id="oui" value="1"><label for="oui">Oui</label>
                <input type="radio" name="afficher" id="non" value="0"><label for="non">Non</label><br/>
        </div>
        <select name="menu_id" id="menu_id">
            <option value="menu">Veuillez choisir un Menu</option>

            @foreach ($menus as $menu)
                <option value="{{ $menu->id }}" {{ $menu->id == $sousmenu->menu_id ? 'selected' : '' }}>
                    {{ $menu->titre }}
            @endforeach
        </select><br>
        <input type='submit' value='Modifier'>
    </form>

@endsection
