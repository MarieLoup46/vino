<footer class="footer">
    <div class="footer-nav">
        <div class="footer-lien">
            <a href="/accueil"><img src="/icons/home.png" class="footer-icon" alt="accueil"/></a>
            <span class="footer-text">Accueil</span>
        </div>
        <div class="footer-lien">
            <a href="/celliers"><img src="/icons/moncellier.png" class="footer-icon" alt="cellier"/></a>
            <span class="footer-text">Cellier</span>
        </div>
        <div class="footer-lien">
            <a href="/recherche"><img src="/icons/rechercher.png" class="footer-icon" alt="recherche"/></a>
            <span class="footer-text">Recherche</span>
        </div>
        <div class="footer-lien">
            <a href="/user/{{ Auth::user()->id }}"><img src="/icons/profil.png" class="footer-icon" alt="profil"/></a>
            <span class="footer-text">Profil</span>
        </div>
    </div>
</footer>
