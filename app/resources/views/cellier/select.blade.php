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
        <form action="{{ route('cellier.create') }}" method="GET">
            <button type="submit" class="cellier-select-ajouter-btn">AJOUTER UNE BOUTEILLE</button>
    </div>
    <div class="cellier-select-list">
        @forelse ($bouteilles as $bouteille)
        <div class="cellier-select-item">
            @if ($bouteille->bouteille->url_img)
            <div class="select-img-container">
                <img src="{{$bouteille->bouteille->url_img}}" class="select-img">
            </div>
            @endif
            <div class="cellier-select-item-content">
                <h4 class="cellier-select-bouteille-nom">{{ $bouteille->bouteille->nom }}</h4>
                <div class="cellier-select-bouteille-infos">
                    <small class="cellier-select-bouteille-info">{{ $bouteille->bouteille->pays }} |</small>
                    <small class="cellier-select-bouteille-info">{{ $bouteille->bouteille->type_id}} |</small>
                    <small class="cellier-select-bouteille-info">{{ $bouteille->bouteille->format }}</small>
                </div>
                <div class="cellier-item-action">
                    <a href="{{ route('bouteille.show', ['bouteille' => $bouteille->bouteille]) }}">
                        <img src="{{ asset('icons/info.png') }}" alt="info" class="cellier-info-icon" />
                    </a>
                </div>
            </div>
        </div>
        @empty
        <p>Aucune bouteille trouvée dans ce cellier.</p>
        @endforelse
        {{ $bouteilles->links() }}
    </div>

</main>
@endsection
@include('layouts.footer')