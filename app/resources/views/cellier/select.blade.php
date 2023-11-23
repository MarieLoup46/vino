@extends('layouts.app')

@section('title', 'Détails du Cellier')

@section('content')
<main class="cellier-select-container">
    <div class="cellier-icon-action">
        <a href="{{ route('cellier.show', $cellier->id) }}" class="mofifiersuprimer">
            <img src="{{ asset('icons/parametre.png') }}" alt="Paramètres">
        </a>
    </div>
    <h1 class="cellier-select-nom">{{ $cellier->nom }}</h1>
    <div class="cellier-select-btn">
        <form action="{{ route('cellier.bouteilles.ajouter', $cellier->id) }}" method="GET">
            <button type="submit" class="cellier-select-ajouter-btn">AJOUTER UNE BOUTEILLE</button>
        </form>
    </div>
    <div class="cellier-select-list">
        @foreach ($groupedBouteilles as $algumId => $bouteillesGroup)
        <a href="{{ route('bouteille.show', ['bouteille' => $bouteillesGroup->first()->bouteille]) }}" class="cellier-select-item">
            @if ($bouteillesGroup->first()->bouteille->url_img)
            <div class="select-img-container">
                <img src="{{ $bouteillesGroup->first()->bouteille->url_img }}" class="select-img">
            </div>
            @endif
            <div class="cellier-select-item-content">
                <h4 class="cellier-select-bouteille-nom">{{ $bouteillesGroup->first()->bouteille->nom }}</h4>
                <div class="cellier-select-bouteille-infos">
                    <small class="cellier-select-bouteille-info">{{ $bouteillesGroup->first()->bouteille->pays }} |</small>
                    <small class="cellier-select-bouteille-info">{{ $bouteillesGroup->first()->bouteille->type->type}} |</small>
                    <small class="cellier-select-bouteille-info">{{ $bouteillesGroup->first()->bouteille->format }}</small>
                    <small class="cellier-select-bouteille-info">Quantité: {{ $bouteillesGroup->count() }}</small>
                </div>
                <div class="cellier-item-action">
                    <img src="{{ asset('icons/info.png') }}" alt="info" class="cellier-info-icon" />
                </div>
            </div>
        </a>
        @endforeach

        @if ($groupedBouteilles->isEmpty())
        <p>Aucune bouteille trouvée dans ce cellier.</p>
        @endif
    </div>
</main>
@endsection

@include('layouts.footer')
