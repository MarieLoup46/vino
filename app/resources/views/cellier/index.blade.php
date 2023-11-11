@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="mb-5 pb-3 mx-3 overflow-auto">
            <div class="mb-4">
                <h3 class="mb-4 mt-3 text-center text-italic">Mes celliers</h3>
                <div class="d-block text-center mb-5">
                    <a href="{{ route('cellier.create') }}" class="button btn-submit btn-small px-5">AJOUTER UN CELLIER</a>
                </div>

                <div class="list">
                    @foreach($items as $index => $item)
                        <div class="item d-flex gap-1 px-3 py-2 position-relative mb-3">
                            <div>
                                <a href="{{ route('cellier.show', $item->id) }}">
                                    <img alt="{{ $item->nom }}" src="{{ asset('icons/' . $item->icon) }}" />
                                </a>
                            </div>
                            <div>
                                <span>{{ $item->nom }}</span>
                                <small>{{ $index }} Bouteille</small>
                            </div>

                            <div class="position-absolute right-5 bottom-0">
                                <a href="{{ route('cellier.show', $item->id) }}">
                                    <img src="{{ asset('icons/info.png') }}" alt="info" />
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
