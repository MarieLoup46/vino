@extends('layouts.app')
@section('title', 'Connexion')
@section('content')

<div class="auth__container">
    <div class="auth__header">
        <h1 class="auth__header-title">vino</h1>
    </div>
    <div class="auth__row">
        <div class="auth__col">
            <div class="auth__form-container">
                <form class="auth__form" method="post">
                    @csrf

                    <div class="auth__form-group">
                        <label for="email">COURRIEL:</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}">
                        @if($errors->has('email'))
                        <div class="text-danger mt-2">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                    </div>
                    <div class="auth__form-group">
                        <label for="password">MOT DE PASSE:</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @if($errors->has('password'))
                        <div class="text-danger mt-2">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                        <div class="auth__form-pwdforgot">
                            <a href="#">Mot de passe oublié ?</a>
                        </div>
                    </div>
                    <div class="auth__form-footer">
                        <input type="submit" class="auth__btn-login" value="CONNECTER">
                    </div>
                    <div class="auth__footer-message">
                        <small>Vous n'avez pas de compte ?</small>
                        <a href="/registration">S'incrire</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
