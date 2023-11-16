@extends('layouts.app')
@section('title', 'Accueil')
@section('content')

<div class="accueil__container">
    <div class="accueil__header">
        <h1 class="accueil__header-title">Bonjour {{Auth::user() ? Auth::user()->prenom :
            'Guest'}}</h1>
        <form action="{{ route('cellier.create') }}" method="GET">
			@csrf
			<button type="submit" class="accueil__header-button">Ajouter un Cellier</button>
		</form>
    </div>
</div>
@endsection
@include('layouts.footer')
