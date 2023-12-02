<form action="{{ route($property . '.destroy', [ $property => $model->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit" class="btn btn-danger">{{ __($label)}}</button>
</form>
