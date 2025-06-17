<?php

require_once "config/db.php";
require_once "model/Produto.php";

//Conexão com BD

$database = new Database();
$db = $database->getConnection();

//Instância da objeto Produto

$produto = new Produto($db);

$stmt = $produto->readAll();
$num = $stmt->rowCount();


?>