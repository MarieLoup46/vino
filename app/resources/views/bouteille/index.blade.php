@extends('layouts.app')
@section('title', 'Recherche')
@section('content')

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
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
@include('layouts.footer')
