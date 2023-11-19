@extends('layouts.app')

@section('title', 'Détails du Cellier')

@section('content')
<main class="cellier-select-container">
    <header class="cellier-select-titre">
        <div class="cellier-item-action">
            <img src="{{ asset('icons/parametre.png') }}" alt="info" class="cellier-parametre-icon" />
        </div>
        <h3 class="cellier-select-bouteille">{{ $cellier->nom }}</h3>
        <div class="cellier-select-ajouter">
            <form action="{{ route('ajout.bouteille.cellier', $cellier->id) }}" method="GET">
                <button type="submit" class="cellier-select-ajouter-btn">AJOUTE UNE BOUTEILLE</button>
            </form>
        </div>
    </header>

    <div class="cellier-select-list">
        @foreach ($bouteilles as $bouteille)
        <div class="cellier-select-item">
            <img alt="{{ $bouteille->nom }}" src="{{ asset('path/to/bouteille/image/' . $bouteille->image) }}" class="cellier-select-icon" />
            <div class="cellier-select-item-content">
                <h4 class="ajout-bouteille__nom">{{$bouteille->nom}}</h4>
                <small class="cellier-select-bottle-count">{{ $bouteille->pays }}</small>
                <small class="cellier-select-bottle-count">{{ $bouteille->type }}</small>
                <small class="cellier-select-bottle-count">{{ $bouteille->volume }} ml</small>
            </div>
            <div class="cellier-item-action">
                    <img src="{{ asset('icons/info.png') }}" alt="info" class="cellier-info-icon" />
                </div>
        </div>
        @endforeach
    </div>
</main>
@endsection
