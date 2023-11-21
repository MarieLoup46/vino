@extends('layouts.app')
@section('title', 'Gérer cellier')
@section('content')
<main class="cellier-show-container">
    <div class="cellier-show">
        @if ($errors->any())
        <div class="cellier-show-error">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
        <div class="cellier-show-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="cellier-show-titre">
            <h3>Modifier un Cellier</h3>
        </div>

        <form action="{{ route('cellier.update', $cellier->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="cellier-show-nom">
                <label for="nomDuCellier" class="cellier-show-edit">NOM DU CELLIER:</label>
                <input placeholder="EX: MAISON" type="text" class="cellier-show-input" id="nom" name="nom" value="{{ old('nom', $cellier->nom) }}">
            </div>

            <div class="cellier-show-modifier">
                <button type="submit" class="cellier-show-btn-mod">MODIFIER CELLIER</button>
            </div>
        </form>

        <form action="{{ route('cellier.destroy', $cellier->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="cellier-show-btn-sup">SUPPRIMER CELLIER</button>
        </form>
    </div>
</main>
@endsection
@include('layouts.footer')
