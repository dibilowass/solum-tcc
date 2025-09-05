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

<?php require_once("handlerSelectLojas.php") ?> 


<?php


$lojID = $_GET['lojID'] ?? null;

if ($lojID) {
    $loja = $lojaModel->readById($lojID);

    if ($loja) {
        $lojNome = $loja['lojNome'];
        $lojDescricao = $loja['lojDescricao'];
        $lojLogo = $loja['lojLogo'];
    } else {
        $lojNome = "Loja não encontrada";
        $lojDescricao = "";
        $lojLogo = "";
    }
} else {
    $lojNome = "ID de loja não informado";
    $lojDescricao = "";
    $lojLogo = "";
}
?>




<div class="container-perfil-loja">

  <!-- HEADER -->
  <div class="header-loja">
    <img src="<?= htmlspecialchars($lojLogo) ?>" alt="<?= htmlspecialchars($lojNome) ?>">
    <div class="info-loja">
        <h1><?= htmlspecialchars($lojNome) ?></h1>
        <p><?= $loja['lojDescricao'] ?></p>
        <div class="buttons">
            <!-- <button class="btn-primary">+ Seguir</button> -->
           
        </div>
        <div class="stats">
            <div>Produtos: <b>120</b></div>
        </div>
    </div>
  </div>

  <!-- MENU -->
  <div class="menu">
    <a href="#" class="active">Página principal</a>
    <a href="#">Todos os produtos</a>
  </div>

  <!-- CUPOM -->
  <div class="cupom">
    <b>R$0,50 OFF</b> nas compras acima de R$50  
    <button style="float:right; background:#ff5722; color:white; border:none; padding:5px 12px; border-radius:6px;">Ativar</button>
  </div>

  <!-- PRODUTOS -->
  <h3>Recomendado para você</h3>
  <div class="produtos">
    <div class="produto">
        <img src="https://via.placeholder.com/150" alt="Produto 1">
        <p>Produto 1</p>
    </div>
    <div class="produto">
        <img src="https://via.placeholder.com/150" alt="Produto 2">
        <p>Produto 2</p>
    </div>
    <div class="produto">
        <img src="https://via.placeholder.com/150" alt="Produto 3">
        <p>Produto 3</p>
    </div>
  </div>

</div>

<?php require_once("./utils/footer.php") ?>
