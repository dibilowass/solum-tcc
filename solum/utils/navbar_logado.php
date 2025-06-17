
<div class="nav"> 
<spam class="nav-cima"> </spam>
 <div class="navlogo">
  <a href="index.php"> <img src="assets\imagens\logo-solum.png"> </a>
</div> 


<div class="navlink">
   <input type="search" placeholder="Busque por lojas, produtos ou categorias." class="navpesquisa" name="buscar"  id="buscar">
</div>

<style>
#buscar::placeholder{
  color: #ccc !important;
}

</style>


<div class="navlink"> 
<div type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
<?php if (isset($_SESSION['usuNome'])): ?>
    <span class="nav-offcanvas-texto">Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuNome']); ?>!</span>
<?php endif; ?>
<span class="icone"> <i class="bi bi-person azul" style="font-size: 1.6rem;"></i> </span>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header cinza">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Conta</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body cinza ">
    <div class="nav-offcanvas-texto">
    <a href="alterar-dados.php"> <i class="bi bi-gear-fill azul"></i> Alterar dados </a>
    <br>
    <a href="cadastrar-pagamento"> <i class="bi bi-credit-card-2-front-fill azul"></i> Cadastrar métodos de pagamento </a> 
    <br>
    <a href="encerrar-sessao.php"> <i class="bi bi-box-arrow-left azul"></i> Sair da conta</a>

<!-- <h5>

<form action="login.php" method="post">

<label>E-mail</label><br>
<input class="cadastro-caixa" type="email" name="email" required><br><br>

<label>Telefone</label><br>
<input class="cadastro-caixa"  type="number" name="telefone" ><br><br>

<label>Senha</label><br>
<input class="cadastro-caixa" type="password" name="senha" required><br><br>

<h5> Não possui uma conta? <a href="cadastro.php">Crie uma aqui!</a></h5>



<input type="submit" value="Entrar" class="cadastro-caixa">
</h5>

</form> -->
<hr>
    </div>
    
  </div>
</div>
</div>




<div class="navlink">

<div type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
 <span class="icone"> <i class="bi bi-bookmark-heart azul" style="font-size: 1.4rem;"></i> </span>
</div>

<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">

<div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Favoritos</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p>Try scrolling the rest of the page to see this option in action.</p>
  </div>
</div>




</div>



<div class="navlink">

<div type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
 <span class="icone"> <i class="bi bi-cart4 azul"  style="font-size: 1.6rem;"> <span class="badge text-bg-secondary" style="font-size: 0.7rem;">4</span> </i></span></div>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header cinza">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body cinza">
    <p>Try scrolling the rest of the page to see this option in action.</p>
  </div>
</div>




</div>



<div class="navlink">
  
  <a href="index.php"> <span class="icone-home"> <i class="bi bi-house azul"  style="font-size: 1.6rem;"> </i></span> </a>

</div>




</div>


<hr>

<div class="navcategoria"> 



<div class="navlinkcategoria">
<strong>Contato</strong>
</div>


<div class="navlinkcategoria">
<a href="explorar-produtos.php" style="text-decoration: none; color: #ff6b00; "> <strong> Produtos </strong></a>
</div>

<div class="dropdown">
  <div class="dropbtn"><strong>Categorias</strong></div>
  <div class="dropdown-content">
    
    
<?php require_once("handlerSelectCategorias.php")?>
  

    <?php
        if($num > 0){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                extract($row);

                echo "<a href='#'>{$catNome}</a> ";

            }
   
        }
        else{
            echo "<p>Nenhuma categoria foi encontrada</p>";
        }

    ?>

    </div>
    
  </div>



<div class="navlinkcategoria">
<a href="loja.php" style="text-decoration: none; color: #ff6b00; "> <strong>Lojas</strong> </a>
</div>


<div class="navlinkcategoria">
    <strong>Vender</strong>


</div>


</div>
<hr>
