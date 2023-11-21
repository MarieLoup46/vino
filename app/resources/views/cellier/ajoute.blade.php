@extends('layouts.app')

@section('title', 'Celliers')

@section('content')
<main class="ajoute-cellier-container"> 
    <header class="ajoute-cellier-titre"> 
        <h1>Ajout de Bouteille</h1>
        <div class="ajoute-cellier-form"> 
            <label for="nomDuCellier" class="ajoute-cellier-nom">RECHERCHE:</label> 
            <input placeholder="EX: ROUGE" type="text" class="ajoute-cellier-input" id="nom" name="nom" required> 
        </div>
    </header>
    <div class="ajoute-cellier-list"> 
        @forelse ($bouteilles as $bouteille)
        <div class="ajoute-cellier-item"> 
            @if ($bouteille->image)
            <img alt="{{ $bouteille->nom }}" src="{{ asset('storage/' . $bouteille->image) }}" class="ajoute-cellier-icon" /> 
            @endif
            <div class="ajoute-cellier-item-content"> 
                <h4 class="ajoute-bouteille__nom">{{ $bouteille->nom }}</h4>
                <small class="ajoute-cellier-bottle-count">{{ $bouteille->pays }}</small> 
                <small class="ajoute-cellier-bottle-count">{{ $bouteille->type_id }}</small> 
                <small class="ajoute-cellier-bottle-count">{{ $bouteille-> format}} ml</small>
                <small class="ajoute-cellier-bottle-count">{{ $bouteille->prix_saq }}</small> 
            </div>
            <div class="ajoute-cellier-item-action"> 
                <img src="{{ asset('icons/mettreaucellier.png') }}" alt="mettreaucellier" class="ajoute-cellier-mettreaucellier-icon" /> 
            </div>
        </div>
        @empty
        <p>Aucune bouteille trouvée dans ce cellier.</p>
        @endforelse
    </div>
</main>
@endsection

@include('layouts.footer')