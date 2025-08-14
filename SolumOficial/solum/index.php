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
       <img src="assets\banners\bs1.png" class="banner-imagem-principal" alt="Banner principal1"> 
    </div>
    <div class="carousel-item">
       <img src="assets\banners\bs2.png" class="banner-imagem-principal" alt="Banner principal2"> 
    </div>
    <div class="carousel-item">
       <img src="assets\banners\bs3.png" class="banner-imagem-principal " alt="Banner principal3"> 
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
                <img src="assets\banners\bs2.png" alt="Banner Superior" class="banner-imagem-menor">
            </div>
            <div class="banner-inferior">
                <img src="assets\banners\bs3.png" alt="Banner Inferior" class="banner-imagem-menor">
            </div>
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
          echo "<a href='produto.php?proID={$proID}' style='text-decoration: none; color: #131a2b; '> ";
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