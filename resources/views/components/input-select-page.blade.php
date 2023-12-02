<label for="{{ $property }}">{{ __($label) }}</label>
<select class="form-select" name="{{ $property }}" id="{{ $property }}">
    <option value="">{{ __($label) }}</option>
    @foreach ($sous_menus as $sousmenu)
        <option value="{{ $sousmenu->id }}">{{ $sousmenu->titre }}</option>
    @endforeach
</select>
@error($property)
    <p class="text-danger">{{ $message }}</p>
@enderror
