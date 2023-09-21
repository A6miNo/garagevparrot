//Fonction pour interchanger les images


document.addEventListener('DOMContentLoaded', function() {
    const imgSmallList = document.querySelectorAll('.img-small');
    const imgOne = document.querySelector('.img_one');

    imgSmallList.forEach(imgSmall => {
        imgSmall.addEventListener('click', function() {
            const smallSrc = this.getAttribute('data-src');
            const imgOneSrc = imgOne.getAttribute('src');

            // Échanger les sources entre img_one et l'image cliquée
            imgOne.setAttribute('src', smallSrc);
            this.setAttribute('data-src', imgOneSrc);
            this.setAttribute('src', imgOneSrc);
        });
    });
});


//Fonction pour fermer la fenêtre au clic 
const btnClosing = window.document.getElementById('close');

btnClosing.addEventListener('click',()=>{
    window.close();
})




