<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
</body>
<footer class="footer">
    <a href="/accueil"><img src="/icons/home.png" class="footer-icon" alt="accueil"/></a>
    <a href="/celliers"><img src="/icons/moncellier.png" class="footer-icon" alt="cellier"/></a>
    <a href="/recherche"><img src="/icons/rechercher.png" class="footer-icon" alt="recherche"/></a>
    <a href="/profil"><img src="/icons/profil.png" class="footer-icon" alt="profil"/></a>
</footer>
</html>

