//POO avec class pour le survol des elements
class HoverElement {
    constructor(elementSelector, hoverText) {
      this.element = document.querySelector(elementSelector);
      this.originalText = this.element.textContent;
      this.hoverText = hoverText;
  
      this.setupHover();
    }
  
    setupHover() {
      if (this.element) {
        this.element.addEventListener("mouseover", () => {
          this.element.textContent = this.hoverText;
        });
  
        this.element.addEventListener("mouseout", () => {
          this.element.textContent = this.originalText;
        });
      }
    }
  }
  
  const phone= document.getAttribute("data-tel-bdd");
  // Les instances de HoverElement
  const telHover = new HoverElement(".btn-tel", phone);
  const adrHover = new HoverElement(".btn-adr", "110 rue fictive 31400 Toulouse");
 

