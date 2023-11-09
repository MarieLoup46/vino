<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Accueil</title>

</head>
<body>
    <div class="accueil__container">
        <div class="accueil__header">
            <h1 class="accueil__header-title">Bonjour {{Auth::user() ? Auth::user()->prenom :
				'Guest'}}</h1>
            <div class="accueil__header-button">
                <a href="/cellier">Ajouter un Cellier</a>
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
