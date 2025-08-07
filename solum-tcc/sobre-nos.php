<?php require_once("./utils/session.php")?>
<?php require_once("./utils/header.php"); ?>
<?php
if (isset($_SESSION['usuID'])) {
   
    require_once( "./utils/navbar_logado.php");
} else {
  
    require_once( "./utils/navbar_nao-logado.php");
}
?>

<?php require_once("./utils/footer.php") ?>