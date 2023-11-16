@extends('layouts.app')
@section('title', 'Ajouter bouteille au cellier')
@section('content')

<h1>Confirmation d'ajout</h1>

<form action="{{ route('ajout.bouteille.cellier') }}" method="POST">
    @csrf
    <input type="hidden" name="bouteille" value="{{$bouteille->id}}">
    <h3>{{$bouteille->nom}}</h3>
    <select name="cellier">
        @foreach ($celliers as $cellier)
            <option value="{{ $cellier->id }}">{{ $cellier->nom }}</option>
        @endforeach
    </select>
    <input type="number" name="quantite" id="">
    <input type="submit" value="Ajouter">
    <a href="{{ route('bouteille.recherche') }}">Annuler</a>
</form>

@endsection
@include('layouts.footer')