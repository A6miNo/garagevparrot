//hamburger
let navbar = document.querySelector('.navbar');
let burger = document.querySelector('.burger');

function toggleMenu () {  
    burger.addEventListener('click', () => {   
        navbar.classList.toggle('open-nav');
    });    
    // faire défilier les listes de menu une à  une
    let navbarLinks = document.querySelectorAll('.navbar a');
    navbarLinks.forEach(link => {
        link.addEventListener('click', () => {    
        navbar.classList.toggle('open-nav');
        }); 
    })
    
}

//déclaration de la fonction:
toggleMenu();

// Rendre le lien disabled de la page courante

    const menuLinks = document.querySelectorAll(".link-nav");
  
    menuLinks.forEach(link => {
      if (link.href === window.location.href) {
        link-nav.classList.add("disabled");
      }
    });

  