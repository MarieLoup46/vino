@extends('layouts.app')
@section('content')
    <div class="cellier-row">
        <div class="cellier-main-content">
            <div class="cellier-title-section">
                <h3 class="cellier-title">Mes celliers</h3>
                <div class="cellier-button-section">
                    <a href="{{ route('cellier.create') }}" class="cellier-add-button">AJOUTER UN CELLIER</a>
                </div>
            </div>

            <div class="cellier-list">
                @foreach($items as $index => $item)
                    <div class="cellier-item">
                        <div class="cellier-item-image">
                            <a href="{{ route('cellier.show', $item->id) }}">
                                <img alt="{{ $item->nom }}" src="{{ asset('icons/' . $item->icon) }}" class="cellier-icon" />
                            </a>
                        </div>
                        <div class="cellier-item-info">
                            <span class="cellier-name">{{ $item->nom }}</span>
                            <small class="cellier-bottle-count">{{ $index }} Bouteille</small>
                        </div>
                        <div class="cellier-item-action">
                            <a href="{{ route('cellier.show', $item->id) }}">
                                <img src="{{ asset('icons/info.png') }}" alt="info" class="cellier-info-icon" />
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
