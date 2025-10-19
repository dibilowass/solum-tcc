const cardsList = document.querySelector('.cards-list');
const prevButton = document.querySelector('.prev-btn');
const nextButton = document.querySelector('.next-btn');

let totalItens = document.querySelectorAll('.item-card').length;
let currentIndex = 0;


function slideItems() {
  cardsList.style.transform = `translateX(-${currentIndex * 220}px)`; // 220px é a largura do card + a marge m
}

function nextItem() {
  currentIndex++;
 
  if (currentIndex >= totalItens) {
    currentIndex = 0;
  }
  
  slideItems();
}

function previousItem() {
  currentIndex = (currentIndex - 1 + totalItens) % totalItens;
  slideItems();
}


prevButton.addEventListener('click', previousItem);
nextButton.addEventListener('click', nextItem);


 const storeCards = document.querySelectorAll('.store-card');
    storeCards.forEach(card => {
        card.addEventListener('click', function() {
            const storeId = this.dataset.storeId;
            if (storeId) {
                window.location.href = `?page=store&id=${storeId}`;
            }
        });
    });