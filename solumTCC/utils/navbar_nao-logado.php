<div class="nav">


<!-- logoo -->
  <div class="navlogo">
    <a href="index.php"> <img src="assets\imagens\logo-solum.png"> </a>
  </div>


<!-- barra de pesquisa -->
  <div class="navbar-pesquisa">
    <form class="form-pesquisa" action="buscar-produtos.php" method="GET">
      <input type="text" name="q" placeholder="Buscar produtos sustentáveis..." id="inputPesquisa">
      <button type="submit"><i class="fas fa-search"></i></button>
    </form>
  </div>
  <style>
    #buscar::placeholder {
      color: #ccc !important;
    }
  </style>


<!-- icon favoritos -->
  <div class="navlink">

    <div  class="icon-fav" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
      aria-controls="offcanvasScrolling">
      <span class="icone"> <i class="bi bi-suit-heart azul" style="font-size: 1.7rem;"></i> </span>
    </div>

    <!-- offcanvas markup moved below the .nav to avoid being affected by .nav backdrop-filter -->

  </div>



  <!-- icon carrinho -->
  <div class="navlink">
    <a href="carrinho.php" style="text-decoration:none;"><i class="bi bi-bag azul" style="font-size: 1.7rem;"> </i> <span id="contadorCarrinho" class="badge-contador" style="position:relative; top:-12px; left:-6px; background:#ff6b00; color:white; padding:2px 6px; border-radius:12px; font-size:12px; text-decoration:none;">0</span></a>
  </div>




<!-- icon home (responsivo) -->
  <div class="navlink">
    <a href="index.php"> <span class="icone-home"> <i class="bi bi-house azul" style="font-size: 1.8rem;"> </i></span>
    </a>
  </div>

<span class="azul">|</span>

  <!-- icon conta -->
  <div class="navlink">

    <div type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
      <span class="icone"> 
        <i class="bi bi-person-add azul" style="font-size: 2.2rem;"></i> 
      </span>
      <h7 class="txt-welcome">Seja Bem-vindo!</h7>
      <h7 class="txt-welcome"><strong>Entre ou Cadastre-se</strong></h7>
    </div>

    <!-- offcanvas markup moved below the .nav to avoid being affected by .nav backdrop-filter -->
  </div>

<!-- moved offcanvas elements here so they are not inside the .nav which uses backdrop-filter -->
<!-- offcanvas placeholders removed from here and reinserted after the .nav closing to avoid containment by backdrop-filter -->
</div>

<!-- OFFCANVAS: Favoritos (moved outside .nav to avoid blur containment) -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Favoritos</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div id="favoritosContainer">
      <p>Você ainda não adicionou produtos aos favoritos.</p>
    </div>
  </div>
</div>

<!-- OFFCANVAS: Entrar / Cadastre-se (moved outside .nav to avoid blur containment) -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header cinza">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Entrar na conta</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body cinza">
    <div>
      <form action="login.php" method="post">
        <label>E-mail</label><br>
        <input class="cadastro-caixa" type="email" name="email" required><br><br>
        <label>Senha</label><br>
        <input class="cadastro-caixa" type="password" name="senha" required><br><br>
        <h5> Não possui uma conta? <a href="cadastro.php">Crie uma aqui!</a></h5>
        <button type="submit" value="Entrar" class="btn btn-primary"><i class="bi bi-box-arrow-in-right"></i> Entrar </button>
      </form>
      <hr>
    </div>
  </div>
</div>

</div>



<div class="navcategoria">

  <div class="navlinkcategoria">
    <a href="sobre-nos.php" style="text-decoration: none; color: #ebebeb; "> Sobre </a>
  </div>

  <span class="branco">|</span>

  <div class="navlinkcategoria">
    <a href="explorar-produtos.php" style="text-decoration: none; color: #ebebeb; "> Produtos </a>
  </div>

   <span class="branco">|</span>

  <div class="dropdown">
    <div class="dropbtn"> Categorias </div>
    <div class="dropdown-content">


      <?php require_once("handlerSelectCategorias.php") ?>


      <?php
      if ($num > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

          extract($row);

          echo "<a href='explorar-categorias.php?catID={$catID}'>{$catNome}</a> ";

        }

      } else {
        echo "<p>Nenhuma categoria foi encontrada</p>";
      }

      ?>

    </div>

  </div>

 <span class="branco">|</span>

  <div class="navlinkcategoria">
    <a href="lojas.php" style="text-decoration: none; color: #ebebeb; "> Lojas </a>
  </div>

   <span class="branco">|</span>

  <div class="navlinkcategoria"> Vender 
  </div>


</div>
  <?php
    // breadcrumb: mostra o caminho atual no topo de cada página, exceto na home (index.php)
    $currentScript = basename($_SERVER['PHP_SELF']);
    if ($currentScript !== 'index.php' && file_exists(__DIR__ . '/caminhos.php')) {
        require_once __DIR__ . '/caminhos.php';
    }
    ?>