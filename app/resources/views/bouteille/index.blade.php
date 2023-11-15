@extends('layouts.app')
@section('title', 'Recherche')
@section('content')

<div class="popup">
    <div class="popup__container">
        <button class="fermer-popup-button">X</button>  
        <h3>Confirmation d'ajout</h3>
        <div class="popup__info">
            <h4>Nom Du Bouteille</h4>
            <div class="ceuiller">
                <p>ceuiller</p>
                <select name="" id="">
                    <option value="">ceuiller 1</option>
                    <option value="">ceuiller 2</option>
                </select>
            </div>
            <div class="nombre-bouteille">
                <p>bouteille:</p>
                <input type="number">
            </div>
            <button>ajouter</button>
        </div>
    </div>
</div>


<div class="body__container">
    <div class="auth__header">
        <h1>Recherche</h1>
    </div>
    <div>
        <div class="auth__col">
            @foreach($bouteilles as $bouteille)
                <div class="recherche__container">
                    <div class="img__container">
                        <img src="{{$bouteille->url_img}}" class="recherche__img">
                    </div>
                    <div class="bouteille__info">
                        <p class="bouteille__nom">{{$bouteille->nom}}</p>
                        <p class="bouteille__color">{{$bouteille->pays}} | {{$bouteille->type_id}} | {{$bouteille->format}}</p>
                        <p class="bouteille__prix">{{$bouteille->prix_saq}} $</p>
                        <p><a class="bouteille__lien" href="{{$bouteille->url_saq}}">voir plus</a></p>
                        <button class="ajouter__bouteille">Ajouter au ceiller</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script src="{{ asset('js/popup.js') }}"></script>

@endsection
@include('layouts.footer')
