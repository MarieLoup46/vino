@extends('layouts.app')
@section('title', 'Profil')
@section('content')
    <div class="auth__container_profil">
        <div>
            <h2 class="auth__header_h2-title">Profil</h2>
        </div>

        <div>
            <h3 class="auth__h3-title">INFORMATIONS</h3>
        </div>

        <!-- Message affiché lorsqu'un usager est modifié -->
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif

        <form class="auth__form_profil">
            @csrf
            <div class="auth__form_profil_group">
                <label for="nom" id="nom">NOM:</label>
                <input type="text" id="nom" name="nom" value="{{ $user->nom }}">
            </div>

            <div class="auth__form_profil_group">
                <label for="prenom" id="prenom">PRÉNOM:</label>
                <input type="text" id="prenom" name="prenom" value="{{ $user->prenom }}">
            </div>

            <div class="auth__form_profil_group">
                <label for="email" id="email">COURRIEL:</label>
                <input type="text" id="email" name="email" value="{{ $user->email }}">
            </div>
        </form>

        <form action="{{ route('auth.edit', $user->id) }}" method="get">
            @csrf
            <input type="submit" value="MODIFIER MES INFORMATIONS" class="auth__profil_btn">
        </form>

        <div>
            <h3 class="auth__h3-title">COMPTE</h3>
        </div>

        <form action="{{ route('logout') }}" method="get">
            @csrf
            <input type="submit" value="ME DÉCONNECTER" class="auth__profil_btn">
        </form>

        <form action="{{ route('auth.delete', $user->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="SUPPRIMER MON COMPTE" onclick="return confirm('Êtes-vous sûre de vouloir supprimer votre compte')" class="auth__profil_btn auth__profil_delete_btn">
        </form>
    </div>
    @include('layouts.footer')
@endsection
