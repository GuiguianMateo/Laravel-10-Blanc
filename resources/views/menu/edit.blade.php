@extends('layouts.app')

@section('content')

    <form action="{{ route('menu.update', $menu->id ) }}" method="post"><br>
        @csrf
        @method('put')
            <input type='text' value="{{ $menu->titre }}" name='titre'><br>
            <input type='text' value="{{ $menu->lien }}" name='lien'><br>
        <div>
                <label for="visible">Voulez-vous afficher le menu?</label>
                <input type="radio" name="afficher" id="oui" value="1"><label for="oui">Oui</label>
                <input type="radio" name="afficher" id="non" value="0"><label for="non">Non</label><br/>
        </div>
        <input type='submit' value='Modifier'>
    </form>

@endsection
