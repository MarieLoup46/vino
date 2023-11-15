@extends('layouts.app')
@section('title', 'Celliers')
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
                        <a class="full-link" href="{{ route('cellier.show', $item->id) }}"></a>
                        <div class="cellier-item-image">
                            <img alt="{{ $item->nom }}" src="{{ asset('icons/' . $random_icon) }}" class="cellier-icon" />
                        </div>
                        <div class="cellier-item-info">
                            <span class="cellier-name">{{ $item->nom }}</span>
                            <small class="cellier-bottle-count">{{ $index }} Bouteille</small>
                        </div>
                        <div class="cellier-item-action">
                            <img src="{{ asset('icons/info.png') }}" alt="info" class="cellier-info-icon" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@include('layouts.footer')
