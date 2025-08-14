<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ini_set('session.cookie_secure', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_samesite', 'Lax');
session_start();
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

require_once("./utils/header.php");
if (isset($_SESSION['usuID'])) {
    // Usuário logado
    require_once( "./utils/navbar_logado.php");
} else {
    // Usuário não logado
    require_once( "./utils/navbar_nao-logado.php");
}
?>


<?php require_once("handlerSelectProduto.php")?>



    

<div class="container-display-produto">
<div class="container-display-fotos-produto"> <img class="produto-foto-destaque" src="https://picsum.photos/300"  id="imagemPrincipal"> </img>
<div class="produto-foto-frame">
        <img src="https://picsum.photos/id/125/300"  alt="Imagem 2" onclick="trocarImagem(this)">
        <img src="https://picsum.photos/id/337/300"  alt="Imagem 3" onclick="trocarImagem(this)">
        <img src="https://picsum.photos/id/237/300" alt="Imagem 4" onclick="trocarImagem(this)">
        
      </div>
</div>

<div class="container-display-infos-produto">
    
<spam class="produto-display-nome"><?= $proNome ?></spam><br>


<p class="produto-display-preco">R$ <?= $proPreco ?> 
         
            <br>
            <i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
            <br>
            <?= $proDescricao ?>

      <br>

      <button style="background-color: whitesmoke; border: 0px ;" onclick="decrementar()">−</button>
  <span id="contador">0</span>
  <button style="background-color: whitesmoke; border: 0px ;" onclick="incrementar()">+</button>


  <script>
    let contador = 0;

    function atualizarDisplay() {
      document.getElementById('contador').textContent = contador;
    }

    function incrementar() {
      contador++;
      atualizarDisplay();
    }

    function decrementar() {
      if (contador > 0) {
        contador--;
        atualizarDisplay();
      }
    }
  </script>




  <br>
  
      <button class="btn btn-primary" id="addCarrinho">Adicionar ao carrinho <i class="bi bi-bag-plus-fill"></i></button>

      <!-- <button class="display-produto-botao-favorito"> Adiconar aos favoritos <i class="bi bi-bookmark-heart-fill"></i></button> -->

      <!-- <form class="display-produto-botao-carrinho" action="add-carrinho.php" method="post">
         <input type="submit" value="Adiconar ao carrinho">  <i class="bi bi-bag-plus-fill"></i>
        </form> -->
</div>

</div>

 <!-- <div class="container-display-produto-loja">Vendido por 
 
</div>  -->


<script>
document.getElementById('addCarrinho').addEventListener('click', function () {
    const nome = <?= json_encode($proNome) ?>;
    const preco = parseFloat(<?= json_encode($proPreco) ?>);
    const descricao = <?= json_encode($proDescricao) ?>;
    const imagem = document.getElementById('imagemPrincipal').src;
    const quantidade = parseInt(document.getElementById('contador').textContent);
    const loja = "Solum"; // ou use uma variável PHP, se quiser
    
    if (quantidade < 1) {
        alert("Escolha ao menos 1 unidade do produto.");
        return;
    }

    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

    // Verifica se já existe no carrinho
    const itemExistente = carrinho.find(item => item.nome === nome && item.preco === preco);

    if (itemExistente) {
        itemExistente.quantidade += quantidade;
    } else {
        carrinho.push({
            id: Date.now(), // ou use um ID real vindo do PHP
            nome: nome,
            preco: preco,
            precoOriginal: null, // ou defina se houver
            imagem: imagem,
            loja: loja,
            quantidade: quantidade
        });
    }

    localStorage.setItem('carrinho', JSON.stringify(carrinho));

    alert('Produto adicionado ao carrinho!');
});
</script>
























<!-- 
<div class="container-produto">
    <div class="metade1">
      <img class="roupa" src="https://picsum.photos/id/237/300/300">
      <div class="roupa-frame">
        <img src="https://picsum.photos/id/237/100">
        <img src="https://picsum.photos/id/237/100">
      </div>
    </div>




    <div class="metade2">

      <section class="nome"> produto </section>

    

      <div class="descricao">
      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy t
      ext ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only 
      five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
       Letraset sheets containing 
      </div>

      <div class="infos">

        <div class="infos1">

          <p class="preco-info"> <del> R$80,00</del>
            <spam class="promo-text"> R$64,00</spam>
          </p> -->
          <!-- <div class="tamanho">
          <input type="radio" id="tamanho-p" value="pp" name="tamanho" style=" height: 20;
    width: 20px;
    border: 1px solid black;
    border-radius: 20%;
    margin-right: 5px;
    margin-left: 5px;
    background-color: white;
    font-family: 'Oswald', sans-serif;
    font-optical-sizing: auto;
    font-weight: 700;"><label for="tamanho-p">P</label>
          <input type="radio" id="tamanho-pp" value="pp"  name="tamanho" style=" height: 20;
    width: 20px;
    border: 1px solid black;
    border-radius: 20%;
    margin-right: 5px;
    margin-left: 5px;
    background-color: white;
    font-family: 'Oswald', sans-serif;
    font-optical-sizing: auto;
    font-weight: 700;"><label for="tamanho-pp">PP</label>
          <input type="radio" id="tamanho-m" value="m"  name="tamanho" style=" height: 20;
    width: 20px;
    border: 1px solid black;
    border-radius: 20%;
    margin-right: 5px;
    margin-left: 5px;
    background-color: white;
    font-family: 'Oswald', sans-serif;
    font-optical-sizing: auto;
    font-weight: 700;"><label for="tamanho-m">M</label>
          <input type="radio" id="tamanho-g" value="g"  name="tamanho" style=" height: 20;
    width: 20px;
    border: 1px solid black;
    border-radius: 20%;
    margin-right: 5px;
    margin-left: 5px;
    background-color: white;
    font-family: 'Oswald', sans-serif;
    font-optical-sizing: auto;
    font-weight: 700;"><label for="tamanho-g">G</label>
          <input type="radio" id="tamanho-gg" value="gg"  name="tamanho" style=" height: 20;
    width: 20px;
    border: 1px solid black;
    border-radius: 20%;
    margin-right: 5px;
    margin-left: 5px;
    background-color: white;
    font-family: 'Oswald', sans-serif;
    font-optical-sizing: auto;
    font-weight: 700;"><label for="tamanho-gg">GG</label>
</div> -->

          <!-- <button class="comprar"> Comprar </button>

          <p class="frete-text"> Calcule o frete </p>
          <div class="frete"> <input type="text" class="frete"> </div>
          <spam class="frete-info"> Frete Grátis para compras acima de R$100,00 !</spam>



        </div>

        <div class="infos2">
          <p class="novidade-info"> NOVIDADE! </p>
          <p class="promo-info"> 20% OFF! </p>

        </div>

      </div>


    </div> -->
<!-- 
    <div class="ladinho">
      <div class="ladinho-frame"><img src="assets/roupas/attk.png"> Camisa Lula Molusco
      <p class="price">R$ 149,99</p> </div>
      <div class="ladinho-frame"><img src="assets/roupas/DEAD.png"> Camisa DEAD!
      <p class="price">R$ 69,99</p></div>
      <div class="ladinho-frame"><img src="assets/roupas/suka.png"> Camisa Suka Queen
      <p class="price">R$ 59,99</p> </div>
      <div class="ladinho-frame"><img src="assets/roupas/ions.png"> Camisa Ions
      <p class="price">R$ 79,99</p> </div>
      <div class="ladinho-frame"><img src="assets/roupas/gato.png"> Camisa Gato Bobão
      <p class="price">R$ 79,99</p> </div>
      <div class="ladinho-frame"><img src="assets/roupas/trolldead.png"> Camisa TrollDead
      <p class="price">R$ 199,99</p></div>
      <div class="ladinho-frame"><img src="assets/roupas/inclemencia.png"> Camisa inclemencia
      <p class="price">R$ 79,99</p> </div>
      <div class="ladinho-frame"><img src="assets/roupas/bermuda-kiss.png"> Bermuda Tantely Kiss</h2>
      <p class="price">R$ 199,99</p> </div>



    </div> -->




  <!-- </div> -->

















<!-- 
<div class="container-display-produto"> 
    
<div class="container-display-produto-esquerda"> <img src="https://picsum.photos/400/370"></img> </div> 

<div class="container-display-produto-direita"> <spam class="display-nome-produto"> Nome do produto</spam>
<br>

<br>
<div class="display-produto-avaliacao"> 
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i> (X Avaliações)</div>
<br>
<spam class="display-produto-preco">R$15,99</spam>
<br>

<spam class="display-produto-info-preco"> ver opções de pagamento </spam>

<br>

<button class="display-produto-comprar">comprar essa porra<i class="bi bi-bag-check"></i></button> 
<button class="display-produto-adicionar-carrinho">add no carrinho essa porra <i class="bi bi-bag-plus"></i></button>
</div>



<div class="container-display-produto-loja"><img src= "https://picsum.photos/200/150"> </img><a href="loja.php"> vendido por loja  </a> <i class="bi bi-patch-check"></i>
<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i> 

<button class="btn-chat-loja"> <i class="bi bi-chat-right-text"></i> Chat com a loja</button> 

</div>
</div>

 -->



<?php require_once("./utils/footer.php") ?>