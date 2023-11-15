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

        <div class="auth_form_profil">
            <form>
                <label for="nom" id="nom">{{ $user->nom }}</label>
                <input type="text" id="nom" name="nom">

                <button type="submit" class="btn-submit">CRÉER UN CELLIER</button>
            </form>
        </div>
    </div>
@endsection
@include('layouts.footer')
