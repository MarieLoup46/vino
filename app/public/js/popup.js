function fermerPopup(event){
        
    const popup = document.querySelector(".popup");
    if(event.target == popup){
        event.stopPropagation();
        popup.style.display = "none";
    }
        
}
const fermerBtn = document.querySelector(".fermer-popup-button");
const popup = document.querySelector(".popup");
fermerBtn.addEventListener('click',fermerPopup);
popup.addEventListener('click',fermerPopup);