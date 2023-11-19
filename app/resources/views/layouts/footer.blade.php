<footer class="footer">
    <a href="/accueil"><img src="/icons/home.png" class="footer-icon" alt="accueil"/></a>
    <a href="/celliers"><img src="/icons/moncellier.png" class="footer-icon" alt="cellier"/></a>
    <a href="/recherche"><img src="/icons/rechercher.png" class="footer-icon" alt="recherche"/></a>
    @if(auth()->guest())
        <a href="/user"><img src="/icons/profil.png" class="footer-icon" alt="profil"/></a>
    @else
        <a href="/user/{{ Auth::user()->id }}"><img src="/icons/profil.png" class="footer-icon" alt="profil"/></a>
    @endif
</footer>
