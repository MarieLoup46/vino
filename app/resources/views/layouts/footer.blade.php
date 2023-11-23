<footer class="footer">
	<div class="footer-nav">
		<div class="footer-lien">
			<a href="/accueil"><img src="/icons/home.png" class="footer-icon" alt="accueil" />
				<span class="footer-text">Accueil</span></a>
		</div>
		<div class="footer-lien">
			<a href="/celliers"><img src="/icons/moncellier.png" class="footer-icon" alt="cellier" />
				<span class="footer-text">Cellier</span></a>
		</div>
		<div class="footer-lien">
			<a href="/recherche"><img src="/icons/rechercher.png" class="footer-icon" alt="recherche" />
				<span class="footer-text">Recherche</span></a>
		</div>
		<div class="footer-lien">
			<a href="/user/{{ Auth::user()->id }}"><img src="/icons/profil.png" class="footer-icon" alt="profil" />
				<span class="footer-text">Profil</span></a>
		</div>
	</div>
</footer>
