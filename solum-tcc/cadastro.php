<?php require_once("./utils/session.php")?>
<?php require_once("./utils/header.php"); ?>
<?php
if (isset($_SESSION['usuID'])) {
   
    require_once( "./utils/navbar_logado.php");
} else {
  
    require_once( "./utils/navbar_nao-logado.php");
}
?>
<br>
<br>


<div class="corpo-cadastro">
<form class="row m-2 form-cadastro" method="POST"  action="handlerInsertUsuario.php">
    
    <h1 class="title"> Cadastro </h1>

    <div class="col-md-4">
        <label for="inputAddress" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" required>
    </div>

    <div class="col-md-4" >
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
    </div>

    <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Senha</label>
        <input type="password" class="form-control" name="senha" aria-describedby="passwordHelpBlock" required>
        <small id="passwordHelpBlock" class="form-text text-muted">
            Sua senha deve ter entre 8 e 20 caracteres.
        </small>
    </div>

    <div class="col-md-5">
        <label for="inputCity" class="form-label">Endereço</label>
        <input type="text" class="form-control" name="endereco" required>
    </div>

    <div class="col-md-2">
        <label for="inputState" class="form-label">Estado</label>
        <select name="estado" class="form-select" required>
            <option selected>Escolha...</option>
           
    <?php

    require_once("handlerSelectEstado.php");
        if($num > 0){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                extract($row);

                echo "<option>{$estNome}</option> ";

            }
   
        }
        else{
            echo "<p>Nenhuma opção foi encontrada</p>";
        }

    ?>
    
        </select>
    </div>

    <div class="col-md-2">
        <label for="inputZip" class="form-label">Cep</label>
        <input type="text" class="form-control" name="cep" required>
    </div>

    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                Ao utilizar este site, você concorda com a nossa Política de Privacidade.
            </label>
        </div>

        <label>
               Não utilize seus dados reais.
            </label>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Criar conta</button>
    </div>

</form>
</div>



<?php require_once("./utils/footer.php") ?>