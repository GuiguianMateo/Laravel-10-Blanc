@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('sousmenu.update', $sousmenu->id) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <x-input-text property="titre" label="{{ __('Titre') }}"/>
        </div>

        <div class="mb-3">
            <x-input-text property="lien" label="{{ __('Lien') }}"/>
        </div>

        <div class="mb-3">
            <x-input-radio property="afficher" label="{{ __('Voulez-vous afficher le sous-menu?') }}"/>
        </div>

        <div class="mb-3">
            <label for="menu_id">{{ __('Choisir un Menu')}}</label>
            <select class="form-select" name="menu_id" id="menu_id">
                <option value="menu">{{ __('Veuillez choisir un Menu')}}</option>
                @foreach ($menus as $menu)
                    <option value="{{ $menu->id }}"
                        {{ $menu->id == $sousmenu->menu_id ? 'selected' : '' }}>{{ $menu->titre }}
                    </option>
                @endforeach
            </select>
            @error('menu_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Modifier')}}</button>
    </form>
</div>
@endsection
