<main class="cellier-select-container">
    <header class="cellier-select-titre">
        <div class="cellier-item-action">
            <img src="{{ asset('icons/parametre.png') }}" alt="info" class="cellier-parametre-icon" />
        </div>
        <h3>NOM DA CELLIER</h3>
        <div class="cellier-select-ajouter">
            <form action="#" method="GET"> <!-- Substitua o # pelo seu link -->
                <button type="submit" class="cellier-select-ajouter-btn">AJOUTE UNE BOUTEILLE</button>
            </form>
        </div>
    </header>
    <div class="cellier-select-list">
        <!-- Aqui você colocará seu loop para listar os itens -->
        <div class="cellier-select-item">
            <img alt="Nom" src="#" class="cellier-select-icon" /> <!-- Substitua o # pelo seu link -->
            <div class="cellier-select-bouteille">{{ $item->nome }}</div> <!-- Substitua $item->nome pelo campo desejado do seu objeto -->
            <div class="cellier-select-item-content">
                <small class="cellier-select-bottle-count">Pays</small>
                <small class="cellier-select-bottle-count">Type</small>
                <small class="cellier-select-bottle-count">X ml</small>
            </div>
        </div>
        <!-- Fim do loop -->
    </div>
</main>
