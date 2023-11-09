<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Auth</title>

</head>
<body>
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
                            <input type="nom" id="nom" name="nom" class="form-control" value="">
                        </div>
                        <div class="auth__form-group">
                            <label for="prenom">PRENOM:</label>
                            <input type="prenom" id="prenom" name="prenom" class="form-control" value="">
                        </div>
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
                        </div>
                        <div class="auth__form-footer">
                            <input type="submit" class="auth__btn-login" value="INSCRIPTION">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<footer class="footer">
    <img src="/icons/home.png" class="footer-icon"/>
    <img src="/icons/moncellier.png" class="footer-icon"/>
    <img src="/icons/rechercher.png" class="footer-icon"/>
    <img src="/icons/profil.png" class="footer-icon"/>
</footer>

</html>
