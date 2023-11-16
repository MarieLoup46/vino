@extends('layouts.app')
@section('title', 'Profil')
@section('content')
    <div>
        <div>
            <h1 class="auth__header_h1-title">Profil</h1>
        </div>

        <div>
            <h2 class="auth__h2-title">INFORMATIONS</h2>
        </div>

        <!-- Message affiché lorsqu'un usager est modifié -->
        @if(session('success'))
            <div class="auth__success auth__success_update">
                {{session('success')}}
            </div>
        @endif


        <form class="auth__form_profil">
            @csrf
            <label for="nom" id="nom">NOM</label>
            <input type="text" id="nom" name="nom" value="{{ $user->nom }}">

            <label for="prenom" id="prenom">PRÉNOM</label>
            <input type="text" id="prenom" name="prenom" value="{{ $user->prenom }}">

            <label for="email" id="email">COURRIEL</label>
            <input type="text" id="email" name="email" value="{{ $user->email }}">

            <a href="{{ route('auth.edit', $user->id) }}" class="auth__profil_btn">MODIFIER MES INFORMATIONS</a>

            <h2 class="auth__h2-title auth__profil_compte">COMPTE</h2>

            <button class="auth__profil_btn">ME DÉCONNECTER</button>

            <button class="auth__profil_btn auth__profil_delete_btn">SUPPRIMER MON COMPTE</button>
        </form>
    </div>
@endsection
@include('layouts.footer')
