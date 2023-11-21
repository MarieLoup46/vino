<footer class="footer">
    <div class="footer_nav">
        <a href="/accueil"><img src="/icons/home.png" class="footer-icon" alt="accueil"/>Accueil</a>
    </div>
    <div class="footer_nav">
        <a href="/celliers"><img src="/icons/moncellier.png" class="footer-icon" alt="cellier"/>Cellier</a>
    </div>
    <div class="footer_nav">
        <a href="/recherche"><img src="/icons/rechercher.png" class="footer-icon" alt="recherche"/>Recherche</a>
    </div>
    <div class="footer_nav">
        @if(!auth()->guest())
            <a href="/user/{{ Auth::user()->id }}"><img src="/icons/profil.png" class="footer-icon" alt="profil"/>Profil</a>
        @endif
    </div>
</footer>
