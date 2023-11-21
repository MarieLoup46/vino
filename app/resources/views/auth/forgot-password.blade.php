@extends('layouts.app')
@section('title', 'Connexion')
@section('content')

<div class="auth__container">
    <div class="auth__header">
        <h1 class="auth__header-title">Vino</h1>
    </div>

    <div>
        <h2 class="auth__h2-title_forgot-pass">Mot de passe oublié</h2>
    </div>

    <div class="auth__row">
        <div class="auth__col">
            <div class="auth__form-container">
                <form class="auth__form" method="post">
                    @csrf

                    <div class="auth__form-group">
                        <label for="email">COURRIEL:</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{old ('email')}}">
                        @if($errors->has('email'))
                        <div class="auth__login_text_error">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                    </div>
                    <div class="auth__form-footer">
                        <input type="submit" class="auth__btn-login" value="CONNECTER">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
