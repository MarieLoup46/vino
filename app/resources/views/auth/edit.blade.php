@extends('layouts.app')
@section('title', 'Mise à jour')
@section('content')
    <div>
        <div>
            <h1 class="auth_header_h1-title">Profil</h1>
        </div>

        <div>
            <h2 class="auth_header_h2-title">MISE À JOUR</h2>
        </div>

        <form class="auth_form_profil">
            <!-- La méthode 'put' permet de faire l'update -->
            @method('put')
            @csrf
            <label for="nom" id="nom">NOM</label>
            <input type="text" id="nom" name="nom" value="{{ $user->nom }}">

            <label for="prenom" id="prenom">PRÉNOM</label>
            <input type="text" id="prenom" name="prenom" value="{{ $user->prenom }}">

            <label for="email" id="email">COURRIEL</label>
            <input type="text" id="email" name="email" value="{{ $user->email }}">

            <button type="submit" class="auth_profil_btn">
        </form>
    </div>
@endsection
@include('layouts.footer')
