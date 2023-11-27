
<label for="{{ $property }}" class="form-label">{{ $label }}</label>
<input type="text" class="form-control" id="{{ $property }}" name="{{ $property }}"
    value="{{ old($property) }}" placeholder="{{ $label }}">
@error($property)
    <p class="text-danger">{{ $message }}</p>
@enderror
