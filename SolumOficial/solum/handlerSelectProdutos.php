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

$produtoModel = new Produto($db); // Passa o objeto PDO para Loja

try {
    // Usar método do modelo para pegar todas as lojas
    $stmt = $produtoModel->readAll();
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Busca todas como array associativo

} catch (PDOException $error) {
    echo "Erro na consulta: " . $error->getMessage();
    $produtos = []; // garante que $lojas sempre esteja definido
}



?>