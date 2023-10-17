@extends('layouts.app')

@section('content')
<div class="container"><br>
    <a href="{{ route('menu.create') }}" class="btn btn-primary mb-3">Ajouter</a>
    <ul class="list-group">
        @forelse ($menus as $menu)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    {{ $menu->titre }} [{{ $menu->afficher ? 'Afficher' : 'Non Afficher' }}]
                </div>
                <div>
                    <a href="{{ route('menu.show', $menu->id) }}" class="btn btn-info">Détail</a>
                </div>
            </div>
        </li>
        @empty
        <li class="list-group-item">
            Aucun menu connu
        </li>
        @endforelse
    </ul>
</div>
@endsection
