@extends('layouts.app')

@section('title', 'Détails du Cellier')

@section('content')
    <main class="cellier-select-container">
        <div class="cellier-icon-action">
            <a href="{{ route('cellier.show', $cellier->id) }}" class="mofifiersuprimer">
                <img src="{{ asset('icons/parametre.png') }}" alt="Paramètres">
            </a>
        </div>
        <input type="hidden" name="cellier_id" id="cellier_id" value="{{ $cellier->id }}" />
        <h1 class="cellier-select-nom">{{ $cellier->nom }}</h1>
        <div class="cellier-select-btn">
            <form action="{{ route('cellier.bouteilles.ajouter', $cellier->id) }}" method="GET">
                <button type="submit" class="cellier-select-ajouter-btn">AJOUTER UNE BOUTEILLE</button>
            </form>
        </div>
        <div class="cellier-select-list">
            @foreach ($bouteilles as $bouteille)
                <div class="cellier-select-item" data-bouteille-id="{{ $bouteille->id }}">
                    @if ($bouteille->url_img)
                        <div class="select-img-container">
                            <img src="{{ $bouteille->url_img }}" class="select-img">
                        </div>
                    @endif
                    <div class="cellier-select-item-content">
                        <h4 class="cellier-select-bouteille-nom">{{ $bouteille->nom }}</h4>
                        <div class="cellier-select-bouteille-infos">
                            <small class="cellier-select-bouteille-info">{{ $bouteille->pays }} |</small>
                            <small class="cellier-select-bouteille-info">{{ $bouteille->type->type }} |</small>
                            <small class="cellier-select-bouteille-info">{{ $bouteille->format }}</small>
                        </div>
                        <div class="cellier-select-bouteille-quantite">
                            <p class="moins">-</p>
                            <input type="number" name="quantite" class="quantite-bouteille" min="0" value="{{ $bouteille->pivot->quantite }}" readonly>
                            <p class="plus">+</p>
                        </div>
                    </div>
                    <a class="cellier-item-action" href="{{ route('bouteille.show', ['bouteille' => $bouteille]) }}">
                        <img src="{{ asset('icons/info.png') }}" alt="info" class="cellier-info-icon" />
                    </a>
                </div>
            @endforeach
            {{ $bouteilles->links() }}

            @if ($bouteilles->isEmpty())
                <p>Aucune bouteille trouvée dans ce cellier.</p>
            @endif
        </div>
    </main>
    <script src="{{ asset('js/ajouter-cellier-bouteille.js') }}"></script>

    @include('layouts.footer')
@endsection

