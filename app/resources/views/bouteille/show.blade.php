@extends('layouts.app')
@section('title', 'Recherche')
@section('content')

<div class="bouteille__container">
	<div class="bouteille__header">
		<h1>{{$bouteille->pays}}</h1>
	</div>
	<div class="bouteille__row">
		<div class="bouteille__col">
			<div class="bouteille__detail">
				<h2 class="bouteille__detail-nom">{{$bouteille->nom}}</h2>
				<div>
                    <div class="bouteille_buttons-action">
                        <div class="bouteille__img-cellier">
                            <form action="{{ route('affichier.bouteille.cellier') }}" method ="POST">
                                @csrf
                                <input type="hidden" name="bouteille_id" value="{{$bouteille->id}}">
                                <button type="submit" class="bouteille__button-ajouter">
                                    <img src="/icons/mettreaucellier.png" alt="cellier" class="bouteille__img-ajouter">
                                </button>
                            </form>
                        </div>
                        <div class="bouteille__bg-saq">
                            <form action="{{ $bouteille->url_saq }}" method ="GET">
                                @csrf
                                <button type="submit" class="bouteille__button-saq">
                                    <img src="/icons/logo_saq.png" alt="cellier" class="bouteille__img-logosaq">
                                </button>
                            </form>
                        </div>
                    </div>
					<p class="bouteille__detail-item">Cépage(s): <span>{{$infoBouteille->cepages}}</span></p>
					<p class="bouteille__detail-item">Particularité: <span>{{$infoBouteille->particularite}}</span></p>
					<p class="bouteille__detail-item">Degré d'alcool: <span>{{$infoBouteille->degre_alcool}}</span></p>
					<p class="bouteille__detail-item">Producteur: <span>{{$infoBouteille->producteur}}</span></p>
					<p class="bouteille__detail-item">Taux de sucre: <span>{{$infoBouteille->taux_sucre}}</span></p>
				</div>
				<div class="bouteille__detail-img">
					<img src="{{ explode('?', $bouteille->url_img)[0] }}" alt="bouteille">
				</div>
			</div>
			<div class="bouteille__description">
				<h2 class="bouteille__description-title">Description</h2>
				<p class="bouteille__description-detail">{{$infoBouteille->infos_detaillees}}</p>
			</div>
		</div>
	</div>
</div>

@endsection
@include('layouts.footer')
