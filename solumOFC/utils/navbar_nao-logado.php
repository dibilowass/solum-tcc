
<div class="nav"> 
<!-- <spam class="nav-cima"> </spam> -->
 <div class="navlogo">
  <a href="index.php"> <img src="assets\imagens\logo-solum.png"> </a>
</div> 


        <div class="navbar-pesquisa">
             <form class="form-pesquisa" action="buscar-produtos.php" method="GET">
               <input type="text" name="q" placeholder="Buscar produtos sustentáveis..." id="inputPesquisa">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
<style>
#buscar::placeholder{
  color: #ccc !important;
}

</style>


<div class="navlink"> 
<div type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
<span class="icone"> <i class="bi bi-person azul" style="font-size: 1.6rem;"></i> </span>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header cinza">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Entrar na conta</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body cinza">
    <div>
    

<h5>

<form action="login.php" method="post">

<label>E-mail</label><br>
<input class="cadastro-caixa" type="email" name="email" required><br><br>

<label>Senha</label><br>
<input class="cadastro-caixa" type="password" name="senha" required><br><br>

<h5> Não possui uma conta? <a href="cadastro.php">Crie uma aqui!</a></h5>



<button type="submit" value="Entrar" class="btn btn-primary"><i class="bi bi-box-arrow-in-right"></i> Entrar </button>
 

</h5>

</form>
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
    <p></p>
  </div>
</div>




</div>


<div class="navlink">
  
  <a href="carrinho.php"><i class="bi bi-cart4 azul"  style="font-size: 1.6rem;"> </i> </a>

</div>



<div class="navlink">
  
  <a href="index.php"> <span class="icone-home"> <i class="bi bi-house azul"  style="font-size: 1.6rem;"> </i></span> </a>

</div>




</div>



<div class="navcategoria"> 



<div class="navlinkcategoria">
<a href="sobre-nos.php" style="text-decoration: none; color: #ebebeb; "> <strong>Sobre</strong> </a>
</div>


<div class="navlinkcategoria">
<a href="explorar-produtos.php" style="text-decoration: none; color: #ebebeb; "> <strong> Produtos </strong></a>
</div>

<div class="dropdown">
  <div class="dropbtn"><strong>Categorias</strong></div>
  <div class="dropdown-content">
    
    
<?php require_once("handlerSelectCategorias.php")?>
  

    <?php
        if($num > 0){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                extract($row);

               echo "<a href='explorar-categorias.php?catID={$catID}'>{$catNome}</a> ";

            }
   
        }
        else{
            echo "<p>Nenhuma categoria foi encontrada</p>";
        }

    ?>

    </div>
    
  </div>



<div class="navlinkcategoria">
<a href="lojas.php" style="text-decoration: none; color: #ebebeb; "> <strong>Lojas</strong> </a>
</div>


<div class="navlinkcategoria">
    <strong>Vender</strong>


</div>


</div>

