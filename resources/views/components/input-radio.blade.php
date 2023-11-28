<label class="form-check-label" for="{{ $property }}">{{ $label }}</label>
<div class="form-check">
    <input type="radio" class="form-check-input" name="{{ $property }}" id="oui" value="1">
    <label class="form-check-label" for="{{ $property }}">{{ __('Oui')}}</label>
</div>
<div class="form-check">
    <input type="radio" class="form-check-input" name="{{ $property }}" id="non" value="0">
    <label class="form-check-label" for="{{ $property }}">{{ __('Non')}}</label>
</div>
@error('afficher')
    <p class="text-danger">{{ $message }}</p>
@enderror
