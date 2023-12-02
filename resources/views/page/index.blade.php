@extends('layouts.app')

@section('content')
<div class="container">
    @can('page-create')
        <a href="{{ route('page.create') }}" class="btn btn-primary mb-3">{{ __('Ajouter')}}</a>
    @endcan
    <ul class="list-group">
        @forelse ($pages as $page)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    {{ $page->titre }} [{{ $page->publier ?  __('Publier') : __('Non Publier') }}]
                </div>
                <div>
                    @can('page-show')
                        <x-button-show property="page" :model="$page" label="{{ __('Details')}}" />
                    @endcan
                </div>
            </div>
        </li>
        @empty
        <li class="list-group-item">
            {{ __('Aucune page connu')}}
        </li>
        @endforelse
    </ul>
</div>
@endsection
