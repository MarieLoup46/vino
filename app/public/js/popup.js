function fermerPopup(event, targetElement){
        
    const popup = document.querySelector(".popup");
    if(event.target == targetElement){
        event.stopPropagation();
        popup.style.display = "none";
    }
        
}

function ouvrirPopup(){
    const popup = document.querySelector(".popup");
    popup.style.display = "flex";
}

const fermerBtn = document.querySelector(".fermer-popup-button");
const popup = document.querySelector(".popup");
const ajouterCeuillerBtns = document.querySelectorAll(".ajouter__bouteille");

fermerBtn.addEventListener('click',event => fermerPopup(event, fermerBtn));
popup.addEventListener('click',event => fermerPopup(event, popup));

ajouterCeuillerBtns.forEach(btn =>{
    btn.addEventListener('click',ouvrirPopup);
});