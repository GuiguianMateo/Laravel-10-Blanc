@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('Menus') }}</h1>
    <ul class="list-group">
        @forelse ($menus as $menu)
            <li class="list-group-item">
                <div>
                    {{ $menu->title }} -
                    {{--@forelse ($menus as $menu)
                        {{ $menu->sousmenu->page->where('visible', 1)->count() }} page(s) associée(s)
                    @empty
                     @endforelse--}}
                </div>
            </li>
        @empty
            <li>{{ __('Aucun menu connu') }}</li>
        @endforelse
    </ul>
</div>
@endsection
