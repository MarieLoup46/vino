@extends('layouts.app')
@section('title', 'Profil')
@section('content')
    <div>
        <div>
            <h1 class="auth_header_h1-title">Profil</h1>
        </div>

        <div>
            <h2 class="auth_h2-title">INFORMATIONS</h2>
        </div>

        <form class="auth_form_profil">
            <label for="nom" id="nom">NOM</label>
            <input type="text" id="nom" name="nom" value="{{ $user->nom }}">

            <label for="prenom" id="prenom">PRÉNOM</label>
            <input type="text" id="prenom" name="prenom" value="{{ $user->prenom }}">

            <label for="email" id="email">COURRIEL</label>
            <input type="text" id="email" name="email" value="{{ $user->email }}">

            <button class="auth_profil_btn">MODIFIER MES INFORMATIONS</button>


            <h2 class="auth_h2-title auth_profil_compte">COMPTE</h2>

            <button class="auth_profil_btn">ME DÉCONNECTER</button>

            <button class="auth_profil_btn auth_profil_delete_btn">SUPPRIMER MON COMPTE</button>
        </form>
    </div>
@endsection
@include('layouts.footer')
