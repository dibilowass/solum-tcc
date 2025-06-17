function trocarImagem(imagemClicada) {
    const imagemPrincipal = document.getElementById('imagemPrincipal');

    // Troca os srcs (como se trocasse de lugar)
    const tempSrc = imagemPrincipal.src;
    imagemPrincipal.src = imagemClicada.src;
    imagemClicada.src = tempSrc;
  }
  