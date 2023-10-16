@extends('layouts.app')

@section('content')

    <div>
        @forelse ($menus as $menu)
            <div>
                {{ $menu->titre }}

                {{ $ }} Page(s) :

            @empty
            </div>
        @endforelse
    </div>

@endsection
