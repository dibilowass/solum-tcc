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
    <!-- <section class="hero-banner">
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
    </section> -->

<section class="banner-planeta">
  <div class="overlay"></div>

  <!-- Vines in corners (decorative, pointer-events:none). Each contains an inline SVG so we can animate the path drawing and leaves. -->
  <div class="vine vine-tl" aria-hidden="true">
    <svg viewBox="0 0 200 200" preserveAspectRatio="xMinYMin meet" class="vine-svg" aria-hidden="true">
      <path class="vine-path" d="M0 200 C50 150 50 50 140 0" fill="none" stroke="#ff8c3d" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
      <g class="vine-leaves">
        <ellipse class="leaf l1" cx="60" cy="140" rx="8" ry="5" fill="#ff8c3d" />
        <ellipse class="leaf l2" cx="90" cy="110" rx="8" ry="5" fill="#ff8c3d" />
        <ellipse class="leaf l3" cx="115" cy="80" rx="8" ry="5" fill="#ff8c3d" />
      </g>
    </svg>
  </div>

  <div class="vine vine-tr" aria-hidden="true">
    <svg viewBox="0 0 200 200" preserveAspectRatio="xMinYMin meet" class="vine-svg" aria-hidden="true">
      <path class="vine-path" d="M0 200 C50 150 50 50 140 0" fill="none" stroke="#ff8c3d" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
      <g class="vine-leaves">
        <ellipse class="leaf l1" cx="60" cy="140" rx="8" ry="5" fill="#ff8c3d" />
        <ellipse class="leaf l2" cx="90" cy="110" rx="8" ry="5" fill="#ff8c3d" />
        <ellipse class="leaf l3" cx="115" cy="80" rx="8" ry="5" fill="#ff8c3d" />
      </g>
    </svg>
  </div>

  <!-- <div class="vine vine-bl" aria-hidden="true">
    <svg viewBox="0 0 200 200" preserveAspectRatio="xMinYMin meet" class="vine-svg" aria-hidden="true">
      <path class="vine-path" d="M0 200 C50 150 50 50 140 0" fill="none" stroke="#ff8c3d" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
      <g class="vine-leaves">
        <ellipse class="leaf l1" cx="60" cy="140" rx="8" ry="5" fill="#ff8c3d" />
        <ellipse class="leaf l2" cx="90" cy="110" rx="8" ry="5" fill="#ff8c3d" />
        <ellipse class="leaf l3" cx="115" cy="80" rx="8" ry="5" fill="#ff8c3d" />
      </g>
    </svg>
  </div> -->

  <div class="vine vine-br" aria-hidden="true">
    <svg viewBox="0 0 200 200" preserveAspectRatio="xMinYMin meet" class="vine-svg" aria-hidden="true">
      <path class="vine-path" d="M0 200 C50 150 50 50 140 0" fill="none" stroke="#ff8c3d" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
      <g class="vine-leaves">
        <ellipse class="leaf l1" cx="60" cy="140" rx="8" ry="5" fill="#ff8c3d" />
        <ellipse class="leaf l2" cx="90" cy="110" rx="8" ry="5" fill="#ff8c3d" />
        <ellipse class="leaf l3" cx="115" cy="80" rx="8" ry="5" fill="#ff8c3d" />
      </g>
    </svg>
  </div>

  <div class="conteudo-banner">
    <h1 id="mensagem">Produtos Sustentáveis para um Futuro Melhor </h1>
    <p>Transforme suas escolhas em impacto positivo. Juntos, cultivamos um planeta mais verde.</p>

    <div class="botoes">
      <a href="explorar-produtos.php"> <button id="explorarBtn" class="btn btn-primary"> Explorar Produtos</button></a>
      <button class="btn btn-secondary">Seja um Vendedor</button>
    </div>

    <!-- <p class="contador">♻️ <span id="contador">12.000</span> kg de CO₂ compensados</p> -->
  </div>

  <div class="planeta-container">
    <div class="plant-scene" aria-hidden="false">
      <div class="pot">
        <div class="soil"></div>
        <div class="stem"></div>
        <div class="leaf left"></div>
        <div class="leaf right"></div>
        <!-- <div class="flower">
          <div class="petal petal1"></div>
          <div class="petal petal2"></div>
          <div class="petal petal3"></div>
          <div class="petal petal4"></div>
          <div class="petal petal5"></div>
          <div class="petal petal6"></div>
          <div class="petal petal7"></div>
          <div class="petal petal8"></div>
          <div class="center">♻️</div> -->
        </div>
      </div>

      <div class="bees" aria-hidden="true">
        <div class="bee bee1" aria-hidden="true"></div>
        <div class="bee bee2" aria-hidden="true"></div>
      </div>
    </div>
  </div>

  <div id="folhas"></div>
</section>

<style>

.banner-planeta {
  position: relative;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 3.5rem 6%;
  color: #304269;
  overflow: hidden;
  /* height: 100%; */
  /* background: linear-gradient(135deg, #ffefe4ff, #F8FAFC, #dfe9ffff); */
  background-color: #FFFFFF;
  animation: bgMove 12s ease-in-out infinite alternate;
  font-family: 'Zain';
    font-style: normal;
    font-weight: 400;
    min-height: 65vh;
    /* font-size: 2.8rem; */
}

@keyframes bgMove {
  0% { background-position: 0% 50%; }
  100% { background-position: 100% 50%; }
}

.overlay {
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at 20% 40%, rgba(255,255,255,0.4), transparent 70%);
  z-index: 1;
}

.conteudo-banner {
  position: relative;
  z-index: 3;
  max-width: 50%;
  animation: fadeIn 1.2s ease;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

.conteudo-banner h1 {
  font-size: 3.5rem;
  font-weight: 700;
  color: #304269;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
}

.conteudo-banner p {
  font-size: 2.1rem;
  margin-top: 1rem;
  line-height: 1.6;
  color: #304269;
}


.botoes {
  margin-top: 2rem;
}



.planeta-container {
  width: 38%;
  position: relative;
  z-index: 2;
  animation: float 6s ease-in-out infinite;
}

.planeta {
  width: 70%;
  border-radius: 50%;
  animation: girar 30s linear infinite;
  box-shadow: 0 0 60px rgba(150, 90, 0, 0.4);
}

@keyframes girar {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}

@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-15px); }
}

/* Plant scene (replaces planet) */
.plant-scene {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
}

/* move the scene down slightly so navbar doesn't clip the top */
.plant-scene { margin-top: 28px; }

.pot {
  width: 240px;
  height: 260px;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: flex-end;
}

.soil {
  width: 180px;
  height: 28px;
  background: linear-gradient(180deg,#5a3f29,#2b1f14);
  border-radius: 50%;
  position: absolute;
  bottom: 70px;
  z-index: 2;
}

.pot::before {
  content: '';
  width: 220px;
  height: 90px;
  background: linear-gradient(180deg,#d9773b,#b65b2a);
  border-radius: 12px 12px 40px 40px;
  position: absolute;
  bottom: 0;
  z-index: 1;
  box-shadow: 0 6px 10px rgba(0,0,0,0.15) inset;
}

.stem {
  width: 12px;
  background: linear-gradient(180deg,#6fbf6b,#2e7d32);
  /* restore original max stem length */
  height: calc(40px + (var(--growth, 0) * 220px));
  border-radius: 8px;
  position: absolute;
  bottom: 70px;
  z-index: 3;
  transition: height 160ms linear, transform 160ms linear;
  transform-origin: bottom center;
}

.leaf {
  width: 80px;
  height: 40px;
  background: linear-gradient(180deg,#7ad27a,#2f8f3a);
  position: absolute;
  bottom: calc(70px + 40px);
  border-radius: 40px 40px 10px 10px;
  opacity: calc(var(--growth) * 1.2);
  transform-origin: left center;
  /* leaf opens and raises as growth increases */
  transform: translateY(calc((1 - var(--growth)) * 12px)) rotate(calc(-35deg + var(--growth) * 25deg));
  transition: transform 140ms linear, opacity 140ms linear;
}

.leaf.left { left: calc(50% - 10px - 60px); }
.leaf.right { left: calc(50% + 10px); transform: rotate(calc(20deg - var(--growth) * 30deg)); }


/* flower container is larger so petals can sit around the center */
/* flower container is larger so petals can sit around the center */
.flower {
  width: 72px;
  height: 72px;
  position: absolute;
  /* position flower at top of stem: base 70px + 40px + stem length (200px) * growth */
  bottom: calc(70px + 40px + (var(--growth,0) * 200px));
  left: calc(50% - 36px);
  pointer-events: none;
  z-index: 4;
}

.petal {
  position: absolute;
  left: 50%;
  top: 50%;
  width: 26px;
  height: 16px;
  background: linear-gradient(180deg,#ffd6e0,#ff9fb0);
  border-radius: 12px 12px 6px 6px;
  opacity: calc((var(--growth,0) - 0.4) * 1.6);
  transform-origin: center center;
  transition: transform 120ms linear, opacity 120ms linear;
}
/* radial placement around center (translateY pushes outward from center) */
.petal1 { transform: translate(-50%,-50%) rotate(0deg) translateY(calc(-28px - (1 - var(--growth,0)) * 8px)) scale(calc(0.6 + var(--growth,0) * 0.6)); }
.petal2 { transform: translate(-50%,-50%) rotate(40deg) translateY(calc(-28px - (1 - var(--growth,0)) * 8px)) scale(calc(0.6 + var(--growth,0) * 0.6)); }
.petal3 { transform: translate(-50%,-50%) rotate(100deg) translateY(calc(-28px - (1 - var(--growth,0)) * 8px)) scale(calc(0.6 + var(--growth,0) * 0.6)); }
.petal4 { transform: translate(-50%,-50%) rotate(-100deg) translateY(calc(-28px - (1 - var(--growth,0)) * 8px)) scale(calc(0.6 + var(--growth,0) * 0.6)); }
.petal5 { transform: translate(-50%,-50%) rotate(-40deg) translateY(calc(-28px - (1 - var(--growth,0)) * 8px)) scale(calc(0.6 + var(--growth,0) * 0.6)); }
.petal6 { transform: translate(-50%,-50%) rotate(80deg) translateY(calc(-28px - (1 - var(--growth,0)) * 8px)) scale(calc(0.6 + var(--growth,0) * 0.6)); }
.petal7 { transform: translate(-50%,-50%) rotate(140deg) translateY(calc(-28px - (1 - var(--growth,0)) * 8px)) scale(calc(0.6 + var(--growth,0) * 0.6)); }
.petal8 { transform: translate(-50%,-50%) rotate(-140deg) translateY(calc(-28px - (1 - var(--growth,0)) * 8px)) scale(calc(0.6 + var(--growth,0) * 0.6)); }

.center {
  position: absolute;
  width: 44px;
  height: 44px;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%) scale(calc(0.7 + var(--growth,0) * 0.5));
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  background: radial-gradient(circle at 30% 30%, #fff3c4 0%, #ffd6e0 40%, #ff6b6b 100%);
  font-size: 16px;
  opacity: calc(var(--growth,0));
  transition: transform 140ms linear, opacity 140ms linear;
}


html,body{box-sizing:border-box;overflow-x:hidden;margin:0;padding:0}

.bees { position: absolute; inset: 0; pointer-events: none; z-index: 5; }
.bee { width: 18px; height: 12px; background: linear-gradient(90deg,#ffd966 0%,#f0a500 100%); border-radius: 8px; position: absolute; opacity: 0; transform: scale(0.9); transition: opacity 200ms linear; }
.bee::after { content: ''; position: absolute; right: -6px; top: 2px; width: 8px; height: 8px; background: rgba(255,255,255,0.7); border-radius: 50%; }
.bee1 { left: 10%; top: 25%; }
.bee2 { left: 70%; top: 10%; }


.bees.active .bee { opacity: 1; animation: beeFlight 3s linear infinite; }

@keyframes beeFlight {
  0% { transform: translate(0,0) rotate(0deg); }
  25% { transform: translate(40px,-20px) rotate(10deg); }
  50% { transform: translate(-30px,-10px) rotate(-6deg); }
  75% { transform: translate(20px,10px) rotate(6deg); }
  100% { transform: translate(0,0) rotate(0deg); }
}

@media (max-width: 1024px) {
  .banner-planeta {
    padding: 4rem 6%;
  }

  .conteudo-banner {
    max-width: 55%;
  }

  .planeta-container {
    width: 40%;
  }
}

@media (max-width: 768px) {
  .banner-planeta {
    flex-direction: column-reverse;
    align-items: center;
    padding: 3rem 5%;
    text-align: center;
  }

  .conteudo-banner {
    max-width: 100%;
    z-index: 3;
    margin-top: 1rem;
  }

  .conteudo-banner h1 {
    font-size: 2.4rem;
  }

  .conteudo-banner p {
    font-size: 1.4rem;
  }

  .botoes {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    align-items: center;
  }

  .botoes button {
    width: 100%;
    max-width: 320px;
  }

  .planeta-container {
    width: 60%;
    margin-bottom: 1.5rem;
  }

  .planeta {
    width: 80%;
    box-shadow: 0 0 40px rgba(150, 90, 0, 0.25);
  }
}

@media (max-width: 480px) {
  .banner-planeta {
    padding: 2rem 4%;
  }

  .conteudo-banner h1 {
    font-size: 1.8rem;
  }

  .conteudo-banner p {
    font-size: 1.1rem;
  }

  .planeta-container {
    width: 70%;
  }

  .planeta {
    width: 100%;
    box-shadow: 0 0 20px rgba(150, 90, 0, 0.18);
  }
}
  /* corner vines (orange) */
  .vine {
    position: absolute;
    width: 26vmax;
    height: 26vmax;
    pointer-events: none;
    z-index: 2;
    opacity: 0.98;
    filter: drop-shadow(0 6px 10px rgba(0,0,0,0.10));
    --grow-delay: 0s;
  }

  .vine-svg { width: 100%; height: 100%; display: block; }

  /* path drawing: start hidden via stroke-dashoffset then animate to 0 */
  .vine-path {
    stroke: #ff8c3d;
    stroke-width: 6;
    stroke-linecap: round;
    stroke-linejoin: round;
    fill: none;
    stroke-dasharray: 420; /* approximate total length */
    stroke-dashoffset: 420;
    animation: vineDraw 900ms cubic-bezier(.2,.8,.2,1) forwards var(--grow-delay);
  }

  /* leaves pop in shortly after the path draws */
  .vine-leaves { transform-origin: center; transform-box: fill-box; transform: scale(0.2); opacity: 0; animation: leafPop 420ms ease forwards; animation-delay: calc(var(--grow-delay) + 0.95s); }
  .vine-leaves .leaf { transform-origin: center; }

  @keyframes vineDraw { to { stroke-dashoffset: 0; } }
  @keyframes leafPop { to { transform: scale(1); opacity: 1; } }

  /* corner-specific placement and staggered delays */
  .vine-tl { top: -4vmax; left: -4vmax; --grow-delay: 0.08s; transform-origin: 0 0; }
  .vine-tr { top: -5vmax; right: -4vmax; --grow-delay: 0.34s; transform-origin: 100% 0; }
  .vine-bl { bottom: -6vmax; left: -5vmax; --grow-delay: 0.18s; transform-origin: 0 100%; }
  .vine-br { bottom: -4vmax; right: -3vmax; --grow-delay: 0.44s; transform-origin: 100% 100%;}

  /* keep a very subtle ongoing sway after draw (smaller than before) - applied to the inner svg so container flips are preserved */
  .vine-svg { animation: vineSway 6.5s ease-in-out calc(var(--grow-delay) + 1s) infinite; transform-origin: center; }
  @keyframes vineSway { 0% { transform: translateY(0); } 50% { transform: translateY(2px); } 100% { transform: translateY(0); } }

  #folhas {
  position: absolute;
  inset: 0;
  overflow: hidden;
  pointer-events: none;
  z-index: 4;
}

.folha {
  position: absolute;
  background-image: url('https://cdn-icons-png.flaticon.com/512/765/765519.png');
  background-size: contain;
  background-repeat: no-repeat;
  opacity: 0.9;
  animation: cair linear forwards;
}

@keyframes cair {
  0% { transform: translateY(-50px) rotate(0deg); opacity: 1; }
  100% { transform: translateY(600px) rotate(360deg); opacity: 0; }
}


.contador {
  margin-top: 1.5rem;
  font-weight: bold;
  color: #1b5e20;
  font-size: 1.1rem;
} */
</style>

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

<div class="banner-layout">
        
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
<script>
// Plant growth interaction
;(function(){
  const banner = document.querySelector('.banner-planeta');
  const pot = document.querySelector('.pot');
  const stem = document.querySelector('.stem');
  const bees = document.querySelector('.bees');
  if (!banner || !pot || !stem) return;

  // Smooth animated growth controller
  let targetGrowth = 0;
  let currentGrowth = 0;
  const sensitivity = 1.6; // >1 more sensitive to cursor (smaller moves => larger response)
  const ease = 0.12; // smoothing factor

  function setTargetFromEvent(e){
    const rect = banner.getBoundingClientRect();
    const x = (e.touches ? e.touches[0].clientX : e.clientX) - rect.left;
    let ratio = x / rect.width;
    ratio = Math.max(0, Math.min(1, ratio));
    // apply sensitivity curve (ease out)
    targetGrowth = Math.pow(ratio, 1 / sensitivity);
  }

  function rafLoop(){
    // ease current towards target
    currentGrowth += (targetGrowth - currentGrowth) * ease;
    // clamp and write
    currentGrowth = Math.max(0, Math.min(1, currentGrowth));
  pot.dataset.growth = currentGrowth.toFixed(2);
  // set CSS var on pot so stem/flower/leaf can read it via var(--growth)
  pot.style.setProperty('--growth', currentGrowth.toFixed(2));

    // reveal bees when almost full
    const beesEl = document.querySelector('.bees');
    if (beesEl) {
      if (currentGrowth > 0.9) beesEl.classList.add('active');
      else beesEl.classList.remove('active');
    }

    requestAnimationFrame(rafLoop);
  }

  banner.addEventListener('mousemove', setTargetFromEvent);
  banner.addEventListener('touchmove', setTargetFromEvent, {passive:true});

  // click/tap to nudge growth forward faster
  banner.addEventListener('click', ()=>{
    targetGrowth = Math.min(1, targetGrowth + 0.18);
  });

  // seed initial small growth
  targetGrowth = 0.12;
  rafLoop();
})();
</script>