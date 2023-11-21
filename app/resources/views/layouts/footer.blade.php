<footer class="footer">
    <div class="footer-nav">
        <div class="footer-lien">
            <div class="footer-icon">
                <a href="/accueil"><img src="/icons/home.png" class="footer-icon" alt="accueil"/></a>
            </div>
            <div class="footer-icon">
                <span>Accueil</span>
            </div>
        </div>

        <div class="footer-lien">
            <div>
                <a href="/celliers"><img src="/icons/moncellier.png" class="footer-icon" alt="cellier"/></a>
            </div>
            <div class="footer-icon">
                <span>Accueil</span>
            </div>
        </div>

        <div class="footer-lien">
            <div>
                <a href="/recherche"><img src="/icons/rechercher.png" class="footer-icon" alt="recherche"/></a>
            </div>
            <div class="footer-icon">
                <span>Accueil</span>
            </div>
        </div>

        <div class="footer-lien">
            <div>
                <a href="/user/{{ Auth::user()->id }}"><img src="/icons/profil.png" class="footer-icon" alt="profil"/></a>
            </div>
            <div class="footer-icon">
                <span>Accueil</span>
            </div>
        </div>
    </div>
</footer>
