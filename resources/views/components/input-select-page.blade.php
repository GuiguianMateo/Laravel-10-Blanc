<label for="{{ $property }}">{{ __($label) }}</label>
<select class="form-select" name="{{ $property }}" id="{{ $property }}">
    <option value="sousmenu">{{ __($label) }}</option>
    @foreach ($sous_menus as $sous_menu)
        <option value="{{ $sous_menus->id }}">{{ $sous_menus->titre }}</option>
    @endforeach
</select>
@error($property)
    <p class="text-danger">{{ $message }}</p>
@enderror
