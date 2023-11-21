@extends('layouts.app')
@section('title', 'Nouveau <main></main>ot de passe')
@section('content')

<div class="auth__container">
    @if(session('success'))
	<div class="alert alert-success" role="alert">
		{{session('success')}}
	</div>
	@endif
    <div class="auth__header">
        <h1 class="auth__header-title">Vino</h1>
    </div>

    <div>
        <h2 class="auth__h2-title_forgot-pass">Nouveau mot de passe</h2>
    </div>

    <div class="auth__row">
        <div class="auth__col">
            <div class="auth__form-container">
                <form class="auth__form" method="post">
                    @csrf

                    <div class="auth__form-group">
                        <label for="password">MOT DE PASSE:</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @if($errors->has('password'))
                            <div class="auth__login_text_error">
                                {{$errors->first('password')}}
                            </div>
                        @endif
                    </div>
                    <div class="auth__form-group">
                    <label for="password">CONFIRMER MOT DE PASSE :</label>
                        <input type="password" id="password" name="password" class="form-control">
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
