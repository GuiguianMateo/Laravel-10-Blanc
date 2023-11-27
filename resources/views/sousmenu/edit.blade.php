@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('sousmenu.update', $sousmenu->id) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <x-input-text property="{{ __('Titre') }}" label="{{ __('Titre') }}" max-lenght="200"/>
        </div>

        <div class="mb-3">
            <x-input-text property="{{ __('Lien') }}" label="{{ __('Lien') }}" max-lenght="200"/>
        </div>

        <div class="mb-3">
            <label for="visible">{{ __('Voulez-vous afficher le sous-menu?')}}</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="afficher" id="oui" value="1"
                    {{ $sousmenu->afficher ? 'checked' : '' }}>
                <label class="form-check-label" for="oui">{{ __('Oui')}}</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="afficher" id="non" value="0"
                    {{ !$sousmenu->afficher ? 'checked' : '' }}>
                <label class="form-check-label" for="non">{{ __('Non')}}</label>
            </div>
            @error('afficher')
                <p class="text-danger">{{ $message }}</p>
            @enderror
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
