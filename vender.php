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

if (!isset($_SESSION['usuID'])) {
    echo "<script>
        alert('Você precisa estar logado para vender.');
        window.location.href = 'index.php';
    </script>";
    exit;
}

?>
<h1 class="titulo">Cadastro de Vendedor</h1>

    <p class="titulo-descricao">
        Insira é o tipo e número de identificação do titular da conta.<br>
    </p>

    
<div class="corpo-cadastro">
<form class="row m-2 form-cadastro" method="POST"  action="pag-vender.php">

<!-- 
    <div class="col-md-5">
        <label for="inputCity" class="form-label">Endereço</label>
        <input type="text" class="form-control" name="endereco" required>
    </div> -->

    <div class="col-md">
        <label for="inputState" class="form-label">Tipo de documento</label>
        <select name="tipo" class="form-select" required>
            <option selected>CPF</option>
            <option>CNPJ</option>
        </select>
    </div> 

    <div class="col-md">
        <label for="inputCep" class="form-label">Número do documento</label>
        <input type="number" class="form-control" name="num-doc" required>
    </div>

        <!-- <label>
               Não utilize seus dados reais.
            </label>
     -->

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Prosseguir</button>
    </div>

    

</form>
</div>

<?PHP require_once("./utils/footer.php"); ?>
