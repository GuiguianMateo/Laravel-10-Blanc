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
        Aucun menu connu
      </li>
    @endforelse
</ul>
@endsection
