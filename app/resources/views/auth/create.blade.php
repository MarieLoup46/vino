@extends('layouts.app')
@section('title', 'Créer un compte')
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
                        <label for="nom">NOM:</label>
                        <input type="nom" id="nom" name="nom" class="form-control" value="{{old('nom')}}">
                        @if($errors->has('nom'))
                            <div class="auth__login_text_error">
                                {{$errors->first('nom')}}
                            </div>
                        @endif
                    </div>
                    <div class="auth__form-group">
                        <label for="prenom">PRENOM:</label>
                        <input type="prenom" id="prenom" name="prenom" class="form-control" value="{{old('prenom')}}">
                        @if($errors->has('prenom'))
                            <div class="auth__login_text_error">
                                {{$errors->first('prenom')}}
                            </div>
                        @endif
                    </div>
                    <div class="auth__form-group">
                        <label for="email">COURRIEL:</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}">
                        @if($errors->has('email'))
                        <div class="auth__login_text_error">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                    </div>
                    <div class="auth__form-group">
                        <label for="password">MOT DE PASSE:</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @if($errors->has('password'))
                        <div class="auth__login_text_error">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                    </div>
                    <div class="auth__form-footer">
                        <input type="submit" class="auth__btn-login" value="INSCRIPTION">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
