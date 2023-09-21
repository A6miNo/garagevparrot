document.addEventListener('DOMContentLoaded', function() {
    const popavis = document.querySelector('.popavis');
    const popupOverlay = document.querySelector('.popup-overlay');
    const closeButton = document.querySelector('.close-button'); 

    popavis.addEventListener('click', function(e) {
        e.preventDefault();
        popupOverlay.style.display = 'block'; 
    });

    closeButton.addEventListener('click', function(e) {
        popupOverlay.style.display = 'none'; 
    });

    popupOverlay.addEventListener('click', function(e) {
        if (e.target === this) {
            popupOverlay.style.display = 'none';
        }
    });
});





