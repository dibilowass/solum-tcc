const cardsList = document.querySelector('.cards-list');
const prevButton = document.querySelector('.prev-btn');
const nextButton = document.querySelector('.next-btn');

let totalItens = document.querySelectorAll('.item-card').length;
let currentIndex = 0;


function slideItems() {
  cardsList.style.transform = `translateX(-${currentIndex * 220}px)`; // 220px é a largura do card + a margem
}

// para mover para o próximo 
function nextItem() {
  currentIndex++;
  
  //volta para o primeiro 
  if (currentIndex >= totalItens) {
    currentIndex = 0;
  }
  
  slideItems();
}

// mover para o item anterior
function previousItem() {
  currentIndex = (currentIndex - 1 + totalItens) % totalItens;
  slideItems();
}


prevButton.addEventListener('click', previousItem);
nextButton.addEventListener('click', nextItem);
