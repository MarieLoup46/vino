var nombreBouteille = document.querySelector(".ajout-bouteille__quantite .quantite");
var btnPlus = document.querySelector(".ajout-bouteille__quantite .plus");
var btnMoins = document.querySelector(".ajout-bouteille__quantite .moins");

btnPlus.addEventListener('click', () => {
    nombreBouteille.value++;
});

btnMoins.addEventListener('click', () => {
    if(nombreBouteille.value > 1) nombreBouteille.value--;
});