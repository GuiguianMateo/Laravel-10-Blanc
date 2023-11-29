<label for="{{ $property }}">{{ __($label) }}</label>
<select class="form-select" name="{{ $property }}" id="{{ $property }}">
    <option value="menu">{{ __($label) }}</option>
    @foreach ($menus as $menu)
        <option value="{{ $menu->id }}">{{ $menu->titre }}</option>
    @endforeach
</select>
@error($property)
    <p class="text-danger">{{ $message }}</p>
@enderror
