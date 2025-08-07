<?php require_once("./utils/session.php")?>
<?php require_once("./utils/header.php"); ?>
<?php
if (isset($_SESSION['usuID'])) {
   
    require_once( "./utils/navbar_logado.php");
} else {
  
    require_once( "./utils/navbar_nao-logado.php");
}
?>


<div class="banner-layout">
        
        <div class="banner-principal">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
       <img src="assets\banners\banner1.png" class="banner-imagem-principal" alt="Banner principal1"> 
    </div>
    <div class="carousel-item">
       <img src="assets\banners\banner2.png" class="banner-imagem-principal" alt="Banner principal2"> 
    </div>
    <div class="carousel-item">
       <img src="assets\banners\banner3.png" class="banner-imagem-principal " alt="Banner principal3"> 
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Próximo</span>
  </button>
</div> 
        </div>
        
        
        <div class="banners-menores">
            <div class="banner-superior">
                <img src="assets\banners\banner4.png" alt="Banner Superior" class="banner-imagem-menor">
            </div>
            <div class="banner-inferior">
                <img src="assets\banners\banner3.png" alt="Banner Inferior" class="banner-imagem-menor">
            </div>
        </div>
    </div>



    
<div class="produtos-wrapper">
    <div class="slider-container">
      <div class="cards-list">
        <div class="item-card">
          <img src="assets/imagens/produto1.jpg" alt="Produto 1">
          <h3>Higiene</h3>
         
        </div>
        <div class="item-card">
        <img src="assets/imagens/produto2.jpg" alt="Produto 2">
          <h3>Perfumes</h3>
          
        </div>
        <div class="item-card">
        <img src="assets/imagens/produto3.jpg" alt="Produto 3">
          <h3>Alimentos</h3>
         
        </div>
        <div class="item-card">
          <img src="assets/imagens/produto1.jpg" alt="Produto 4">
          <h3>Veganos</h3>
          
        </div>
        <div class="item-card">
          <img src="assets/imagens/produto2.jpg" alt="Produto 5">
          <h3>Menos residuos</h3>
         
        </div>
        <div class="item-card">
          <img src="assets/imagens/produto3.jpg" alt="Produto 5">
          <h3>Produto 6</h3>
         
        </div>
        <div class="item-card">
          <img src="https://via.placeholder.com/150" alt="Produto 5">
          <h3>Produto 7</h3>
         
        </div>
        <div class="item-card">
          <img src="https://via.placeholder.com/150" alt="Produto 5">
          <h3>Produto 8</h3>
         
        </div>
        <div class="item-card">
          <img src="https://via.placeholder.com/150" alt="Produto 5">
          <h3>Produto 9</h3>
         
        </div>
        <div class="item-card">
          <img src="https://via.placeholder.com/150" alt="Produto 5">
          <h3>Produto 10</h3>
         
        </div>
      </div>
      
      <button class="prev-btn">&#8592;</button>
      <button class="next-btn">&#8594;</button>
    </div>
  </div>


<div class="container"> 
<br>
<spam class="titulo-secao">Confira nossos produtos em destaque e ajude<br> o 
<strong style="color: #ff6b00;"> meio ambiente</strong><br> a prosperar. <br>
<button>Ver todos</button> </spam>
<br>

<div class="product-container">
  <?php require_once("handlerSelectProdutos.php")?>
<?php
 $stmtLatest = $produto->getLatest();
$numLatest = $stmtLatest->rowCount();
if ($numLatest > 0) {
    while ($row = $stmtLatest->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
          echo "<a href='produto.php?proID={$proID}'> ";
        echo "<div class='product-card'>";
        echo "<img src='$proFoto'>";
        echo "<div class='product-info'>";
        echo "<h3>{$proNome}</h3>";
        echo "<p class='price'>RS {$proPreco}</p>";
        $lojNome = $produto->getLoja($proLojaID);
        echo "<p>Vendido por <a href='loja.php?lojID={$proLojaID}'> {$lojNome} </a></p>";
        echo "</div>";
        echo "</div>";
        echo "</a>";
    }
} else {
    echo "<p>Nenhum produto recente foi encontrado</p>";
}

?>

 </div>



</div>

<!-- <div class="banner-menor">
  <img src="assets\banners\banner-infos.png">
</div> -->

<div class="container-destaques"> 
<spam class="titulo-secao"> Mais Acessados </spam>

<div class="product-container">
    <div class="product-card">
      <img src="assets\imagens\produto1.jpg" alt="Produto 1">
      <div class="product-info">
        <h3>Escova de Dentes de Bambu</h3>
        <p class="price">R$ 34,99</p>
        <p>Vendido por <a href="loja.php"> Mundo Verde </a></p>
      </div>
    </div>
    <div class="product-card">
      <img src="assets\imagens\produto2.jpg" alt="Produto 2">
      <div class="product-info">
        <h3>Creme Dental Natural</h3>
        <p class="price">R$ 24,99</p>
        <p class="">Vendido por <a href="loja.php"> Mundo Verde </a></p>
      </div>
    </div>
    <div class="product-card">
      <img src="assets\imagens\produto3.jpg" alt="Produto 3">
      <div class="product-info">
        <h3>Serum Facial Antioxidante</h3>
        <p class="price">R$ 49,99</p>
        <p class="">Vendido por <a href="loja.php"> Mundo Verde </a></p>
      </div>
    </div>
    <div class="product-card">
      <img src="assets\imagens\produto4.jpg" alt="Produto 4">
      <div class="product-info">
        <h3>Óleo Corporal Natural de Coco</h3>
        <p class="price">R$ 34,99</p>
        <p class="">Vendido por <a href="loja.php"> Mundo Verde </a></p>
      </div>
    </div>
   
   
  </div>

  </div>

  <!-- <div class="banner-menor">
  <img src="assets\banners\banner-naturalle.jpg">
</div>

   -->
<div class="container-destaques"> 
<spam class="titulo-secao"> Mais bem avaliados </spam>

<div class="product-container">
    <div class="product-card">
      <img src="assets\imagens\produto1.jpg" alt="Produto 1">
      <div class="product-info">
        <h3>Escova de Dentes de Bambu</h3>
        <p class="price">R$ 34,99</p>
        <p>Vendido por <a href="loja.php"> Mundo Verde </a></p>
      </div>
    </div>
    <div class="product-card">
      <img src="assets\imagens\produto2.jpg" alt="Produto 2">
      <div class="product-info">
        <h3>Creme Dental Natural</h3>
        <p class="price">R$ 24,99</p>
        <p class="">Vendido por <a href="loja.php"> Mundo Verde </a></p>
      </div>
    </div>
    <div class="product-card">
      <img src="assets\imagens\produto3.jpg" alt="Produto 3">
      <div class="product-info">
        <h3>Serum Facial Antioxidante</h3>
        <p class="price">R$ 49,99</p>
        <p class="">Vendido por <a href="loja.php"> Mundo Verde </a></p>
      </div>
    </div>
    <div class="product-card">
      <img src="assets\imagens\produto4.jpg" alt="Produto 4">
      <div class="product-info">
        <h3>Óleo Corporal Natural de Coco</h3>
        <p class="price">R$ 34,99</p>
        <p class="">Vendido por <a href="loja.php"> Mundo Verde </a></p>
      </div>
    </div>
   
   
  </div>

  

  <div class="product-container">
    <div class="product-card">
      <img src="assets\imagens\produto1.jpg" alt="Produto 1">
      <div class="product-info">
        <h3>Escova de Dentes de Bambu</h3>
        <p class="price">R$ 34,99</p>
        <p>Vendido por <a href="loja.php"> Mundo Verde </a></p>
      </div>
    </div>
    <div class="product-card">
      <img src="assets\imagens\produto2.jpg" alt="Produto 2">
      <div class="product-info">
        <h3>Creme Dental Natural</h3>
        <p class="price">R$ 24,99</p>
        <p class="">Vendido por <a href="loja.php"> Mundo Verde </a></p>
      </div>
    </div>
    <div class="product-card">
      <img src="assets\imagens\produto3.jpg" alt="Produto 3">
      <div class="product-info">
        <h3>Serum Facial Antioxidante</h3>
        <p class="price">R$ 49,99</p>
        <p class="">Vendido por <a href="loja.php"> Mundo Verde </a></p>
      </div>
    </div>
    <div class="product-card">
      <img src="assets\imagens\produto4.jpg" alt="Produto 4">
      <div class="product-info">
        <h3>Óleo Corporal Natural de Coco</h3>
        <p class="price">R$ 34,99</p>
        <p class="">Vendido por <a href="loja.php"> Mundo Verde </a></p>
      </div>
    </div>
   
   
  </div>

  </div>




<?php require_once("./utils/footer.php") ?>