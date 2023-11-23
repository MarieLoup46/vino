document.addEventListener('DOMContentLoaded', function() {
    const cellierId = document.getElementById("cellier_id").value; // ID do Cellier
    const items = document.querySelectorAll('.cellier-select-item');

    items.forEach(function(item) {
        const bouteilleId = item.dataset.bouteilleId; // Presume que você tenha um atributo data-bouteille-id em cada .cellier-select-item
        const btnPlus = item.querySelector('.plus');
        const btnMoins = item.querySelector('.moins');
        const nombreBouteille = item.querySelector('.quantite-bouteille');

        btnPlus.addEventListener('click', (e) => {
            e.stopPropagation();
            nombreBouteille.value++;
            updateQuantite(cellierId, bouteilleId, nombreBouteille.value);
        });

        btnMoins.addEventListener('click', (e) => {
            e.stopPropagation();
            if(nombreBouteille.value >= 1) { // Change this condition to >= 1
                nombreBouteille.value--;
                updateQuantite(cellierId, bouteilleId, nombreBouteille.value);
            }
        });
    });

    function updateQuantite(cellierId, bouteilleId, quantite) {
        fetch('/cellier/actualiserQuantite', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ 
                cellier_id: cellierId,
                bouteille_id: bouteilleId,
                quantite: quantite
            })
        });
    }
});