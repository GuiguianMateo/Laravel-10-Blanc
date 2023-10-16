@extends('layouts.app')

@section('content')

    <div>
        @forelse ($menus as $menu)
          <div>
              {{ $menu->titre }} page(s)
            </a>
          </div>
      @empty
          Aucun menu connu
      @endforelse
    </div>

@endsection
