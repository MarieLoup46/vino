@extends('layouts.app')
@section('title', 'Mise à jour')
@section('content')
    <div class="auth__container_profil">
        <div>
            <h1 class="auth__header_h1-title">Profil</h1>
        </div>

        <div>
            <h2 class="auth__h2-title">MISE À JOUR</h2>
        </div>

        <form class="auth__form_profil" method="post">
            <!-- La méthode 'put' permet de faire l'update -->
            @method('put')
            @csrf
            <div class="auth__form_profil_group">
                <label for="nom" id="nom">NOM</label>
                <input type="text" id="nom" name="nom" value="{{ $user->nom }}">
            </div>

            <div class="auth__form_profil_group">
                <label for="prenom" id="prenom">PRÉNOM</label>
                <input type="text" id="prenom" name="prenom" value="{{ $user->prenom }}">
            </div>

            <div class="auth__form_profil_group">
                <label for="email" id="email">COURRIEL</label>
                <input type="text" id="email" name="email" value="{{ $user->email }}">
            </div>

            <div class="auth__form_profil_group">
                <button type="submit" class="auth__profil_btn">MISE À JOUR</button>
            </div>
        </form>
    </div>
@endsection
@include('layouts.footer')
