@extends('layouts.app')

@section('content')

  <ul>
    @forelse ($menus as $menu)
      <li>
        <div>
          {{ $menu->titre }} [{{ $menu->afficher }}]
        </div>
      </li>
    @empty
      <li>
        Aucune matière connue
      </li>
    @endforelse
  </ul>
@endsection
