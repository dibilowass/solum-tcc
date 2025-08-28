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
<div class="containerLojas">

  <img src="<?= htmlspecialchars($lojLogo) ?>" alt="<?= htmlspecialchars($lojNome) ?>" style="max-width: 200px;">   <h1 class=""><?= htmlspecialchars($lojNome) ?></h1><br>
  <p class=""><?= nl2br(htmlspecialchars($lojDescricao)) ?></p>
</div>





<?php require_once("./utils/footer.php") ?>