@extends('layouts.app')
@section('title', 'Accueil')
@section('content')

<div class="accueil__container">
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    <div class="accueil__header">
        <h1 class="accueil__header-title">Bonjour {{Auth::user() ? Auth::user()->prenom :
            'Guest'}}</h1>
        <form action="{{ route('cellier.create') }}" method="GET">
			@csrf
			<button type="submit" class="accueil__header-button">Ajouter un Cellier</button>
		</form>
    </div>
</div>
@include('layouts.footer')
@endsection
