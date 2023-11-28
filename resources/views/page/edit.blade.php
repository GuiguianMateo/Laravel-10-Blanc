@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('page.update', $page->id) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <x-input-text property="titre" label="{{ __('Titre') }}"/>
        </div>

        <div class="mb-3">
            <x-input-text property="message" label="{{ __('Message') }}"/>
        </div>

        <div class="mb-3">
            <x-input-radio property="publier" label="{{ __('Voulez-vous publier la page?') }}"/>
        </div>

        <div class="mb-3">
            <label for="sousmenu_id">{{ __('Choisir un Sous-menu')}}</label>
            <select class="form-select" name="sousmenu_id" id="sousmenu_id">
                <option value="sousmenu">{{ __('Veuillez choisir un Sous-menu')}}</option>
                @foreach ($sousmenus as $sousmenu)
                    <option value="{{ $sousmenu->id }}"
                        {{ $sousmenu->id == $page->sousmenu_id ? 'selected' : '' }}>{{ $sousmenu->titre }}
                    </option>
                @endforeach
            </select>
            @error('sousmenu_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Modifier')}}</button>
    </form>
</div>
@endsection
