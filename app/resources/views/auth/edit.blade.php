@extends('layouts.app')
@section('title', 'Mise à jour')
@section('content')
    <div class="auth__container_profil">
        <div>
            <h2 class="auth__header_h2-title">Profil</h2>
        </div>

        <div>
            <h3 class="auth__h3-title">MISE À JOUR</h3>
        </div>

        <form class="auth__form_profil" method="post">
            <!-- La méthode 'put' permet de faire l'update -->
            @method('put')
            @csrf
            <div class="auth__form_profil_group">
                <label for="nom" id="nom">NOM:</label>
                <input type="text" id="nom" name="nom" value="{{ $user->nom }}">
            </div>
            <div>
                @if($errors->has('nom'))
                    <div class="auth__text_error">
                        {{$errors->first('nom')}}
                    </div>
                @endif
            </div>

            <div class="auth__form_profil_group">
                <label for="prenom" id="prenom">PRÉNOM:</label>
                <input type="text" id="prenom" name="prenom" value="{{ $user->prenom }}">
            </div>
            <div>
                @if($errors->has('prenom'))
                    <div class="auth__text_error">
                        {{$errors->first('prenom')}}
                    </div>
                @endif
            </div>

            <div class="auth__form_profil_group">
                <label for="email" id="email">COURRIEL:</label>
                <input type="text" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div>
                @if($errors->has('email'))
                    <div class="auth__text_error">
                        {{$errors->first('email')}}
                    </div>
                @endif
            </div>

            <div class="auth__form_profil_group">
                <button type="submit" class="auth__profil_btn">MISE À JOUR</button>
            </div>
        </form>
    </div>
    @include('layouts.footer')
@endsection
