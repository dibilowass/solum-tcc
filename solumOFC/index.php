<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_set_cookie_params([
    'lifetime' => 0,                
    'path' => '/',
    'domain' => 'solum.hubsapiens.com.br',
    'secure' => true,              
    'httponly' => true,           
    'samesite' => 'Lax'           
]);

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
    <section class="hero-banner">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Produtos Sustentáveis para um Futuro Melhor</h1>
                <p>Descubra uma ampla variedade de produtos ecológicos que cuidam de você e do planeta. Juntos,
                    construímos um mundo mais sustentável.</p>
                <div class="hero-buttons">
                    <a href="explorar-produtos.php" class="btn btn-primary">Explorar Produtos</a>
                    <a href="vender.php" class="btn btn-secondary">Seja um Vendedor</a>
                </div>
            </div>
            <div class="hero-image">
                <div class="eco-illustration">
                    <div class="leaf-1"></div>
                    <div class="leaf-2"></div>
                    <div class="leaf-3"></div>
                    <div class="leaf-4"></div>
                    <div class="leaf-5"></div>
                    <div class="earth-globe">
                        <img src="assets/imagens/terra.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

<hr>

<!-- <div class="banner-layout">
        
        <div class="banner-principal">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
       <img src="assets\banners\bs1.png" class="banner-imagem-principal" alt="Banner principal1"> 
    </div>
    <div class="carousel-item">
       <img src="assets\banners\bs1.png" class="banner-imagem-principal" alt="Banner principal2"> 
    </div>
    <div class="carousel-item">
       <img src="assets\banners\bs1.png" class="banner-imagem-principal " alt="Banner principal3"> 
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

    -->
<br>
<br>
<br>

<div class="cardIndexContainer">
    <div class="cardIndex">
      <i class="bi bi-hand-thumbs-up cardIndexIcon"></i>
      <div class="cardIndexContent">
        <h3 class="cardIndexTitle">Nossa Missão</h3>
        <p class="cardIndexDescription">Promovemos um consumo mais consciente e acessível. 
          Nosso objetivo é conectar pessoas a produtos sustentáveis que respeitam o meio ambiente e valorizam pequenos produtores.</p>
      </div>
    </div>

    <div class="cardIndex">
<i class="bi bi-recycle cardIndexIcon"></i>
      <div class="cardIndexContent">
        <h3 class="cardIndexTitle">Produtos Sustentáveis e Éticos</h3>
        <p class="cardIndexDescription">Oferecemos uma seleção de itens ecológicos, 
          reutilizáveis e veganos - de cuidados pessoais a utensílios para o dia a dia - todos com impacto reduzido no planeta. </p>
      </div>
    </div>

    <div class="cardIndex">
      <i class="bi bi-star cardIndexIcon"></i>
      <div class="cardIndexContent">
        <h3 class="cardIndexTitle">Juntos pelo Futuro</h3>
        <p class="cardIndexDescription">Ao escolher nossos produtos, você apoia práticas responsáveis, 
          reduz seu impacto ambiental e contribui para um futuro mais limpo e justo para todos.</p>
      </div>
    </div>
  </div>

  <br>

<div class="container"> 
<br>
<spam class="titulo-secao">Confira nossos produtos em destaque e ajude<br> o 
<strong style="color: #ff6b00;"> meio ambiente</strong><br> a prosperar. <br>
<!-- <button class="btn-primary">Ver todos</button> -->
 </spam>
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
        echo "<p>Vendido por <a href='perfil-loja.php?lojID={$proLojaID}' style='text-decoration: none; color: #ff6b00;'> {$lojNome} </a></p>";
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
<br>

<!-- <div class="banner-menor">
  <img src="assets\banners\banner-infos.png">
</div> -->

<!-- <div class="container-destaques"> 
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

  </div> -->

  <!-- <div class="banner-menor">
  <img src="assets\banners\banner-naturalle.jpg">
</div>

   -->
<!-- <div class="container-destaques"> 
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

  </div> -->




<?php require_once("./utils/footer.php") ?>