function trocarImagem(imagemClicada) {
    const imagemPrincipal = document.getElementById('imagemPrincipal');

  
    const tempSrc = imagemPrincipal.src;
    imagemPrincipal.src = imagemClicada.src;
    imagemClicada.src = tempSrc;
  }
  
  

function buscarProdutos(event) {
    event.preventDefault();

    const termo = document.getElementById('inputPesquisa').value;

    fetch(`buscar-produtos.php?q=${encodeURIComponent(termo)}`)
        .then(response => response.json())
        .then(produtos => {
          
            const resultadosDiv = document.getElementById('resultados');
            resultadosDiv.innerHTML = ''; 

            if (produtos.length === 0) {
                resultadosDiv.innerHTML = '<p>Nenhum produto encontrado.</p>';
            } else {
                produtos.forEach(prod => {
                    const item = document.createElement('div');
                    item.classList.add('produto-item');
                    item.innerHTML = `
                        <img src="${prod.proFoto}" alt="${prod.proNome}" width="100">
                        <h3>${prod.proNome}</h3>
                        <p>${prod.proDescricao}</p>
                        <p>Preço: R$ ${parseFloat(prod.proPreco).toFixed(2)}</p>
                    `;
                    resultadosDiv.appendChild(item);
                });
            }
        })
        .catch(error => {
            console.error('Erro ao buscar produtos:', error);
        });
}
