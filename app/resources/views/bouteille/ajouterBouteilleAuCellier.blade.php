@extends('layouts.app')
@section('title', 'Ajouter bouteille au cellier')
@section('content')

<div class="ajout-bouteille__container">
    <h1 class="ajout-bouteille__titre">Confirmation d'ajout</h1>

    <div class="ajout-bouteille__col">
        <div class="ajout-bouteille__detail">
            <form class="ajout-bouteille__form" action="{{ route('ajout.bouteille.cellier') }}" method="POST">
                @csrf
                <div>
                    <input type="hidden" name="bouteille" value="{{$bouteille->id}}">
                    <input type="hidden" name="from_recherche" value="{{empty($cellierId)}}">
        <h3 class="ajout-bouteille__nom">{{$bouteille->nom}}</h3>
                    <div class="ajout-bouteille__cellier">
                        <label for="cellier">Cellier: </label>
                        <select name="cellier" id ="Cellier">
                            @foreach ($celliers as $cellier)
                                @if(!empty($cellierId))
                        @if($cellierId == $cellier->id)
                            <option value="{{ $cellier->id }}" selected>{{ $cellier->nom }}</option>
                        @else
                            <option value="{{ $cellier->id }}" disabled>{{ $cellier->nom }}</option>
                        @endif
                    @else
                        <option value="{{ $cellier->id }}">{{ $cellier->nom }}</option>
                                @endif

                @endforeach
                        </select>
                    </div>

                    <div class="ajout-bouteille__quantite">
                        <label for="quantite">quantité:</label>
                        <p class="moins">-</p>
                        <input type="number" name="quantite" id="quantite" class="quantite" min="0" value="1" readonly>
                        <p class="plus">+</p>
                    </div>

                    <div class="ajout-bouteille__boutton">
                        <input class="ajouter" type="submit" value="Ajouter">
                        <a class="annuler" href="{{ route('bouteille.recherche') }}">Annuler</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/ajouter-bouteilles.js') }}"></script>
@endsection
@include('layouts.footer')
