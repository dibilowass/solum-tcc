<div class="nav">

  <!-- logoo -->
  <div class="navlogo">
    <a href="index.php"> <img src="assets/imagens/logo-solum.png"> </a>
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

    <div class="icon-fav" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
      aria-controls="offcanvasScrolling">
      <span class="icone"> <i class="bi bi-suit-heart azul" style="font-size: 1.7rem;"></i> </span>
      
    </div>

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
      id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">

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

  </div>



  <!-- icon carrinho -->
  <div class="navlink">
    <a href="carrinho.php" style="text-decoration:none;"><i class="bi bi-bag azul" style="font-size: 1.7rem;"> </i> <span id="contadorCarrinho" class="badge-contador" style="position:relative; top:-12px; left:-6px; background:#ff6b00; color:white; padding:2px 6px; border-radius:12px; font-size:12px;">0</span></a>
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
        <i class="bi bi-person-gear azul" style="font-size: 2.2rem;"></i> 
      </span>
      <?php if (isset($_SESSION['usuNome'])): ?>
        <h7 class="txt-welcome">Olá, <?php echo htmlspecialchars($_SESSION['usuNome']); ?>!</h7>
      <?php endif; ?>
      <!-- <h7 class="txt-logar"><strong>Minha Conta</strong></h7> -->
    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header cinza">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Conta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body cinza">
        <div>
          <a href="alterar-dados.php" class="nav-off-botoes"> <i class="bi bi-gear-fill azul"></i> Alterar dados </a>
          <br>
          <a href="cadastrar-pagamento.php" class="nav-off-botoes"> <i class="bi bi-credit-card-2-front-fill azul"></i> Cadastrar métodos de pagamento </a> 
          <br>
          <a href="encerrar-sessao.php" class="nav-off-botoes"> <i class="bi bi-box-arrow-left azul"></i> Sair da conta</a>
          <hr>
        </div>
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
    <div class="dropbtn">Categorias</div>
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

  <div class="navlinkcategoria">
    Vender
  </div>

</div>

  <?php
    // breadcrumb: mostra o caminho atual no topo de cada página, exceto na home (index.php)
    $currentScript = basename($_SERVER['PHP_SELF']);
    if ($currentScript !== 'index.php' && file_exists(__DIR__ . '/caminhos.php')) {
        require_once __DIR__ . '/caminhos.php';
    }
    ?>
