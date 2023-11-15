@extends('layouts.app')
@section('title', 'Profil')
@section('content')
    <div>
        <div>
            <h1 class="auth_header_h1-title">Profil</h1>
        </div>

        <div>
            <h2 class="auth_header_h2-title">INFORMATIONS</h2>
        </div>

        <form class="auth_form_profil">
            <label for="nom" id="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="{{ $user->nom }}">

            <label for="prenom" id="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" value="{{ $user->prenom }}">

            <label for="email" id="email">Courriel</label>
            <input type="text" id="email" name="email" value="{{ $user->email }}">

            <button type="submit" class="btn-submit">CRÉER UN CELLIER</button>
        </form>
    </div>
@endsection
@include('layouts.footer')
